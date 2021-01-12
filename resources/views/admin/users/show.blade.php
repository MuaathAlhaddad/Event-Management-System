@extends('layouts.admin')
@section('content')
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
        bottom: 450px;
        text-align: center;
        border-radius: 10px;
        background: white;
    }
    .card{
        margin-top: 100px;
        padding-top: 100px;
        height: 550px;
        align-items: center;
    }

    .nav :hover{
        color:white!important;
    }
</style>

<div class="card">
    <div class="position-absolute" id="user-profile-container">
        <i class="fas fa-user fa-10x" id="user-profile"></i>
    </div>

    <div class="card-body" style="position: absolute;
    top: 80px;
    margin-top: 30px;
    width: 500px;">
        <div class="mb-2">



            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false" style=" color: purple;font-size:16px!important;"><b>Profile<b></a>
                    <a class="nav-item nav-link" id="more-info-tab" data-toggle="tab" href="#more-info" role="tab"
                        aria-controls="more-info" aria-selected="false" style=" color: purple; font-size:16px!important; float: left!important;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; More Info</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                {{-- profile Tab --}}
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                    aria-labelledby="nav-profile-tab">
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
                                    {{ trans('cruds.user.fields.first_name') }}
                                </th>
                                <td>
                                    {{ $user->first_name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.last_name') }}
                                </th>
                                <td>
                                    {{ $user->last_name }}
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
                                    {{ trans('cruds.user.fields.phone_number') }}
                                </th>
                                <td>
                                    {{ $user->phone_number }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- More info Tab --}}
                <div class="tab-pane fade" id="more-info" role="tabpanel" aria-labelledby="more-info-tab">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.gender') }}
                                </th>
                                <td>
                                    {{ $user->gender }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.kulliyyah') }}
                                </th>
                                <td>
                                    {{ $user->kulliyyah }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.points_earned') }}
                                </th>
                                <td>
                                    {{ $user->points_earned ??  'No Points Earned Yet' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Roles
                                </th>
                                <td>
                                    @foreach($user->roles as $id => $roles)
                                    <span class="label label-info label-many">{{ $roles->title }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.created_at') }}
                                </th>
                                <td>
                                    {{ $user->created_at  }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- More info Tab --}}
                <div class="tab-pane fade" id="more-info" role="tabpanel" aria-labelledby="more-info-tab">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.gender') }}
                                </th>
                                <td>
                                    {{ $user->gender }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.kulliyyah') }}
                                </th>
                                <td>
                                    {{ $user->kulliyyah }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.points_earned') }}
                                </th>
                                <td>
                                    {{ $user->points_earned ??  'No Points Earned Yet' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Roles
                                </th>
                                <td>
                                    @foreach($user->roles as $id => $roles)
                                    <span class="label label-info label-many">{{ $roles->title }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.created_at') }}
                                </th>
                                <td>
                                    {{ $user->created_at  }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <a style="margin-top:20px; background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important; color:white!important; border:none!important; font-size:14px!important;" class="btn btn-default"  href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>

@endsection