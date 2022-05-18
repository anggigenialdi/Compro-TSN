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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clear"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form method="POST" action="{{ route('employee.update', $jp->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="wrapper">
                                <div class="image">
                                    <img id="output-{{ $jp->id }}"
                                        src="{{ asset('../employee/' . $jp->profile_picture) }}" title="image preview"
                                        class="img-thumbnail" width="200px" height="200px">

                                    <input type="file" class="form-control form-control-user part"
                                        name="profile_picture" placeholder="{{ __('profile_picture') }}"
                                        value="{{ old('file') }}" autofocus id="profile_picture"
                                        onchange="document.getElementById('output-{{ $jp->id }}').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control form-control-user" name="full_name"
                                placeholder="{{ __('Full Name') }}" value="{{ $jp->full_name }}" required
                                autofocus>
                        </div>

                        <div class="form-group">
                            <label for="name">Job Type</label>
                            <select class="form-control type_job" name="type" required id="type_job-{{$jp->id}}" onchange="setTypeJob({{$jp->id}})">
                                <option value="">Pilih</option>
                                @foreach ($type as $typ)
                                    <option value="{{ $typ->id }}"
                                        {{ $typ->id == $jp->type ? 'selected' : '' }}>
                                        {{ $typ->type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Job Position</label>
                            <select class="form-control " id="job_position-{{$jp->id}}" name="job_position" required>
                                @foreach ($position as $p)
                                    <option value="{{ $p->id }}"
                                        {{ $p->id == $jp->job_position ? 'selected' : '' }} >
                                        {{ $p->position }}
                                    </option>
                                @endforeach
                            </select>
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
