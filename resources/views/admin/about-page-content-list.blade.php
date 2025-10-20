@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    'About Page Content' => false,
  ];
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="header-operation animated fadeInDown">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0">
                    About Page Content
                </h1>
                <p class="mb-0">Manage your about page content sections</p>
            </div>
            <div>
                <a href="{{ url($crud->route.'/create') }}" class="btn btn-primary">
                    <i class="la la-plus"></i> Add Content
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
                                    <td style="width: 70%;">
                                        <strong>Content:</strong>
                                        <p class="mb-2">{{ Str::limit($entry->content, 200) }}</p>
                                    </td>
                                    <td style="width: 15%;">
                                        <div class="mb-2">
                                            <strong>Order:</strong> {{ $entry->sort_order }}
                                        </div>
                                        <div class="mb-2">
                                            @if($entry->is_active)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif
                                        </div>
                                        <div>
                                            <small class="text-muted">Updated: {{ $entry->updated_at->diffForHumans() }}</small>
                                        </div>
                                    </td>
                                    <td style="width: 15%;">
                                        <div class="btn-group" role="group">
                                            <a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-sm btn-primary">
                                                <i class="la la-edit"></i> Edit
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
                        <h4>No Content Found</h4>
                        <p class="text-muted">Start by adding your first about page content section.</p>
                        <a href="{{ url($crud->route.'/create') }}" class="btn btn-primary">
                            <i class="la la-plus"></i> Add Content
                        </a>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
