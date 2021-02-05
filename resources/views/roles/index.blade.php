@extends('layouts.app')
@section('content')


@push('css')
    <style>
        th, td{
            vertical-align: middle !important;
        }
        .row-permissions{
            white-space: normal !important; word-wrap: break-word;
        }
    </style>
@endpush

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                
                {{-- alert Display --}}
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card shadow">
                    {{-- Grid Header --}}
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Roles</h3>
                            </div>
                            @can('role_create')
                            <div class="col-4 text-right">
                                <a  href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#role-modal"  id="create-btn">Add Role</a>
                            @include('includes.role_modal_form')
                            </div>
                            @endcan
                        </div>
                    </div>

                    <div class="col-12">
                    </div>
                    {{-- Grid --}}
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-striped table-hover datatable datatable-User">
                            <thead>
                                <tr>
                                    <th rowspan="2">
                                        {{ trans('cruds.role.fields.id') }}
                                    </th>
                                    <th rowspan="2">
                                        {{ trans('cruds.role.fields.title') }}
                                    </th>
                                    <th colspan="{{ $permission_resources->count() }}">
                                        {{ trans('cruds.role.fields.permissions') }}
                                    </th>
                                    <th rowspan="2">
                                        Actions
                                    </th>
                                </tr>
                                <tr>
                                    @foreach ($permission_resources as $resource)
                                    <th>
                                        <span class="badge badge-danger">{{ ucfirst($resource) }}</span>
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key => $role)
                                    <tr data-entry-id="{{ $role->id }}">
                                        <td>
                                            {{ $role->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $role->title ?? '' }}
                                        </td>
                                        @php
                                            $resources_table = [];
                                            foreach ($permission_resources as $resource) {
                                                $resource_permissions[$resource] = $role->permissions->filter(function ($permission) use($resource) {
                                                    return $permission->resource  == $resource;
                                                });
                                            }
                                        @endphp

                                        @forelse ($permission_resources as $resource)
                                        <td class="row-permissions">
                                            @forelse ($resource_permissions[$resource] as $permission)
                                                <span class="badge badge-info">{{ $permission->title }}</span>
                                            @empty
                                                <span class="badge badge-warning"> No Permission </span>
                                            @endforelse
                                        </td>
                                        @empty
                                            <td class="row-permissions">
                                                <span class="badge badge-warning"> No Permission Resources </span>
                                            </td>
                                        @endforelse
                                        <td>
                                            @can('role_edit')
                                                <a class="btn btn-sm btn-info" href="{{ route('roles.edit', $role->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
            
                                            @can('role_delete')
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-sm btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan
            
                                        </td>
            
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('role_delete')
        let deleteButtonTrans = '{{ trans('
        global.datatables.delete ') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('roles.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('
                        global.datatables.zero_selected ') }}')

                    return
                }

                if (confirm('{{ trans('
                        global.areYouSure ') }}')) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function () {
                            location.reload()
                        })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            order: [
                [1, 'desc']
            ],
            pageLength: 100,
        });
        $('.datatable-Role:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })

</script>
@endsection