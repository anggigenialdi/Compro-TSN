<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Job Position</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="addModal"  method="POST" action="{{ route('vacancy.addjob') }}"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Position</label>
                        <input type="text" class="form-control form-control-user" name="position"
                            placeholder="{{ __('Job Position') }}" value="{{ old('position') }}"
                            required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" class="form-control form-control-user" name="category"
                            placeholder="{{ __('Category') }}" value="{{ old('category') }}"
                            required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="name">Type</label>
                        <input type="text" class="form-control form-control-user" name="type"
                            placeholder="{{ __('Type') }}" value="{{ old('type') }}"
                            required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="name">End Date</label>
                        <input type="date" class="form-control form-control-user" name="end_date"
                            placeholder="{{ __('end_date') }}" value="{{ old('end_date') }}"
                            required autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>
