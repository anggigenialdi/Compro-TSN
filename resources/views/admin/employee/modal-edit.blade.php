<style>
    .wrapper {
        text-align: center;
    }

    .image,
    .form {
        display: inline-block;
        vertical-align: top;
    }

</style>
@foreach ($dataEmployee as $jp)
    <div class="modal fade" id="editModal{{ $jp->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit Data {{ $jp->full_name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form class="addModal" method="POST" action="{{ route('employee.update', $jp->id) }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="wrapper">
                                <div class="image">
                                    <img src="../employee/{{ $jp->profile_picture }}" width=100 height=100/>
                                </div>
                            

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control form-control-user" name="full_name"
                                placeholder="{{ __('Full Name') }}" value="{{ $jp->full_name }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="name">Position</label>
                            <input type="text" class="position form-control form-control-user" name="job_position"
                                placeholder="{{ __('Job Position') }}" value="{{ $jp->job_position }}" required
                                autofocus>
                        </div>
                        <div class="form-group">
                            <label for="name">Type</label>
                            <input type="text" class="type form-control form-control-user" name="type"
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
