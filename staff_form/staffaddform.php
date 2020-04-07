        <div class="modal fade" id="addnewcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info">
                  <h5 class="modal-title text-white" id="exampleModalLabel">Add New Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>

                  <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                      <div class="form-row">
                          <div class="col-md-6 form-group" >
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Staff Name</label>
                            <input type="text" name="txtstaffname" placeholder="Staff Name" class="form-control " />
                          </div>

                          <div class="col-md-2 form-group">
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Gender</label>
                              <select name="gender" class="custom-select mr-sm-2 " >
                                  <option >Male</option>
                                  <option >Female</option>
                              </select>
                          </div>

                          <div class="col-md-4 form-group">
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark complex-colorpicker ">Date of birth</label>
                            <input type="date" name="txtdob"  class="form-control " />
                          </div>

                          <div class="col-md-6 form-group">
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Place of Birth</label>
                            <input type="text" name="txtpob" placeholder="Place of Birth" class="form-control" />
                          </div>

                          <div class="col-md-6 form-group">
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Job Title</label>
                            <input type="text" name="txtjob" placeholder="Job Title" class="form-control" />
                          </div>

                          <div class="col-md-12 form-group">
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Address</label>
                            <input type="text" name="txtaddress" placeholder="Address" class="form-control" />
                          </div>

                          <div class="col-md-6 form-group">
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Phone Number</label>
                            <input type="text" name="txtphone" placeholder="Phone Number" class="form-control" />
                          </div>

                          <div class="col-md-6 form-group">
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Email</label>
                            <input type="text" name="txtemail" placeholder="Email" class="form-control" />
                          </div>

                          <div class="col-md-4 mb-3 form-group">
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark">User Name</label>
                            <input type="text" name="txtuser" placeholder="username" class="form-control" />
                          </div>


                          <div class="col-md-4 mb-3 form-group">
                            <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Password</label>
                            <input type="password" name="txtpass" placeholder="password" class="form-control" />
                          </div>

                          <div class="form-group">
                            <label for="message-text" class="col-form-label font-weight-bold text-dark">Photo</label>
                                 <img src="images/noimage.jpg" onclick="triggerClick()" id="displaystaff">
                                 <label for="imagestaff" class="btn-primary lbl">Image</label>
                                 <input type="file" name="txtphoto" onchange="displayimagestaff(this)" id="imagestaff" style="display: none;">
                          </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="reset" class="btn btn-info" >Reset</button>
                          <input type="submit" class="btn btn-primary" name="btnaddstaff" value="Save" id="alert">
                        </div>
                    </form>
                  </div>
            </div>
          </div>
        </div>