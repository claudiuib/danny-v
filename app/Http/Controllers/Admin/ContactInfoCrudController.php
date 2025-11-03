<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactInfoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ContactInfoCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

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
                'description' => 'Ready to start your next project? Fill out the form below and we\'ll get back to you within 24 hours.',
                'bullet_1' => 'We offer complimentary project consultations to discuss your vision and provide expert recommendations.',
                'bullet_2' => 'Fully licensed contractors with comprehensive insurance coverage for your peace of mind.',
                'bullet_3' => 'We stand behind our work with comprehensive warranties on all craftsmanship and materials.',
                'is_active' => true,
            ]);
        }
    }

    protected function setupListOperation()
    {
        CRUD::column('phone');
        CRUD::column('email');
        CRUD::column('location');
        CRUD::column('description')->type('text')->limit(100);
        CRUD::column('bullet_1')->type('text')->limit(50);
        CRUD::column('bullet_2')->type('text')->limit(50);
        CRUD::column('bullet_3')->type('text')->limit(50);
        CRUD::column('is_active')->type('boolean');
        CRUD::column('updated_at')->type('datetime');

        // Remove create/delete buttons
        CRUD::removeButton('create');
        CRUD::removeButton('delete');

        // Set list view headings
        CRUD::setHeading('Contact Information');
        CRUD::setSubheading('Manage your contact details');
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(ContactInfoRequest::class);

        CRUD::field('phone')->validationRules('required|string|max:20');
        CRUD::field('email')->type('email')->validationRules('required|email|max:255');
        CRUD::field('location')->type('textarea')->validationRules('required|string|max:500');
        CRUD::field('description')->type('textarea')->validationRules('required|string|max:1000');

        // Add bullet fields
        CRUD::field('bullet_1')->type('textarea')->attributes(['rows' => 2]);
        CRUD::field('bullet_2')->type('textarea')->attributes(['rows' => 2]);
        CRUD::field('bullet_3')->type('textarea')->attributes(['rows' => 2]);

        CRUD::field('is_active')->type('boolean')->default(true);

        // Set the title for the update form
        CRUD::setHeading('Edit Contact Information');
        CRUD::setSubheading('Update your contact details');
    }
}
