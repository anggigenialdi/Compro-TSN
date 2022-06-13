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
@foreach ($dataPrograms as $jp)
    <div class="modal fade" id="editModal{{ $jp->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit Data {{ $jp->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form method="POST" action="{{ route('programs.update', $jp->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="wrapper">
                                <div class="image">
                                    <img id="output-{{ $jp->id }}"
                                        src="{{ asset('../OurPrograms/' . $jp->picture) }}" title="image preview"
                                        class="img-thumbnail" width="200px" height="200px">

                                    <input type="file" class="form-control form-control-user part"
                                        name="picture" placeholder="{{ __('picture') }}"
                                        value="{{ old('file') }}" autofocus id="picture"
                                        onchange="document.getElementById('output-{{ $jp->id }}').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Titlw</label>
                            <input type="text" class="form-control form-control-user" name="title"
                                placeholder="{{ __('Title') }}" value="{{ $jp->title }}" required
                                autofocus>
                        </div>

                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea class="form-control" id="description" rows="5" name="description" placeholder="{{ __('Description') }}"
                                value="{{ old('description') }}" required
                                autofocus>{{ $jp->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="name">Link</label>
                            <input type="text" class="form-control form-control-user" name="link"
                                placeholder="{{ __('Link') }}" value="{{ $jp->link }}" required
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
