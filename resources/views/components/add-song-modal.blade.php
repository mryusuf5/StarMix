<div class="modal fade" id="addSongModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{$action}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add song to library</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <h3>Fields with a <span class="text-danger">*</span> are required</h3>
                    </div>
                    <div class="form-group">
                        <label>Cover</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Song <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="song">
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="Artist" name="artist">
                        <label>Artist <span class="text-danger">*</span></label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="Title" name="title">
                        <label>Title <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning text-white">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
