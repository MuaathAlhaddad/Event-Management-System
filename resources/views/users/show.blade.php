@extends('layouts.app')
@section('content')
@push('css')
<style>
    th {
        color: {{config('styles.colors.primary')}};
    }
    table.table th {
        width: auto;
}
    #user-profile {
        color: {{config('styles.colors.primary')}};
    }
    #user-profile-container{
        padding: 10px;
        top: -100px;
        left: 40%;
        text-align: center;
        width: 200px;
        border-radius: 10px;
        background: white;
    }
    .card{
        margin-top: 100px;
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
                    <div class="position-relative" id="user-profile-container">
                        <i class="fas fa-user fa-10x" id="user-profile"></i>
                    </div>
                
                    <div class="card-body">
                        <div class="mb-2">
                             {{-- Nav Tabs  --}}
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Profile</a>
                                    <a class="nav-item nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                                    aria-controls="edit" aria-selected="false">More Info</a>                
                                </div>
                            </nav>

                            {{-- Tabs Content --}}
                            <div class="tab-content" id="nav-tabContent">
                                {{-- Profile --}}
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    {{ trans('cruds.user.fields.id') }}
                                                </th>
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Name
                                                </th>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    {{ trans('cruds.user.fields.email') }}
                                                </th>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    {{ trans('cruds.user.fields.created_at') }}
                                                </th>
                                                <td>
                                                    {{ $user->created_at->format('Y-m-d')  }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Roles
                                                </th>
                                                <td>
                                                    @foreach($user->roles as $id => $roles)
                                                      <span class="badge badge-info">{{ $roles->title }}</span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Edit --}}
                            <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                    <form action="{{ route('users.update', $user->id) }}" method="post" autocomplete="off" class="p-1">  
                                        @csrf
                                        @method('PATCH')
                                        <div class="pl-lg-4">
                                            {{-- Name --}}
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $user->name}}" required autofocus>
                        
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            {{-- Email --}}
                                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') ?? $user->email }}" required>
                        
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            {{-- Password --}}
                                            <div id="password-group" class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                                <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" required>
                                                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            {{-- User Role --}}
                                            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                                                <label for="user-role" class="form-control-label">{{__('User Role')}}*</label>
                                                <select class="form-control form-control-alternative select2" name="roles[]" id="input-user-role"
                                                    multiple required>
                                                    @forelse ($roles as $id => $role)
                                                    <option value="{{ $id }}">{{ $role }}</option>
                                                    @empty
                                                    <option value="">No Roles</option>
                                                    @endforelse
                                                </select>
                                                @if($errors->has('roles'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('roles') }}
                                                </em>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                            
                            
                
                            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                
                
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection