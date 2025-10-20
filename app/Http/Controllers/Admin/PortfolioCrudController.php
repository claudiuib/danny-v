<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PortfolioRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PortfolioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PortfolioCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Portfolio::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/portfolio');
        CRUD::setEntityNameStrings('portfolio', 'portfolios');
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
        CRUD::column('category');
        CRUD::column('image_path')->type('image')->disk('public');
        CRUD::column('is_active')->type('boolean');
        CRUD::column('sort_order');
        CRUD::column('created_at')->type('datetime');
        
        // Hide the table header by setting a custom view
        CRUD::setListView('admin.portfolios-list');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PortfolioRequest::class);
        
        CRUD::field('title')->validationRules('required|min:3|max:255');
        CRUD::field('description')->type('textarea')->validationRules('required|min:10');
        CRUD::field('image_path')->type('upload')->disk('public')->validationRules('required|image|max:2048');
        CRUD::field('category')->type('select_from_array')->options([
            'interior' => 'Interior Design',
            'renovation' => 'Renovation',
            'construction' => 'Construction',
            'design' => 'Design'
        ])->validationRules('required');
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
}
