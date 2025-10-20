@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    'Contact Information' => false,
  ];
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="header-operation animated fadeInDown">
        <h1 class="h3 mb-0">
            Contact Information
        </h1>
        <p class="mb-0">Manage your contact details</p>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if($crud->hasAccess('list'))
            @if($crud->getEntries()->count() > 0)
                @foreach($crud->getEntries() as $entry)
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Contact Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><strong>Phone:</strong></h6>
                                    <p class="mb-3">{{ $entry->phone }}</p>
                                    
                                    <h6><strong>Email:</strong></h6>
                                    <p class="mb-3">{{ $entry->email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6><strong>Location:</strong></h6>
                                    <p class="mb-3">{{ $entry->location }}</p>
                                    
                                    <h6><strong>Status:</strong></h6>
                                    <p class="mb-3">
                                        @if($entry->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-12">
                                    <h6><strong>Description:</strong></h6>
                                    <p class="mb-3">{{ $entry->description }}</p>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-primary">
                                        <i class="la la-edit"></i> Edit Contact Information
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card">
                    <div class="card-body text-center py-5">
                        <h4>No Contact Information Found</h4>
                        <p class="text-muted">Contact information will be created automatically when you first access this page.</p>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
