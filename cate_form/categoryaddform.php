
<!-- Pop up Form add New -->
<div class="modal fade" id="addnewcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
             <h5 class="modal-title text-white" id="exampleModalLabel">Add New Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="text-light">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="form-validation">
            <form method="post" action="" enctype="multipart/form-data" class="form-valide">

              <div class="form-group">
                <label for="firstName" class="col-form-label font-weight-bold text-dark">Category Name</label>
                <input type="text" id="firstName" name="txtcatname" placeholder="Category Name" class="form-control" required />
                <span class="helper-text"></span>
              </div>

              <div class="form-group">
                <label for="" class="col-form-label font-weight-bold text-dark">Description</label>
                <input type="text" name="txtdesc" placeholder="Description" class="form-control" required />
              </div>

              <div class="form-group">
                <label for="" class="col-form-label font-weight-bold text-dark">Photo</label>
                      <img src="images/noimage.jpg" onclick="triggerClick()" id="display">
                      <label for="image" class="btn-primary lbl">Image</label>
                      <input type="file" name="txtphoto" onchange="displayimage(this)" id="image" style="display: none;">
              </div>
                      
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-info" >Reset</button>
                <input type="submit" class="btn btn-primary" name="btn_addnew" value="Save">     
              </div>
                      
            </form>
          </div>
          </div>
        </div>
    </div>
</div>
<!-- End Pop up Form add New -->

