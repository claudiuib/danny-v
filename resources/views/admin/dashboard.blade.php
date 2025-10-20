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
                    <div class="col-md-6">
                        <h5>📋 Available CRUD Operations</h5>
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
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>🚀 Quick Actions</h5>
                        <div class="d-grid gap-2">
                            <a href="{{ backpack_url('user') }}" class="btn btn-primary">
                                <i class="la la-users"></i> Manage Users
                            </a>
                            <a href="{{ backpack_url('portfolio') }}" class="btn btn-success">
                                <i class="la la-images"></i> Manage Portfolio
                            </a>
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary" target="_blank">
                                <i class="la la-external-link"></i> View Website
                            </a>
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>📖 How to Use Backpack Admin Panel</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card border-left-primary">
                                    <div class="card-body">
                                        <h6 class="card-title">1. Create New Items</h6>
                                        <p class="card-text small">Click "Add" button in any CRUD section to create new records</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-left-success">
                                    <div class="card-body">
                                        <h6 class="card-title">2. Edit Existing Items</h6>
                                        <p class="card-text small">Click the edit icon (pencil) next to any item to modify it</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-left-warning">
                                    <div class="card-body">
                                        <h6 class="card-title">3. Delete Items</h6>
                                        <p class="card-text small">Click the delete icon (trash) to remove items permanently</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>💡 Portfolio Management Tips</h5>
                        <div class="alert alert-info">
                            <h6><i class="la la-lightbulb"></i> Best Practices:</h6>
                            <ul class="mb-0">
                                <li><strong>Images:</strong> Upload high-quality images (max 2MB, JPG/PNG)</li>
                                <li><strong>Categories:</strong> Use consistent categories (Interior, Renovation, Construction, Design)</li>
                                <li><strong>Sort Order:</strong> Set numbers (0, 1, 2...) to control display order</li>
                                <li><strong>Active Status:</strong> Toggle to show/hide items on the website</li>
                            </ul>
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
.border-left-warning {
    border-left: 4px solid #ffc107 !important;
}
</style>
@endsection
