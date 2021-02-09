@extends('layouts.app')
@section('content')
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
                                <h3 class="mb-0">Users</h3>
                            </div>
                        @can('user_create')
                            <div class="col-4 text-right">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#user-modal"  id="create-btn">Add user</a>
                                @include('includes.user_modal_form')
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
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>
                                    <th>
                                        Created at
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>
                                            {{ $user->id ?? '' }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $user->name ?? ''}} 
                                        </td>
                                        <td class="text-lowercase">
                                            {{ $user->email ?? '' }}
                                        </td>
                                        <td >
                                            @foreach($user->roles as $key => $item)
                                                <span class="badge badge-info">{{ $item->title }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-lowercase">
                                            {{ $user->created_at->format('Y-m-d') }}
                                        </td>
                                        <td class="text-capitalize" >
                                            @can('user_show')
                                                <a  href="{{ route('users.show', $user->id) }}">
                                                    <i class="far fa-edit text-primary"></i>
                                                </a>
                                            @endcan
            
                                            @can('user_delete')
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <i class="far fa-trash-alt text-danger delete-btn" style=" cursor: pointer;"></i> 
                                                </form>
                                            @endcan
            
                                        </td>
            
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Pagination --}}
                    <div class="card-footer py-4">
                        {{ $users->links() }}
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
                        text: "you want to delete this user!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest('form').submit();
                        swal("Poof! User has been deleted!", {
                        icon: "success",
                        buttons: false,
                        });
                    } else {
                        swal("User is safe!", {
                            buttons: false,
                        });
                    }
                });
        });
    </script>
@endpush
@endsection
