    <!-- first_name & last_name-->
    <div class="form-row col-sm-12">
        <!-- first_name -->
        <div class="form-group col-sm-6 {{ $errors->has('first_name') ? 'has-error' : '' }}">
            <label for="first_name">{{ trans('cruds.user.fields.first_name') }}*</label>
            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($user) ? $user->first_name : '') }}" required>
            @if($errors->has('first_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('first_name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.name_helper') }}
            </p>
        </div>

        <!-- last_name -->
        <div class="form-group col-sm-6 {{ $errors->has('last_name') ? 'has-error' : '' }}">
            <label for="last_name">{{ trans('cruds.user.fields.last_name') }}*</label>
            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($user) ? $user->last_name : '') }}" required>
            @if($errors->has('last_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('last_name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.name_helper') }}
            </p>
        </div>
    </div>

    <!-- email & phone_number -->
    <div class="form-row col-sm-12">
        <!-- email -->
        <div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
            @if($errors->has('email'))
                <em class="invalid-feedback">
                    {{ $errors->first('email') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.email_helper') }}
            </p>
        </div>
        <!-- phone_number -->
        <div class="form-group col-sm-6 {{ $errors->has('phone_number') ? 'has-error' : '' }}">
            <label for="phone_number">{{ trans('cruds.user.fields.phone_number') }}*</label>
            <input type="phone_number" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', isset($user) ? $user->phone_number : '') }}" required>
            @if($errors->has('phone_number'))
                <em class="invalid-feedback">
                    {{ $errors->first('phone_number') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.phone_number_helper') }}
            </p>
        </div>
    </div>

    <!-- gender & kulliyyah -->
    <div class="form-row col-sm-12 algin-items-center">
        <!-- gender -->
        <div class="form-group col-sm-6 {{ $errors->has('gender') ? 'has-error' : '' }}">
            <label for="gender" class="d-block">{{ trans('cruds.user.fields.gender') }}*</label>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="gender" id="male" value="male" class="custom-control-input">
                <label class="custom-control-label text-capitalize" for="male">Male</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="gender" id="female" value="female"  class="custom-control-input">
                <label class="custom-control-label text-capitalize" for="female">Female</label>
            </div>
            @if($errors->has('gender'))
                <em class="invalid-feedback">
                    {{ $errors->first('gender') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.gender_helper') }}
            </p>
        </div>
        
        <!-- kulliyyah -->
        <div class="form-group col-sm-6 {{ $errors->has('kulliyyah') ? 'has-error' : '' }}">
            <label for="kulliyyah">{{ trans('cruds.user.fields.kulliyyah') }}*</label>
            <select id="kulliyyah" name="kulliyyah" class="form-control">
                <option selected value="">Choose...</option>
                @foreach (config('constant_variables.kulliyyahs') as $kulliyyah) 
                <option value="{{ $kulliyyah }}">{{$kulliyyah}}</option>
                @endforeach
            </select>
            @if($errors->has('kulliyyah'))
                <em class="invalid-feedback">
                    {{ $errors->first('kulliyyah') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.user.fields.kulliyyah_helper') }}
            </p>
        </div>
    </div>

    <!-- password -->
    <div class="form-group col-sm-12 {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input type="password" id="password" name="password" class="form-control">
        @if($errors->has('password'))
            <em class="invalid-feedback">
                {{ $errors->first('password') }}
            </em>
        @endif
        <p class="helper-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </p>
    </div>

    <!-- role -->
    <div class="form-group col-sm-12 {{ $errors->has('roles') ? 'has-error' : '' }}">
        <label for="roles">{{ trans('cruds.user.fields.roles') }}*
            <span class="btn btn-info btn-xs select-all" style="background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important; color:white!important; border:none!important; font-size:14px!important;">{{ trans('global.select_all') }}</span>
            <span class="btn btn-info btn-xs deselect-all" style="background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important; color:white!important; border:none!important; font-size:14px!important;">{{ trans('global.deselect_all') }}</span></label>
        <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
            @foreach($roles as $id => $roles)
                <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
            @endforeach
        </select>
        @if($errors->has('roles'))
            <em class="invalid-feedback">
                {{ $errors->first('roles') }}
            </em>
        @endif
        <p class="helper-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </p>
    </div>
    <div class="text-center">
        <input class="btn btn-success w-25" style="font-weight: bold; font-family: system-ui;background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important; color:white!important; border:none!important; font-size:14px!important;" type="submit" value="{{ trans('global.save') }}">
    </div>