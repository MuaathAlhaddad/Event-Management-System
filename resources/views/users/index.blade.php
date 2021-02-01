@extends('layouts.app')
@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card shadow">
                    {{-- Header --}}
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                        @can('user_create')
                            <div class="col-4 text-right">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#user-modal"  id="create-btn">Add user</a>
                                @user_form()
                            </div>
                        @endcan
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-striped table-hover datatable datatable-User">
                            <thead>
                                <tr>
                                    <th width="10">
            
                                    </th>
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
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>
            
                                        </td>
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
                                        <td class="text-capitalize">
                                            @can('user_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('profile.edit', $user->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
            
                                            @can('user_delete')
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan
            
                                        </td>
            
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Footer --}}
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@datatablescript(['para' => ['delete' => 'user_delete', 'route' => "users/destroy", 'class' => '.datatable-User:not(.ajaxTable)']])
