<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings('service', 'services');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('title');
        CRUD::column('image_path')->type('image')->disk('public');
        CRUD::column('description')->type('text')->limit(100);
        CRUD::column('features')->type('text')->limit(50)->label('Features Preview');
        CRUD::column('is_active')->type('boolean');
        CRUD::column('sort_order');
        CRUD::column('created_at')->type('datetime');
        
        // Hide the table header by setting a custom view
        CRUD::setListView('admin.services-list');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ServiceRequest::class);
        
        CRUD::field('title')->validationRules('required|min:3|max:255');
        CRUD::field('description')->type('textarea')->validationRules('required|min:10');
        CRUD::field('image_path')
            ->type('upload')
            ->withFiles()
            ->disk('public')
            ->validationRules('required|image|max:2048');
        CRUD::field('features')->type('textarea')->hint('Enter features separated by new lines (one per line)')->validationRules('required|string');
        CRUD::field('icon')->type('text')->hint('Optional: Icon class name (e.g., la la-home)');
        CRUD::field('is_active')->type('boolean')->default(true);
        
        // Hide sort_order field - it will be set automatically
        CRUD::field('sort_order')->type('hidden');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;

        // Get the entry and delete it
        $entry = $this->crud->getEntry($id);
        $entry->delete();
        
        // Show success message and redirect to list page
        session()->flash('success', trans('backpack::crud.delete_success'));
        
        return redirect($this->crud->route);
    }
}
