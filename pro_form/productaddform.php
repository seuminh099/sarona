<div class="modal fade" id="addnewproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content bg-light">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Add New Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-light">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="name" class="col-form-label">Product Name</label>
                                            <input type="text"  name="txt_proname" placeholder="productname" class="form-control" id="name" >
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name" class="col-form-label">Imei Number</label>
                                            <input type="text"  name="txt_imei" placeholder="Imei Number" class="form-control" id="name" >
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="des" class="col-form-label">Description</label>
                                            <input type="text" name="txt_desc" placeholder="Description" class="form-control" id="des" >
                                        </div>

                                        <div class="form-group col-md-4">
                                                <label for="cat" class="col-form-label">Category</label>
                                                <select class="form-control" id="cat" name="txt_catname" >
                                                        <?php
                                                            $categories = $obj->fun_displaydataCon("tbl_category","IsDelete",0);
                                                            foreach ($categories as $item) {
                                                                $cat_id = $item['CategoryID'];
                                                                $cat_name = $item['CategoryName'];
                                                        ?>
                                                        <option value="<?php echo $cat_id;?>">
                                                            <?php echo $cat_name;?>      
                                                        </option>
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                                <label for="Sex" class="col-form-label">Model</label>
                                                <select class="form-control" id="Sex" name="txt_modelname" >
                                                    <?php
                                                        $model = $obj->fun_displaydataCon("tbl_model","IsDelete",0);
                                                        foreach ($model as $row) {
                                                            $model_id = $row['ModelID'];
                                                            $model_name = $row['ModelName'];
                                                    ?>
                                                    <option value="<?php echo $model_id;?>">
                                                        <?php echo $model_name;?>      
                                                    </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="unit" class="col-form-label">Unitprice purchase ($)</label>
                                                <input type="text" name="txt_pricePur" placeholder="Unitpricepurchase" class="form-control" id="unit" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="sale" class="col-form-label">Unitprice Sale ($)</label>
                                                <input type="text" name="txt_priceSale" placeholder="Unitprice Sale" class="form-control" id="sale" >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="status" class="col-form-label">Status</label>
                                                <select name="txt_status" class="form-control">
                                                <option value="New">New</option>
                                                <option value="Old">old</option>
                                            </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Photo</label>
                                                <img src="images/noimage.jpg" onclick="triggerClick()" id="displaypro">
                                                <label for="imagepro" class="btn-primary lbl">Image</label>
                                                <input type="file" name="txtphoto" onchange="displayimagepro(this)" id="imagepro" style="display: none;">
                                            </div>
                                        </div>
                                        <!-- Button  -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="reset" class="btn btn-info" >Reset</button>
                                            <button type="submit" class="btn btn-default bg-primary text-white" name="btn_addnew">Save</button>
                                        </div>
                                        <!-- Button  -->
                                    
                                    </form>
                                </div>   
                            </div>
                        </div>
                    </div>