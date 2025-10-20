<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AboutPageContentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AboutPageContentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AboutPageContentCrudController extends CrudController
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
        CRUD::setModel(\App\Models\AboutPageContent::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/about-page-content');
        CRUD::setEntityNameStrings('about page content', 'about page contents');
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
        
        // Use custom list view
        CRUD::setListView('admin.about-page-content-list');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AboutPageContentRequest::class);
        
        CRUD::field('content')
            ->type('textarea')
            ->label('About Content')
            ->validationRules('required|string')
            ->hint('The main content for the about page');
            
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
            ->hint('Show this content on the about page');
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
