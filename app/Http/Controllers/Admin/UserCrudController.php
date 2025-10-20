<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.

        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('created_at')->type('datetime');
        
        // Remove default delete button completely
        CRUD::removeButton('delete');
        
        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }


    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::field('name')->validationRules('required|min:5');
        CRUD::field('email')->validationRules('required|email|unique:users,email,'.CRUD::getCurrentEntryId());
        
        // Add current password field for Daniel user
        if (request()->route('id')) {
            $user = \App\Models\User::find(request()->route('id'));
            if ($user && strtolower($user->name) === 'daniel') {
                CRUD::field('current_password')
                    ->type('password')
                    ->label('Current Password')
                    ->hint('Enter your current password to change it')
                    ->validationRules('required_with:password|min:6');
            }
        }
        
        CRUD::field('password')
            ->type('password')
            ->hint('Leave blank to keep current password. Enter new password to change it.')
            ->validationRules('nullable|min:6');

        // Handle password hashing on update
        \App\Models\User::updating(function ($entry) {
            if (request('password') == null || request('password') == '') {
                // Keep the original password if no new password provided
                $entry->password = $entry->getOriginal('password');
            } else {
                // For Daniel user, verify current password
                if (strtolower($entry->name) === 'daniel' && request('current_password')) {
                    if (!Hash::check(request('current_password'), $entry->getOriginal('password'))) {
                        throw new \Exception('Current password is incorrect.');
                    }
                }
                // Hash the new password
                $entry->password = Hash::make(request('password'));
            }
        });
    }

}
