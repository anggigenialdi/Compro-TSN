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
@foreach ($dataProduct as $jp)
    <div class="modal fade" id="editModal{{ $jp->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit Data {{ $jp->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form method="POST" action="{{ route('product.update', $jp->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="wrapper">
                                <div class="image">
                                    @foreach (explode(',', $jp->product_picture) as $image)
                                        <img id="output-{{ $jp->id }}"
                                            src="{{ asset('../products/' . $image) }}" title="image preview"
                                            class="img-thumbnail" width="200px" height="200px">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control form-control-user" name="title"
                                placeholder="{{ __('Title') }}" value="{{ $jp->title }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea class="form-control" id="description" rows="5" name="description" placeholder="{{ __('Description') }}"
                                value="{{ old('description') }}" required
                                autofocus>{{ $jp->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <section class="section">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Multiple Image</h5>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <!-- File uploader with multiple files upload -->
                                                    <input type="file" class="multiple-files-filepond" multiple required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
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