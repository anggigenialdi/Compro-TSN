<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Programs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="addModal" method="POST" action="{{ route('programs.create') }}"
                enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-body">

                    <div class="form-group">
                        <div class="wrapper">
                            <div class="image">
                                <img id="prview" src="{{ asset('no-img.png') }}"  title="image preview" class="img-thumbnail" width="200px" height="200px">
                                <input type="file" class="form-control form-control-user" name="picture"
                                    placeholder="{{ __('Foto') }}" value="{{ old('picture') }}" required
                                    autofocus id="imgInp">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control form-control-user" name="title"
                            placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea class="form-control" id="description" rows="5" name="description" placeholder="{{ __('Description') }}"
                                value="{{ old('description') }}" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Link Streaming</label>
                        <input type="text" class="form-control form-control-user" name="link"
                            placeholder="{{ __('link streaming') }}" value="{{ old('link') }}" required autofocus>
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
