<div class="modal fade" id="addnewcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content bg-light">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Add New Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-light">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Customer Name</label>
                                                <input type="text" name="txtcusname" class="form-control" id="catname" >
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="Sex" class="col-form-label">Example select</label>
                                                <select name="gender" class="form-control" id="Sex">
                                                  <option value="Male">Male</option>
                                                  <option value="Female">Female</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">Date of Birth</label>
                                                <input type="Date" name="txtdob" class="form-control" id="catname" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Place Of Birth</label>
                                                <input type="text" name="txtpob" class="form-control" id="catname" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Jop Title</label>
                                                <input type="text" name="txtjob" class="form-control" id="catname" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Address</label>
                                                <input type="text" name="txtaddress" class="form-control" id="catname" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Phone</label>
                                                <input type="text" name="txtphone" class="form-control" id="catname" >
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="catname" class="col-form-label">Email</label>
                                                <input type="text" name="txtemail" class="form-control" id="catname" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="member" class="col-form-label">Member</label>
                                                <select name="txtmember" class="form-control" id="member">
                                                    <?php
                                                        $member = $obj->fun_displaydataCon("tbl_member","IsDelete",0);
                                                        foreach ($member as $item) {
                                                            $memid = $item['MemberID'];
                                                            $memtype = $item['MemberType'];
                                                    ?>
                                                            <option value="<?php echo $memid;?>">
                                                                           <?php echo $memtype;?>
                                                            </option>
                                                        <?php

                                                            }
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Photo</label>
                                                <img src="images/noimage.jpg" onclick="triggerClick()" id="displaycus">
                                                <label for="imagecus" class="btn-primary lbl">Image</label>
                                                <input type="file" name="txtphoto" onchange="displayimagecustomer(this)" id="imagecus" style="display: none;">
                                                
                                            </div>
                                        </div>
                                        <!-- Button  -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="reset" class="btn btn-info" >Reset</button>
                                            <button type="submit" class="btn btn-default bg-primary text-white" name="btnadd">Save</button>
                                        </div>
                                        <!-- Button  -->
                                    </form>
                                </div>   
                            </div>
                        </div>
                    </div>