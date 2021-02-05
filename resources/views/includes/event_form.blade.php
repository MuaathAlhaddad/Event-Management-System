    <style scoped>
        /* Recurrence btn style */
        .recurrence-btn {
            position: relative;
            display: inline-block;
            width: 200px;
        }

        .recurrence-btn .recurrence-label {
            display: block;
            background: #ffdb99;
            color: #444;
            border-radius: 5px;
            padding: 10px 20px;
            border: 2px solid #ffc966;
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
            background: #ffc04d;
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
            background: #ffc04d;
            animation-name: blink;
            animation-duration: 1s;
            border-color: orange;
        }

        .recurrence-btn input[type="radio"]:checked+label:after {
            background: orange;
        }

        .recurrence-btn input[type="radio"]:checked+label:before {
            width: 20px;
            height: 20px;
        }
        /* End of Recurrence btn style */

        textarea{
            resize: none;
        }
    </style>

    <!-- name & category-->
    <div class="form-row col-sm-12">
        <!-- name -->
        <div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('cruds.event.fields.name') }}*</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($event) ? $event->name : '') }}" required>
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
            <select id="category" name="category" class="form-control">
                <option selected value="">Choose...</option>
                @foreach(App\Models\Event::CATEGORIES as $key => $category)
                     
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
    <div class="form-row col-sm-12">
        <!-- start_time -->
        <div class="form-group col-sm-6 {{ $errors->has('start_time') ? 'has-error' : '' }}">
            <label for="start_time">{{ trans('cruds.event.fields.start_time') }}*</label>
            <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($event) ? $event->start_time : '') }}" required>
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
        <div class="form-group col-sm-6 {{ $errors->has('end_time') ? 'has-error' : '' }}">
            <label for="end_time">{{ trans('cruds.event.fields.end_time') }}*</label>
            <input type="text" id="end_time" name="end_time" class="form-control datetime" value="{{ old('end_time', isset($event) ? $event->end_time : '') }}" required>
            @if($errors->has('end_time'))
                <em class="invalid-feedback">
                    {{ $errors->first('end_time') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.event.fields.end_time_helper') }}
            </p>
        </div>
    </div>

    <!-- location & desc -->
    <div class="form-row col-sm-12">
        <!-- location -->
        <div class="form-group col-sm-6 {{ $errors->has('location') ? 'has-error' : '' }}">
            <label for="location">{{ trans('cruds.event.fields.location') }}*</label>
            <textarea id="location" name="location" class="form-control" required rows="3">{{ old('location', isset($event) ? $event->location : '') }}</textarea>
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
            <textarea id="desc" name="desc" class="form-control"  required rows="3">{{ old('desc', isset($event) ? $event->desc : '') }}</textarea>
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
    <div class="form-row col-sm-12">
        <!-- points -->
        <div class="form-group col-sm-6 {{ $errors->has('points') ? 'has-error' : '' }}">
            <label for="points">{{ trans('cruds.event.fields.points') }}*</label>
            <input type="number" id="points" name="points" class="form-control" value="{{ old('points', isset($event) ? $event->points : '') }}" required>
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
        <div class="form-group col-sm-6 {{ $errors->has('max_no_attendees') ? 'has-error' : '' }}">
            <label for="max_no_attendees">{{ trans('cruds.event.fields.max_no_attendees') }}*</label>
            <input type="number" id="max_no_attendees" name="max_no_attendees" class="form-control" value="{{ old('max_no_attendees', isset($event) ? $event->max_no_attendees : '') }}" required>
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

    <!-- Add  Attendees -->
    <div class="form-group {{ $errors->has('attendees_ids') ? 'has-error' : '' }}">
        <label for="attendees_ids">{{ trans('cruds.event.fields.attendees_ids') }}*</label>        
        <select name="attendees_ids[]" id="attendees_ids" data-live-search="true" data-max-options="5" class="form-control selectpicker" multiple="multiple">
            @foreach(App\Models\User::all() as $key => $user)
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
     <!-- recurrence -->
    <div class="form-group {{ $errors->has('recurrence') ? 'has-error' : '' }}">
        <label>{{ trans('cruds.event.fields.recurrence') }}*</label>
        @foreach(App\Models\Event::RECURRENCE_RADIO as $key => $label)
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
    <div class="text-center">
        <input class="btn btn-success w-25" style="font-weight: bold; font-family: system-ui;" type="submit" value="{{ trans('global.save') }}">
    </div>