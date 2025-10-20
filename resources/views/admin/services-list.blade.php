@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    'Services' => false,
  ];
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="header-operation animated fadeInDown">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0">
                    Services Management
                </h1>
                <p class="mb-0">Manage your service offerings</p>
            </div>
            <div>
                <a href="{{ url($crud->route.'/create') }}" class="btn btn-primary">
                    <i class="la la-plus"></i> Add Service
                </a>
            </div>
        </div>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if($crud->hasAccess('list'))
            @if($crud->getEntries()->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tbody>
                            @foreach($crud->getEntries() as $entry)
                                <tr>
                                    <td style="width: 60px;">
                                        @if($entry->image_path)
                                            <img src="{{ Storage::url($entry->image_path) }}" alt="{{ $entry->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                        @else
                                            <div style="width: 50px; height: 50px; background-color: #f8f9fa; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                                <i class="la la-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $entry->title }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($entry->description, 80) }}</small>
                                    </td>
                                    <td style="width: 200px;">
                                        @if($entry->features_array && count($entry->features_array) > 0)
                                            <small>
                                                @foreach(array_slice($entry->features_array, 0, 2) as $feature)
                                                    • {{ $feature }}<br>
                                                @endforeach
                                                @if(count($entry->features_array) > 2)
                                                    <span class="text-muted">+{{ count($entry->features_array) - 2 }} more</span>
                                                @endif
                                            </small>
                                        @endif
                                    </td>
                                    <td style="width: 100px;">
                                        @if($entry->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                        <br>
                                        <small class="text-muted">Order: {{ $entry->sort_order }}</small>
                                    </td>
                                    <td style="width: 120px;">
                                        <div class="btn-group" role="group">
                                            <a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-sm btn-primary">
                                                <i class="la la-edit"></i>
                                            </a>
                                            <a href="{{ url($crud->route.'/'.$entry->getKey().'/delete') }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="card">
                    <div class="card-body text-center py-5">
                        <h4>No Services Found</h4>
                        <p class="text-muted">Start by adding your first service.</p>
                        <a href="{{ url($crud->route.'/create') }}" class="btn btn-primary">
                            <i class="la la-plus"></i> Add Service
                        </a>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
