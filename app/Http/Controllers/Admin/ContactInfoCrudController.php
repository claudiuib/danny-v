<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactInfoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ContactInfoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ContactInfoCrudController extends CrudController
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
        CRUD::setModel(\App\Models\ContactInfo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/contact-info');
        CRUD::setEntityNameStrings('contact info', 'contact info');
        
        // Ensure there's always exactly one contact info record
        $this->ensureContactInfoExists();
    }
    
    private function ensureContactInfoExists()
    {
        $contactInfo = \App\Models\ContactInfo::first();
        if (!$contactInfo) {
            \App\Models\ContactInfo::create([
                'phone' => '07481567890',
                'email' => 'info@dannyv.com',
                'location' => '123 Craftsman Ave London',
                'description' => 'Ready to start your next project? Fill out the form below and we\'ll get back to you within 24 hours. Whether you need custom furniture, home renovations, or just have questions about our services, we\'re here to help.\n\nWe offer complimentary project consultations to discuss your vision and provide expert recommendations.\n\nFully licensed contractors with comprehensive insurance coverage for your peace of mind.\n\nWe stand behind our work with comprehensive warranties on all craftsmanship and materials.',
                'is_active' => true
            ]);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('phone');
        CRUD::column('email');
        CRUD::column('location');
        CRUD::column('description')->type('text')->limit(100);
        CRUD::column('is_active')->type('boolean');
        CRUD::column('updated_at')->type('datetime');
        
        // Remove the "Add" button since we only want one record
        CRUD::removeButton('create');
        CRUD::removeButton('delete');
        
        // Hide the table header
        CRUD::setHeading('Contact Information');
        CRUD::setSubheading('Manage your contact details');
        
        // Remove the table header by setting a custom view
        CRUD::setListView('admin.contact-info-list');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(ContactInfoRequest::class);
        
        CRUD::field('phone')->validationRules('required|string|max:20');
        CRUD::field('email')->validationRules('required|email|max:255');
        CRUD::field('location')->type('textarea')->validationRules('required|string|max:500');
        CRUD::field('description')->type('textarea')->validationRules('required|string|max:1000');
        CRUD::field('is_active')->type('boolean')->default(true);
        
        // Set the title for the update form
        CRUD::setHeading('Edit Contact Information');
        CRUD::setSubheading('Update your contact details');
    }

}
