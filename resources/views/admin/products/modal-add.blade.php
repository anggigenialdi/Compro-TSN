<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="addModal" method="POST" action="{{ route('product.create') }}"
                enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control form-control-user" name="title"
                            placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea class="form-control" id="description" rows="5" name="description" placeholder="{{ __('Description') }}"
                            value="{{ old('description') }}" required autofocus></textarea>
                    </div>

                    <div class="form-group">
                        <div class="input-group hdtuto control-group lst increment">
                            <input type="file" name="product_picture[]" class="myfrm form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button"><i
                                        class="fldemo fa fa-plus"></i> File</button>
                            </div>
                        </div>
                        <div class="clone hide" style="visibility:hidden">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                <input type="file" name="product_picture[]" class="myfrm form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button"><i
                                            class="fldemo fa fa-remove"></i> Remove</button>
                                </div>
                            </div>
                        </div>
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
