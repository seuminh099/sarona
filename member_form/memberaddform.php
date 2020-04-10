
<!-- Pop up Form add New -->
        <div class="modal fade" id="addnewMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-light">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="memberaddcode.php" enctype="multipart/form-data" class="form-valide">
                      <div class="form-group">
                        <label for="firstName" class="col-form-label font-weight-bold text-dark">Member Tpye</label>
                        <input type="text" id="firstName" name="txtmembertype" placeholder="Category Name" class="form-control" required />
                        <span class="helper-text"></span>
                      </div>
                      <div class="
                      up">
                        <label for="" class="col-form-label font-weight-bold text-dark">Discount</label>
                        <input type="text" name="txtdisc" placeholder="Description" class="form-control" required />
                      </div>
                      
                       <div class="modal-footer">
                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                       <button type="reset" class="btn btn-info" >Reset</button>
                       <input type="submit" class="btn btn-primary" name="btn_addnew" value="Save" id="alert">
                      </div>
                      
                    </form>
                 </div>
                </div>
              </div>
            </div>
             <!-- End Pop up Form add New -->

                
            