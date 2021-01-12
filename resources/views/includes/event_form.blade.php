    <style scoped>
        /* Recurrence btn style */
        .recurrence-btn {
            position: relative;
            display: inline-block;
            width: 200px;
        }

        .recurrence-btn .recurrence-label {
            display: block;
            background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important;
            color: white!important;
            border-radius: 5px;
            padding: 10px 20px;
            border: 2px solid black;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .recurrence-btn .recurrence-label:after,
        .recurrence-btn .recurrence-label:before {
            content: "";
            position: absolute;
            right: 11px;
            top: 11px;
            width: 20px;
            height: 20px;
            border-radius: 3px;
            background: white;
        }

        .recurrence-btn .recurrence-label:before {
            background: transparent;
            transition: 0.1s width cubic-bezier(0.075, 0.82, 0.165, 1) 0s, 0.3s height cubic-bezier(0.075, 0.82, 0.165, 2) 0.1s;
            z-index: 2;
            overflow: hidden;
            background-repeat: no-repeat;
            background-size: 13px;
            background-position: center;
            width: 0;
            height: 0;
            background-image: url("data:image/svg+xml;base64, PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNS4zIDEzLjIiPiAgPHBhdGggZmlsbD0iI2ZmZiIgZD0iTTE0LjcuOGwtLjQtLjRhMS43IDEuNyAwIDAgMC0yLjMuMUw1LjIgOC4yIDMgNi40YTEuNyAxLjcgMCAwIDAtMi4zLjFMLjQgN2ExLjcgMS43IDAgMCAwIC4xIDIuM2wzLjggMy41YTEuNyAxLjcgMCAwIDAgMi40LS4xTDE1IDMuMWExLjcgMS43IDAgMCAwLS4yLTIuM3oiIGRhdGEtbmFtZT0iUGZhZCA0Ii8+PC9zdmc+");
        }

        .recurrence-btn input[type="radio"] {
            display: none;
            position: absolute;
            width: 100%;
            appearance: none;
        }

        .recurrence-btn input[type="radio"]:checked+label {
            background: white;
            animation-name: blink;
            animation-duration: 1s;
            border-color: white;
        }

        .recurrence-btn input[type="radio"]:checked+label:after {
            background:#BA55D3!important;;
        }

        .recurrence-btn input[type="radio"]:checked+label:before {
            width: 20px;
            height: 20px;
        }
        /* End of Recurrence btn style */

        textarea{
            resize: none;
        }
        .file-upload-btn {
            width: 100%;
            margin: 0;
            color: white;
            background: white ;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 1px solid #ffc966;;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .file-upload-btn:hover {
            background: purple;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            color: white!important;
            background-color: rgb(233, 231, 231);
            border: 2px dashed #ffc966;
        }
        .image-dropping,
        .image-upload-wrap:hover .drag-text i {
            color: purple;
        }

        .image-dropping,
        .image-upload-wrap:hover .drag-text h3 {
            color: purple;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: purple;
            padding: 0 20px;
        }
        .drag-text i {
            font-size: 5rem;
            color: purple;
        }

        .file-upload-image {
            max-height: 300px;
            max-width: 300px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 400px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }
        div{
            color:purple;
        }
    </style>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    <!-- name & category-->
    <div class="form-row col-sm-12" style="font-size:16px">
        <!-- name -->
        <div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('cruds.event.fields.name') }}*</label>
            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" value="{{ old('name', isset($event) ? $event->name : '') }}" required>
            @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.event.fields.name_helper') }}
            </p>
        </div>
        <!-- category -->
        <div class="form-group col-sm-6 {{ $errors->has('category') ? 'has-error' : '' }}">
            <label for="category">{{ trans('cruds.event.fields.category') }}*</label>
            <select id="category" name="category" class="form-control {{ $errors->has('category') ? 'border-danger' : '' }}">
                <option selected value="">Choose...</option>
                @foreach(App\Event::CATEGORIES as $key => $category)
                     
                <option {{(old('category', isset($event) ? $event->category : '') === $category) ? 'selected' : ''}} value="{{$category}}">
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('category'))
                <em class="invalid-feedback">
                    {{ $errors->first('category') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.event.fields.category_helper') }}
            </p>
        </div>
    </div>

    <!-- start_time & end_time -->
    <div class="form-row col-sm-12" style="font-size:16px">
        <!-- start_time -->
        <div class="form-group col-sm-4 {{ $errors->has('start_time') ? 'has-error' : '' }}">
            <label for="start_time">{{ trans('cruds.event.fields.start_time') }}*</label>
            <input type="text" id="start_time" name="start_time" class="form-control datetime {{ $errors->has('start_time') ? 'border-danger' : '' }}" value="{{ old('start_time', isset($event) ? $event->start_time : '') }}" required>
            @if($errors->has('start_time'))
                <em class="invalid-feedback">
                    {{ $errors->first('start_time') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.event.fields.start_time_helper') }}
            </p>
        </div>

        <!-- end_time -->
        <div class="form-group col-sm-4 {{ $errors->has('end_time') ? 'has-error' : '' }}">
            <label for="end_time">{{ trans('cruds.event.fields.end_time') }}*</label>
            <input type="text" id="end_time" name="end_time" class="form-control datetime {{ $errors->has('end_time') ? 'border-danger' : '' }}" value="{{ old('end_time', isset($event) ? $event->end_time : '') }}" required>
            @if($errors->has('end_time'))
                <em class="invalid-feedback color-dark">
                    {{ $errors->first('end_time') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.event.fields.end_time_helper') }}
            </p>
        </div>

        <!-- Semester -->
        <div class="form-group col-sm-4 {{ $errors->has('semester') ? 'has-error' : '' }}" style="font-size:16px">
            <label for="semester">Semester:*</label>
            <select id="semester" name="semester" class="form-control {{ $errors->has('semester') ? 'border-danger' : '' }}">
                <option selected value="">Choose...</option>
                @foreach(App\Event::SEMESTERS as $key => $semester)
                     
                <option {{(old('semester', isset($event) ? $event->semester : '') === $semester) ? 'selected' : ''}} value="{{$semester}}">
                        {{ $semester }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('semester'))
                <em class="invalid-feedback">
                    {{ $errors->first('semester') }}
                </em>
            @endif
        </div>
    </div>

    <!-- location & desc -->
    <div class="form-row col-sm-12" style="font-size:16px">
        <!-- location -->
        <div class="form-group col-sm-6 {{ $errors->has('location') ? 'has-error' : '' }}">
            <label for="location">{{ trans('cruds.event.fields.location') }}*</label>
            <textarea id="location" name="location" class="form-control {{ $errors->has('location') ? 'border-danger' : '' }}" required rows="3">{{ old('location', isset($event) ? $event->location : '') }}</textarea>
            @if($errors->has('location'))
                <em class="invalid-feedback">
                    {{ $errors->first('location') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.event.fields.location_helper') }}
            </p>
        </div>
        <!-- desc -->
        <div class="form-group col-sm-6{{ $errors->has('desc') ? 'has-error' : '' }}">
            <label for="desc">{{ trans('cruds.event.fields.desc') }}*</label>
            <textarea id="desc" name="desc" class="form-control {{ $errors->has('desc') ? 'border-danger' : '' }}"  required rows="3">{{ old('desc', isset($event) ? $event->desc : '') }}</textarea>
            @if($errors->has('desc'))
                <em class="invalid-feedback">
                    {{ $errors->first('desc') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.event.fields.desc_helper') }}
            </p>
        </div>
    </div>

    <!-- points & max_no_attendees -->
    <div class="form-row col-sm-12" style="font-size:16px">
        <!-- points -->
        <div class="form-group col-sm-6 {{ $errors->has('points') ? 'has-error' : '' }}">
            <label for="points">{{ trans('cruds.event.fields.points') }}*</label>
            <input type="number" id="points" name="points" class="form-control {{ $errors->has('points') ? 'border-danger' : '' }}" value="{{ old('points', isset($event) ? $event->points : '') }}" required>
            @if($errors->has('points'))
                <em class="invalid-feedback">
                    {{ $errors->first('points') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.event.fields.points_helper') }}
            </p>
        </div>
        <!-- max_no_attendees -->
        <div class="form-group col-sm-6 {{ $errors->has('max_no_attendees') ? 'has-error' : '' }}" style="font-size:16px">
            <label for="max_no_attendees">{{ trans('cruds.event.fields.max_no_attendees') }}*</label>
            <input type="number" id="max_no_attendees" name="max_no_attendees" class="form-control {{ $errors->has('max_no_attendees') ? 'border-danger' : '' }}" value="{{ old('max_no_attendees', isset($event) ? $event->max_no_attendees : '') }}" required>
            @if($errors->has('max_no_attendees'))
                <em class="invalid-feedback">
                    {{ $errors->first('max_no_attendees') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.event.fields.max_no_attendees_helper') }}
            </p>
        </div>
    </div>

    @can('user_create')    
    <!-- Add  Attendees -->
    <div class="form-group {{ $errors->has('attendees_ids') ? 'has-error' : '' }}" style="font-size:16px">
        <label for="attendees_ids">{{ trans('cruds.event.fields.attendees_ids') }}</label>        
        <select name="attendees_ids[]" id="attendees_ids" data-live-search="true" data-max-options="5" class="form-control selectpicker" multiple="multiple">
            @foreach(App\User::all() as $key => $user)
                <option value="{{$user->id}}" {{ (in_array($user->id, (array) old('attendees_ids', isset($event) ? $event->attendees_ids : ''))) ? 'selected' : '' }}> 
                    {{ucwords( $user->first_name." ".$user->last_name) }} 
                </option>
            @endforeach
        </select>
        @if($errors->has('attendees_ids'))
            <em class="invalid-feedback">
                {{ $errors->first('attendees_ids') }}
            </em>
        @endif 
    </div>   
    @endcan 
     <!-- recurrence -->
    <div class="form-group {{ $errors->has('recurrence') ? 'has-error' : '' }}" style="font-size:16px">
        <label>{{ trans('cruds.event.fields.recurrence') }}*</label>
        @foreach(App\Event::RECURRENCE_RADIO as $key => $label)
        <div class="recurrence-btn">                                        
            <input type="radio" id="recurrence_{{ $key }}" name="recurrence" value="{{ $key }}" {{(old('recurrence', isset($event) ? $event->recurrence : '') === (string)$key) ? 'checked' : ''}} required/>
            <label class="recurrence-label" for="recurrence_{{ $key }}">{{ $label }}</label>
        </div>
        @endforeach
        
        @if($errors->has('recurrence'))
            <em class="invalid-feedback">
                {{ $errors->first('recurrence') }}
            </em>
        @endif
    </div>

     <!-- profile -->
    <div class="file-upload">
        <div class="form-group">
            <div class="image-upload-wrap border ">
                <input class="file-upload-input" type='file' onchange="readURL(this)" accept="image/*" name="profile" />
                <div class="drag-text">
                    <h3>Click or Drag & drop an image</h3>
                    <i class="fa fa-cloud-upload"></i>
                </div>
            </div>
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="remove-image">
                        <b>Remove</b> <span class="image-title">Uploaded Image</span>
                    </button>
                </div>
            </div>
        </div>
    <div class="text-center">
        <input class="btn btn-success w-25" style="font-weight: bold; font-family: system-ui; background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important;" type="submit" value="{{ trans('global.save') }}">
    </div>

    
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-upload-wrap').hide();

                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }
        $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
        });
    </script>