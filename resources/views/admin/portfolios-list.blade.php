@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    'Portfolios' => false,
  ];
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="header-operation animated fadeInDown">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0">
                    Portfolio Management
                </h1>
                <p class="mb-0">Manage your portfolio items</p>
            </div>
            <div>
                <a href="{{ url($crud->route.'/create') }}" class="btn btn-primary">
                    <i class="la la-plus"></i> Add Portfolio
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
                                    <td style="width: 80px;">
                                        @if($entry->image_path)
                                            <img src="{{ Storage::url($entry->image_path) }}" alt="{{ $entry->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                        @else
                                            <div style="width: 60px; height: 60px; background-color: #f8f9fa; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                                <i class="la la-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $entry->title }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($entry->description, 100) }}</small>
                                    </td>
                                    <td style="width: 120px;">
                                        @if($entry->category)
                                            <span class="badge badge-info">{{ ucfirst($entry->category) }}</span>
                                        @else
                                            <span class="text-muted">No category</span>
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
                                            <a href="{{ url($crud->route.'/'.$entry->getKey().'/delete') }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this portfolio item?')">
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
                        <h4>No Portfolio Items Found</h4>
                        <p class="text-muted">Start by adding your first portfolio item.</p>
                        <a href="{{ url($crud->route.'/create') }}" class="btn btn-primary">
                            <i class="la la-plus"></i> Add Portfolio
                        </a>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
