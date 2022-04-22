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
            <form class="addModal" action="/admin/user" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control form-control-input" name="name"
                            placeholder="Enter Full Name" required />
                        <div class="name error" id="error"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control form-control-input" name="email"
                            placeholder="Enter Email Address..." required />
                        <div class="email error" id="error"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-input" id="password" name="password"
                            placeholder="Enter Password" required />
                        <div class="email error" id="error"></div>
                    </div>
                    <div class="form-group">
                        <label for="role">Roles:</label>
                        <select class="form-control" name="role" id="role" require>
                            <option value="" disabled="disabled" selected="selected">
                                –Please choose an option–
                            </option>
                            <option value="basic">Basic</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Input your image</label>
                        <input type="file" class="form-control form-control-file" id="image" name="image" required />
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
