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
            <form class="addModal add-data"  method="POST" action="{{ route('vacancy.addjob') }}"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Position</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="position" required>
                            <option value="">Pilih</option>
                            @foreach($position as $p)
                            <option value={{$p->id}}>{{$p->position}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category" required>
                            <option value="">Pilih</option>
                            @foreach($category as $cat)
                            <option value={{$cat->id}}>{{$cat->category}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="name">Type</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="type" required>
                            <option value="">Pilih</option>
                            @foreach($type as $t)
                            <option value={{$t->id}}>{{$t->type}}</option>
                            @endforeach
                        </select>
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

