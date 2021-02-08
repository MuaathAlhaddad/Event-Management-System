 @push('css')
     <link rel="stylesheet" type="text/css" href=" {{ asset('argon/css/multi-select.css') }} ">
 @endpush
 <!-- Modal for Create and Edit Role-->
  <div class="modal fade text-left" id="role-modal" tabindex="-1" role="dialog" aria-labelledby="role-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="role-modal-label">New Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route("roles.store") }}" method="POST" id="role-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{ trans('cruds.role.fields.title') }}*</label>
                    <input type="text" id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title' ?? '') }}" required>
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                </div>
                {{-- Permissions --}}
                <div class="form-group {{ $errors->has('permissions') ? 'has-danger' : '' }}">
                    <label for="permissions">{{ trans('cruds.role.fields.permissions') }}*
                        <a href='#' id='deselect-all' class="btn btn-sm btn-danger">Deselect All</a>
                        <a href='#' id='select-all' class="btn btn-sm btn-primary">Select All</a>
                    </label>
                    <select  name="permissions[]"  id="input-permissions" multiple class="form-control {{ $errors->has('permissions') ? 'is-invalid' : '' }}" >
                        @forelse ($resource_permissions as $resource => $permissions)
                        <optgroup label='{{ ucfirst($resource) }}'>
                            @forelse ($permissions as $id =>  $permission)
                                <option value=' {{ $permission->id }} ' {{ (in_array($permission->id, old('permissions', []))) ? 'selected' : '' }}>{{ $permission->title }}</option>                        
                            @empty
                                
                            @endforelse
                        </optgroup>    
                        @empty
                            No Permission Resources
                        @endforelse
                    </select>
                    @if($errors->has('permissions'))
                        <em class="invalid-feedback">
                            {{ $errors->first('permissions') }}
                        </em>
                    @endif
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="close-modal">Reset</button>
          <button type="button" class="btn btn-success" onclick="event.preventDefault(); $('#role-form').submit();">Save changes</button>
        </div>
      </div>
    </div>
</div>

@push('js')
    @if ($errors->any())
    <script>
           $(document).ready(function(){
                    $('#role-modal').modal({
                        show: true,
                        backdrop: 'static'
                    });
            });
    </script>    
    @endif
  <script src="  {{ asset('argon/js/jquery.multi-select.js') }}"></script>
    <script>
        // multiSelect
       $('#input-permissions').multiSelect({
           selectableOptgroup: true
       });
       $('#select-all').click(function () {
           $('#input-permissions').multiSelect('select_all');
           return false;
       });
       $('#deselect-all').click(function () {
           $('#input-permissions').multiSelect('deselect_all');
           return false;
       });

        // clear inputs when closing the Modal
        $('#role-modal').on('hidden.bs.modal', function() {
                $(this).find("input, select").val("").end();
        })
    </script>
@endpush