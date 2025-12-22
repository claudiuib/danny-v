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
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
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
        CRUD::column('id');
        CRUD::column('section_name')->label('Section Heading');
        CRUD::column('content')->type('text')->limit(100)->label('Content Preview');
        CRUD::column('is_active')->type('boolean');
        CRUD::column('sort_order');
        CRUD::column('created_at')->type('datetime');
        
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
        
        CRUD::field('section_name')
            ->type('text')
            ->label('Section Heading')
            ->validationRules('required|string|max:255')
            ->hint('e.g., "WHAT WE DO"')
            ->default('WHAT WE DO');
        
        CRUD::field('content')
            ->type('textarea')
            ->label('Main Content')
            ->attributes([
                'rows' => 10,
                'style' => 'font-family: monospace;'
            ])
            ->validationRules('required|string')
            ->hint('Enter the main description text. You can use line breaks for formatting.');
            
        CRUD::field('services')
            ->type('textarea')
            ->label('Services List')
            ->attributes([
                'rows' => 15,
                'style' => 'font-family: monospace;'
            ])
            ->hint('Enter services one per line. Each line will be displayed as a bullet point.')
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
