@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
<form action="{{ route('users.update', $user->id) }}" method="post" autocomplete="off" class="p-1" id="form-user-edit">  
    @csrf
    @method('PATCH')
    <div class="pl-lg-4">
        <div class="row mt-3">
            {{-- Name --}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Name') }}*</label>
                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $user->name}}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- Email --}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-email">{{ __('Email') }}*</label>
                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') ?? $user->email }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Password --}}
            <div class="col-md-6">
                <div id="password-group" class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                    
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- Phone --}}
            <div class="col-md-6">
                <div id="phone-group" class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-phone">Phone Number</label>
                    <input type="text" name="phone" id="input-phone" value="{{ $user->phone }}" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Phone Number">
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Sex --}}
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('sex') ? 'has-error' : '' }}">
                    <label for="sex" class="form-control-label">Gender</label>
                    <select class="form-control form-control-alternative" name="sex" id="input-sex" required>
                        <option value="m" {{ $user->sex === 'm' ? 'selected' : ''}}>Male</option>
                        <option value="f" {{ $user->sex === 'm' ? 'selected' : ''}}>Female</option>
                    </select>
                    @if($errors->has('sex'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sex') }}
                    </em>
                    @endif
                </div>
            </div>
            {{-- DOB --}}
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
                    <label for="dob" class="form-control-label">Date of Birth</label>
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input  name="dob" class="form-control datepicker" placeholder="Select Date of Brith" type="text" value="{{ $user->dob }}">
                    </div>
                    @if($errors->has('dob'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </em>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Country --}}
            <div class="col-md-6">
                <div class="form-group" {{ $errors->has('country') ? 'has-error' : '' }}>
                    <label for="country" class="form-control-label">Country</label>
                    <select class="form-control form-control-alternative" name="country" id="country" required>
                        <option value="">Select a country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->name }}" {{ $user->country === $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('country'))
                        <em class="invalid-feedback">
                            {{ $errors->first('country') }}
                        </em>
                    @endif
                </div>
            </div>
            {{-- states --}}
            <div class="col-md-6">
                <div class="form-group" {{ $errors->has('state') ? 'has-error' : '' }}>
                    <label for="state" class="form-control-label">State</label>
                    <select class="form-control form-control-alternative" name="state" required id="state" {{ !isset($user->country) ? 'disabled' : '' }}>
                        <option value="">Select a state</option>
                        @isset($user->country)
                        @php
                            $country = App\Models\Country::whereName($user->country)->first();
                            $country->load('states');
                        @endphp
                            @foreach($country->states as $state)
                                <option value="{{ $state->name }}" {{ $user->state === $state->name ? 'selected' : '' }}>{{ $state->name }}</option>
                            @endforeach
                        @endisset
                    </select>
                    @if($errors->has('state'))
                        <em class="invalid-feedback">
                            {{ $errors->first('state') }}
                        </em>
                    @endif
                </div>
            </div>
        </div>
        {{-- User Role --}}
        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
            <label for="user-role" class="form-control-label">{{__('User Role')}}*</label>
            <select class="form-control form-control-alternative select2" name="roles[]" id="input-user-role"
                multiple required>
                @forelse ($allRoles as $id => $role)
                <option value="{{ $id }}" {{ $user->roles->pluck('title', 'id')->search($role) ? 'selected' : ''  }} >{{ $role }}</option>
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

    <div class="text-center">
        <button class="btn btn-success" id="save-changes">Save</button>
    </div>
</form>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
          $(document).ready(function () {
            

            var multipleCancelButton = new Choices('#input-user-role', {
                removeItemButton: true,
                maxItemCount: 5,
                searchResultLimit: 5,
                renderChoiceLimit: 5
            });

            $('#country').on('change', function() {
                var country  = $(this).val();
                $('#state').removeAttr('disabled');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST', 
                    url: " {{ route('country.states')  }} ",

                    data: {'country': country}, 
                    dataType: 'json',
                    success: function (res) {
                        var options = [];
                        res.states.forEach(state => {
                            options += '<option value="'+ state.name +'">'+state.name+'</option>';
                        });

                        $('select[name="state"]').html(options);
                    },
                    fail: function(e) {
                        console.log(e);
                    },
                });
            });

            $('#save-changes').on('click', function(e) {
                e.preventDefault();
                $('#form-user-edit').submit();
            });
        });
    </script>

@endpush