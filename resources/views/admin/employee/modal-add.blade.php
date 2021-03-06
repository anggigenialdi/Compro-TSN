<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="addModal" method="POST" action="{{ route('employee.create') }}"
                enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-body">

                    <div class="form-group">
                        <div class="wrapper">
                            <div class="image">
                                <img id="prview" src="{{ asset('no-img.png') }}" title="image preview"
                                    class="img-thumbnail" width="200px" height="200px">
                                <input type="file" class="form-control form-control-user" name="profile_picture"
                                    placeholder="{{ __('Foto') }}" value="{{ old('profile_picture') }}" required
                                    autofocus id="imgInp">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control form-control-user" name="full_name"
                            placeholder="{{ __('Full Name') }}" value="{{ old('full_name') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="name">Job Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Pilih</option>
                            @foreach ($type as $t)
                                <option value={{ $t->id }}>{{ $t->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Job Position</label>
                        <select class="form-control job" id="job" name="job_position" required>
                        </select>
                    </div>

                    <div id="ex">
                        
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                </div>


            </form>
        </div>
    </div>
</div>
