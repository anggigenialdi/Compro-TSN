<div class="modal fade" id="edit-{{$v->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit {{$v->masterPosition->position}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action=" {{ route('vacancy.updatejob',$v->id) }} " method="post" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                        <label for="name">Position</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="position" required>
                            <option value="">Pilih</option>
                            @foreach($position as $p)
                            <option value={{$p->id}}  
                                <?php
                                if ($v->position == $p->id) {
                                    echo "selected";
                                }
                                ?> >{{$p->position}}
                            </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category" required>
                                <option value="">Pilih</option>
                                @foreach($category as $p)
                                <option value={{$p->id}}  <?php
                                    if ($v->category == $p->id) {
                                        echo "selected";
                                    }
                                    ?> >{{$p->category}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="type" required>
                            <option value="">Pilih</option>
                            @foreach($type as $p)
                            <option value={{$p->id}}  <?php
                                if ($v->type == $p->id) {
                                    echo "selected";
                                }
                                ?> >{{$p->name}}</option>
                            @endforeach
                        </select>                        </div>
                        <div class="form-group">
                            <label>Tanggal Berakhir</label>
                            <input type="date" class="form-control" name="end_date" value="{{$v->end_date}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Aktif</label>
                            <select class="form-control" name="active">
                            <option value=0 <?php
                                if ($v->active == 0) {
                                    echo "selected";
                                }
                                ?> >Tidak</option>
                            <option value=1 <?php 
                                if ($v->active == 1) {
                                echo "selected";
                                }
                            ?>>Aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>