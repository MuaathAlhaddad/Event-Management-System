<style>
body{
        background-color:#E6E6FA!important;
}
/* .card .btn{
    background-color: #E6E6FA!important;
    color: black;
    border: none;
} */
#card-body .btn {
    color:black!important;
    font-size:14px!important; 
    background-color:#E6E6FA!important;

}

.card .btn{
    background-color: #E6E6FA!important;
    color: black!important;
    border: none;
}

a, .card :hover{
border-color: white!important;
color:white!important;
}

</style>


@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12 ">
            <a class="btn text-capitalize font-weight-bold"  style="background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important;color:white!important;" href="{{ route("admin.users.create") }}">
                <i class="fas fa-user-plus mr-2"></i> {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
@endcan
@card_style()
<div class="card">

    <div class="card-header">
        <form  method="post" id="max-star-points">
            Maximum Star Points to be Earned: <input type="text" name="max_points" class="control-input"  value="{{$max_star_points}}"> 
            <button type="submit" class="btn">Set</button>
        </form>
    </div>

    <div class="card-body"  style="background-color:white!important;">
            <table class="table table-bordered text-center table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.full_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            Star Points EARNED
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
                                {{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }} 
                            </td>
                            <td class="text-lowercase">
                                {{ $user->email ?? '' }}
                            </td>
                            <td >
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info" style="background-color:#663399!important; border-color:#BA55D3; color:white!important; margin: 1px!important; margin-top:15px!important;" >{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td class="text-lowercase">{{ $user->points_earned ??  'No Points Earned Yet' }}</td>
                            <td class="text-capitalize">
                                @can('user_show')
                                    <a class="btn btn-xs btn-primary" style="background-color:#BA55D3!important; border-color:#BA55D3; color:white!important; margin: 1px!important; margin-top:15px!important;" href="{{ route('admin.users.show', $user->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a class="btn btn-xs btn-warning text-white" style="background-color:#9400D3!important; border-color:#9400D3; color:white!important;margin: 1px!important; margin-top:15px!important;" href="{{ route('admin.users.edit', $user->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_delete')
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" style="background-color:#663399!important; border-color:#663399; color:white!important; margin: 1px!important; margin-top:15px!important;" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">

    $("#max-star-points").submit(function(e) {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
        });
        e.preventDefault();
        let max_points = $("input[name=max_points]").val();  

        $.ajax({
                type: "POST",
                url : "{{route('setMaxPoints')}}",
                data: { max_points: max_points },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    alert(data.msg);
                    $("input[name=max_points]").val(data.max_points)
                }, 
                error: function (data) {
                    console.log(data);
                }
            })
        });
                
</script>
@endsection
@datatablescript(['para' => ['delete' => 'user_delete', 'route' => "users/destroy", 'class' => '.datatable-User:not(.ajaxTable)']])