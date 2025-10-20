<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MainPageContentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MainPageContentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MainPageContentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\MainPageContent::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/main-page-content');
        CRUD::setEntityNameStrings('main page content', 'main page contents');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // Remove delete buttons
        CRUD::removeButton('delete');
        
        // Use custom list view with edit buttons like Services
        CRUD::setListView('admin.main-page-content-list');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MainPageContentRequest::class);
        
        CRUD::field('content')
            ->type('textarea')
            ->label('Main Content')
            ->validationRules('required|string')
            ->hint('The main description text for this section');
            
        CRUD::field('services')
            ->type('textarea')
            ->label('Services List')
            ->hint('Enter services one per line (optional)')
            ->validationRules('nullable|string');
            
        CRUD::field('sort_order')
            ->type('number')
            ->label('Display Order')
            ->default(0)
            ->validationRules('integer|min:0')
            ->hint('Lower numbers appear first');
            
        CRUD::field('is_active')
            ->type('boolean')
            ->label('Active')
            ->default(true)
            ->hint('Show this section on the website');
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
}
