@foreach ($dataJobPosition as $jp)
    <div class="modal fade" id="editModal{{ $jp->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit Job Position {{ $jp->position }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form class="addModal" method="POST" action="{{ route('MasterPosition.updatePosition', $jp->id) }}">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Position</label>
                            <input type="text" class="form-control form-control-user" name="position"
                                placeholder="{{ __('Job Position') }}" value="{{ $jp->position }}" required
                                autofocus>
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
