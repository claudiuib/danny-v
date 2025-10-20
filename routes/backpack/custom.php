<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    // Custom Dashboard Route
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    
    // CRUD Routes
    Route::crud('user', 'UserCrudController');
    Route::crud('portfolio', 'PortfolioCrudController');
    Route::crud('contact-info', 'ContactInfoCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('visitor', 'VisitorCrudController');
    Route::crud('main-page-content', 'MainPageContentCrudController');
    Route::crud('about-page-content', 'AboutPageContentCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
