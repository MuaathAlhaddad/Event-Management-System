@extends('layouts.app')
@section('content')
@card_style()
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @user_form() --}}
        </form>
    </div>
</div>
@endsection