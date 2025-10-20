@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    'Dashboard' => false,
  ];
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="header-operation animated fadeInDown">
        <h1 class="h3 mb-0">
            Welcome, {{ $userName }}! 👋
        </h1>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Admin Panel Instructions</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h5>📋 Available CRUD Operations</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="la la-users text-primary"></i>
                                        <strong>Users Management</strong>
                                        <p class="text-muted small mb-0">Manage admin users, passwords, and permissions</p>
                                    </li>
                                    <li class="mb-2">
                                        <i class="la la-images text-success"></i>
                                        <strong>Portfolio Management</strong>
                                        <p class="text-muted small mb-0">Add, edit, and organize portfolio items with images</p>
                                    </li>
                                    <li class="mb-2">
                                        <i class="la la-cogs text-info"></i>
                                        <strong>Services Management</strong>
                                        <p class="text-muted small mb-0">Manage services with features and images</p>
                                    </li>
                                    <li class="mb-2">
                                        <i class="la la-phone text-warning"></i>
                                        <strong>Contact Information</strong>
                                        <p class="text-muted small mb-0">Update contact details and location info</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="la la-file-text text-secondary"></i>
                                        <strong>Main Page Content</strong>
                                        <p class="text-muted small mb-0">Manage homepage content and services list</p>
                                    </li>
                                    <li class="mb-2">
                                        <i class="la la-info-circle text-dark"></i>
                                        <strong>About Page Content</strong>
                                        <p class="text-muted small mb-0">Manage about page content and company story</p>
                                    </li>
                                    <li class="mb-2">
                                        <i class="la la-chart-line text-danger"></i>
                                        <strong>Visitor Analytics</strong>
                                        <p class="text-muted small mb-0">View website statistics and visitor data</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5>🚀 Quick Actions</h5>
                        <div class="d-grid gap-2">
                            <a href="{{ backpack_url('portfolio') }}" class="btn btn-success btn-sm">
                                <i class="la la-images"></i> Portfolio
                            </a>
                            <a href="{{ backpack_url('service') }}" class="btn btn-info btn-sm">
                                <i class="la la-cogs"></i> Services
                            </a>
                            <a href="{{ backpack_url('main-page-content') }}" class="btn btn-secondary btn-sm">
                                <i class="la la-file-text"></i> Main Page
                            </a>
                            <a href="{{ backpack_url('about-page-content') }}" class="btn btn-dark btn-sm">
                                <i class="la la-info-circle"></i> About Page
                            </a>
                            <a href="{{ backpack_url('visitor') }}" class="btn btn-warning btn-sm">
                                <i class="la la-chart-line"></i> Analytics
                            </a>
                            <a href="{{ url('/') }}" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="la la-external-link"></i> View Website
                            </a>
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>📖 How to Use Your Admin Panel</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border-left-primary">
                                    <div class="card-body">
                                        <h6 class="card-title">1. Create Content</h6>
                                        <p class="card-text small">Click "Add" buttons to create new portfolio items, services, or content</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-left-success">
                                    <div class="card-body">
                                        <h6 class="card-title">2. Edit Content</h6>
                                        <p class="card-text small">Click "Edit" buttons to modify existing content and images</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-left-info">
                                    <div class="card-body">
                                        <h6 class="card-title">3. Manage Images</h6>
                                        <p class="card-text small">Upload high-quality images for portfolio and services</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h6 class="card-title">4. Analytics</h6>
                                        <p class="card-text small">View visitor statistics and website performance data</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>💡 Content Management Best Practices</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-info">
                                    <h6><i class="la la-lightbulb"></i> Portfolio & Services:</h6>
                                    <ul class="mb-0">
                                        <li><strong>Images:</strong> Upload high-quality images (max 2MB, JPG/PNG)</li>
                                        <li><strong>Categories:</strong> Use consistent categories (Interior, Renovation, Construction, Design)</li>
                                        <li><strong>Sort Order:</strong> Set numbers (0, 1, 2...) to control display order</li>
                                        <li><strong>Active Status:</strong> Toggle to show/hide items on the website</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-success">
                                    <h6><i class="la la-cogs"></i> Content Management:</h6>
                                    <ul class="mb-0">
                                        <li><strong>Main Page:</strong> Update homepage content and services list</li>
                                        <li><strong>About Page:</strong> Manage company story and history</li>
                                        <li><strong>Contact Info:</strong> Keep phone, email, and location updated</li>
                                        <li><strong>Analytics:</strong> Monitor visitor statistics and performance</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>📊 Content Statistics</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h4 class="text-primary">{{ \App\Models\Portfolio::where('is_active', true)->count() }}</h4>
                                        <small class="text-muted">Active Portfolio Items</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h4 class="text-info">{{ \App\Models\Service::where('is_active', true)->count() }}</h4>
                                        <small class="text-muted">Active Services</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h4 class="text-success">{{ \App\Models\Visitor::count() }}</h4>
                                        <small class="text-muted">Total Visitors</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h4 class="text-warning">{{ \App\Models\User::count() }}</h4>
                                        <small class="text-muted">Admin Users</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>🔧 System Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <strong>Laravel Version:</strong> {{ app()->version() }}<br>
                                    <strong>PHP Version:</strong> {{ PHP_VERSION }}<br>
                                    <strong>Environment:</strong> {{ app()->environment() }}
                                </small>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <strong>Database:</strong> MySQL<br>
                                    <strong>Admin Panel:</strong> Backpack for Laravel<br>
                                    <strong>Last Login:</strong> {{ now()->format('M d, Y H:i') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.border-left-primary {
    border-left: 4px solid #007bff !important;
}
.border-left-success {
    border-left: 4px solid #28a745 !important;
}
.border-left-info {
    border-left: 4px solid #17a2b8 !important;
}
.border-left-warning {
    border-left: 4px solid #ffc107 !important;
}
</style>
@endsection
