@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
<!-- Modal for Create  Permission -->
  <div class="modal fade text-left" id="permission-modal" tabindex="-1" role="dialog" aria-labelledby="permission-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="permission-modal-label">New Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route("permissions.store") }}" method="POST" enctype="multipart/form-data" id="permission-form">
                @csrf
                {{-- Title  --}}
                <div class="form-group">
                    <label for="title">{{ trans('cruds.role.fields.title') }}*</label>
                    <input type="text" id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title' ?? '') }}" required>
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                </div>
                {{-- Resource --}}
                <div class="form-group {{ $errors->has('resource') ? 'has-danger' : '' }}">
                    <label for="resource" class="d-block">Resource*</label>
                    <select  name="resource"  id="input-resource" class="form-control js-resource-tags {{ $errors->has('resource') ? 'is-invalid' : '' }}" >
                        @forelse ($resource_permissions as $resource => $permissions)
                                <option value=' {{ $resource }} ' {{ old('resource') ? 'selected' : '' }}>{{ $resource }}</option>                        
                        @empty
                        No  Resources
                        @endforelse
                    </select>
                    @if($errors->has('resource'))
                        <em class="invalid-feedback">
                            {{ $errors->first('resource') }}
                        </em>
                    @endif
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="close-modal">Reset</button>
          <button type="button" class="btn btn-success" onclick="event.preventDefault(); $('#permission-form').submit();">Save changes</button>
        </div>
      </div>
    </div>
</div>

@push('js')
    @if ($errors->any())
    <script>
           $(document).ready(function(){
                    $('#permission-modal').modal({
                        show: true,
                        backdrop: 'static'
                    });
            });
    </script>    
    @endif
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
    <script>
        // Resource Select 
        $(document).ready(function(){
            $(".js-resource-tags").select2({
                    tags: true, 
                    dropdownParent: $('#permission-modal'),
                    width: '300px',
                    dropdownAutoWidth: true,
            });
        })
        $('.check').select2({
            
        });

        // clear inputs when closing the Modal
        $('#permission-modal').on('hidden.bs.modal', function() {
                $(this).find("input, select").val("").end();
        })
    </script>
@endpush