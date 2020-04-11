<!--Modal add Form  -->
                    <div class="modal fade" id="addsupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content bg-light">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Add New Supplier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-light">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                    <div class="form-row">

                                        <div class="form-group col-md-9">
                                            <label for="catname" class="col-form-label">Supplier Name</label>
                                            <input type="text" name="txtsubname" class="form-control" >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="des" class="col-form-label">Gender</label>
                                            <select name="gender"  class="custom-select mr-sm-2">
                                            	<option value="Male">Male</option>
                                            	<option value="Female">Female</option>
                                            </select>
                                        </div>

                                            <div class="form-group col-md-6">
                                                <label  class="col-form-label">DOB</label>
                                                <input type="date" name="txtdob" class="form-control" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">POB</label>
                                                <input type="text" name="txtpob" class="form-control"  >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label  class="col-form-label">JobTitle</label>
                                                <input type="text" name="txtjob" class="form-control" >
                                            </div>
                                    		<div class="form-group col-md-6">
                                                <label  class="col-form-label">Company Name</label>
                                                <input type="text" name="txtcompany" class="form-control" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label  class="col-form-label">Address</label>
                                                <input type="text" name="txtaddress" class="form-control"  >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label  class="col-form-label">Phone</label>
                                                <input type="text" name="txtphone" class="form-control"  >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Email</label>
                                                <input type="text" name="txtemail" class="form-control"  >
                                            </div>
                                            <div class="form-group">
						                        <label for="" class="col-form-label font-weight-bold text-dark">Photo</label>
						                             <img src="images/noimage.jpg" onclick="triggerClick()" id="displaysub">
						                             <label for="imagesub" class="btn-primary lbl">Image</label>
						                             <input type="file" name="txtphoto" onchange="displayimagesub(this)" id="imagesub" style="display: none;">
						                      </div>
                                            
                                        </div>
                                        <!-- Button  -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="reset" class="btn btn-info" >Reset</button>
                                            <button type="submit" class="btn btn-default bg-primary text-white" name="btnaddnew">save</button>
                                        </div>
                                        <!-- Button  -->
                                    
                                    </form>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <!--End add Form--> 