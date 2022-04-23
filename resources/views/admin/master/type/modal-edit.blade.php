@foreach ($dataType as $jp)
    <div class="modal fade" id="editModal{{ $jp->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit Job Type {{ $jp->type }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form class="addModal" method="POST" action="{{ route('MasterType.updateType', $jp->id) }}"
                    enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Type</label>
                            <input type="text" class="form-control form-control-user" name="type"
                                placeholder="{{ __('Type') }}" value="{{ $jp->type }}" required autofocus>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endforeach
