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
                                <a  href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#permission-modal"  id="create-btn">Add Role</a>
                            @include('includes.permission_modal_form')
                            </div>
                            @endcan
                        </div>
                    </div>

                    <div class="col-12">
                    </div>
                    {{-- Grid --}}
                    <div class="table-responsive">
                        <table class="table table-bordered text-center  datatable datatable-User">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.permission.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.permission.fields.title') }}
                                    </th>
                                    <th>
                                        Resource
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                    @forelse ($permissions as $permission)
                                        <tr data-entry-id="{{ $permission->id }}">
                                            <td>
                                                {{ $permission->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $permission->title ?? '' }}
                                            </td>
                                            <td>
                                                <span class="badge badge-dark">
                                                    {{ $permission->resource ?? '' }}
                                                </span>
                                            </td>
                                            <td>
                                                @can('permission_edit')
                                                    <a  href="{{ route('permissions.edit', $permission->id) }}">
                                                        <i class="far fa-edit text-primary"></i>
                                                    </a>
                                                @endcan
                    
                                                @can('permission_delete')
                                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <i class="far fa-trash-alt text-danger delete-btn" style=" cursor: pointer;"></i> 
                                                    </form>
                                                @endcan
                    
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">No Permission</td>
                                    </tr>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="card-footer py-4">
                        {{ $permissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-btn').on('click', function() {
                swal({
                        title: "Are you sure?",
                        text: "you want to delete this Permission!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest('form').submit();
                        swal("Poof! Permission has been deleted!", {
                        icon: "success",
                        buttons: false,
                        });
                    } else {
                        swal("Permission is safe!", {
                            buttons: false,
                        });
                    }
                });
        });
    </script>
@endpush
@endsection