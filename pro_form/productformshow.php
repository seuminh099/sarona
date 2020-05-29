
<?php
session_start();
//import class.php
	require_once('../inc/class.php');
//instant object
    $obj = new mycodes;
    require_once('../inc/restrict.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Product Show</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="../images/bdsmall.png">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../style1.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

     <!-- Alert Script -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <?php include('../preloader.php');  ?>
    <!--*******************
        Preloader end
    ********************-->

    
        <!--**********************************
            Main wrapper start
        ***********************************-->
            <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include('../nav-header.php'); ?>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <?php include('../headerstart.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->


        <!--**********************************
            Sidebar start
        ***********************************-->
       <?php include('../sidebarforsub.php'); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
            <!-- row -->
        <div class="content-body">
           <!-- <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div> -->

            <!-- row -->
            <div class="container-fluid" id="load-products">
                <!-- This is for code -->
                <h3 ><center>បញ្ជីមុខទំនិញ</center></h3>
                <form>
                        <!-- Row 1 ------------- -->
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="col-form-label">ស្វែងរកតាមឈ្មោះទំនិញ</label>
                                <div class="input-group ">
                                    <select name="framework" id="framework" class="selectpicker" data-live-search="true">
                                        <?php
                                            $proname = $obj->fun_SelectDistinc("tbl_product","ProductName","IsDelete",0);
                                            foreach ($proname as $item) {
                                                $pro_name = $item['ProductName'];              
                                        ?>
                                          <option>
                                                <?php echo $pro_name; ?>
                                          </option>
                                           <?php
                                                }
                                            ?>
                                        </select>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label class="col-form-label">ប្រភេទទំនិញ</label>
                                       <select name="framework" id="framework" class="selectpicker" data-live-search="true">
                                   
                                          <?php
                                            $cate = $obj->fun_SelectDistinc("tbl_category","CategoryName","IsDelete",0);
                                            foreach ($cate as $item) {
                                                $cat_name = $item['CategoryName'];              
                                        ?>
                                          <option>
                                                <?php echo $cat_name; ?>
                                          </option>
                                           <?php
                                                }
                                            ?> 
                                        </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">ឈ្មោះក្រុមហ៊ុន</label>
                                <div class="input-group ">
                                  <select name="framework" id="framework" class="selectpicker" data-live-search="true">
                                   
                                          <?php
                                            $model = $obj->fun_SelectDistinc("tbl_model","ModelName","IsDelete",0);
                                            foreach ($model as $item) {
                                                $model_name = $item['ModelName'];              
                                        ?>
                                          <option>
                                                <?php echo $model_name; ?>
                                          </option>
                                           <?php
                                                }
                                            ?>
                                        </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="form-row-1">
                                    <div class="form-group col-md">
                                        
                                    </div>
                                    <div class="form-group col-md">
                                        
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <button type="button" class="btn btn-primary">ស្វែងរក</button>
                                    </div>
                                </div>
                            </div>  

                            <div class="form-row">
                                <div class="form-group col-md">                               
                                    <!-- Bottun Add new  -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewproduct" data-whatever="@mdo">
                                        បន្ថែមថ្មី
                                    </button>
                                </div>
                                <div class="form-group col-md">                               
                                    <!-- Bottun Restore  --> 
                                    <a href="productrestoreform.php" class="btn btn-primary">Restore</a>
                                </div>    
                            </div>                
                        </div>
                    </form>
    			<!-- <a href="categoryaddform.php">Add New Category</a> -->
                <!-- In data Table -->                                   
                <form method="post" action="" enctype="multipart/form-data">
                    
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%" > -->
                	<table align="center" class="table table-hover ">
    		<?php
                //Test Delete Button
                if(isset($_REQUEST['ProductID'])){
                    $key_proid = $_REQUEST['ProductID'];
                    //$count_pro = $obj->fun_countpro($key_catid);
                    $table = "tbl_product";
                    $fields = array("IsDelete");
                    $values = array("1");
                    $obj->fun_updatedata($table,$fields,$values,"ProductID",$key_proid);
                ?>
                    <script type="text/javascript">toastr.success('Delete successfully......')</script>
                <?php
                }

                //Test add new button
                if(isset($_REQUEST['btn_addnew'])){
                    $proname = $_REQUEST['txt_proname'];
                    $cat_id = $_REQUEST['txt_catname'];
                    $model_id = $_REQUEST['txt_modelname'];
                    $Status = $_REQUEST['txt_status'];
                    if($_FILES['txtphoto']['tmp_name']){
                        $Logo = $obj->f_upload_img('txtphoto',100,'images');
                    }else{
                        $Logo = "default.jpg";
                    }
                    $count_pro = $obj->fun_countpro($proname);
                    if($count_pro > 0){
                 ?>
                    <script type="text/javascript">toastr.error('Product Name is existing')</script>
                <?php
                    }else{
                        $tblname = "tbl_product";
                        $fields = array("ProductName","CategoryID","ModelID","Photo","Status");
                        $values = array($proname,$cat_id,$model_id,$Logo,$Status);
                        $obj->fun_insertdata($tblname,$fields,$values);
                ?>
                    <script type="text/javascript">toastr.success('Insert successfully......')</script>
                
                <?php 
                    }  
                }
                //End Test Add New Button

                //test update button
                if(isset($_REQUEST['btnupdate'])){
                    $proid = $_REQUEST['txt_id'];
                    $proname = $_REQUEST['txt_proname'];
                    $cat_id = $_REQUEST['txt_catname'];
                    $model_id = $_REQUEST['txt_modelname'];
                    $Status = $_REQUEST['txt_status'];
                    $oldphoto = $_REQUEST['txtoldphoto'];
                    if($_FILES['txtphoto']['tmp_name']){
                        $Logo = $obj->f_upload_img('txtphoto',100,'images');
                    }else{
                        $Logo = $oldphoto;
                    }

                    $result = $obj->fun_checkData("tbl_product","ProductName","ProductID",$proname,$proid);
                    if($result){
                    ?>
                           <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('<?php echo $proname?> is Exsting')</script>
                    <?php
                        }else{
                            $tblname = "tbl_product";
                            $fields = array("ProductName","CategoryID","ModelID","Photo","Status");
                            $values = array($proname,$cat_id,$model_id,$Logo,$Status);
                            $obj->fun_updatedata($tblname,$fields,$values,"ProductID",$proid);
                            ?>
                            <!-- Alert Success -->
                                <script type="text/javascript">toastr.success('Update successfully')</script>
                        <?php
                    }
                }
                ?>

                		<thead>
                			<tr class="">
                                <th>ឈ្មោះទំនិញ</th>
                                <th>ប្រភេទទំនិញ</th>
                                <th>ឈ្មោះក្រុមហ៊ុន</th>
                                <th>សំគាល់</th>
                                <th>រូបភាព</th>
                                <th></th>
                                <th></th>
                	       </tr>
                		</thead>
                		<?php
                        //Accessing method fun_displaydata
                        $product = $obj->fun_displaydataCon("tbl_product","IsDelete",0);
                        foreach ($product as $record){
                            $catid = $record['CategoryID'];
                                $proid = $record['ProductID'];
                                $proname = $record['ProductName'];
                                
                               

                                $category = $obj->fun_lookup("tbl_category","CategoryID",$catid);
                                $catname = $category['CategoryName'];

                                $modelid = $record['ModelID'];
                                $model = $obj->fun_lookup("tbl_model","ModelID",$modelid);
                                $modelname = $model['ModelName'];

                                
                                $photo = $record['Photo'];
                                $Status = $record['Status'];
                        ?>
                			<tr >
                                <td><?php echo $proname; ?></td>
                               
                                <td><?php echo $catname; ?></td>
                                <td><?php echo $modelname; ?></td>
                                
                               
                                <td><?php echo $Status; ?></td>
                                <td><img src="images/<?php echo $photo;?>" width="50px"></td>
                				<td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "u".$proid;?>"> 
                                        កែប្រែ
                                    </button>
                                </td>
                				<td>
                                    <a href="productformshow.php?ProductID=<?php echo $proid;?>" 
                                           class="btn btn-danger delete" id="delete">លុប</a>
                                </td>
                			</tr>
                            

                    <!--Modal Update Form  -->
                    <div class="modal fade" id="<?php echo "u".$proid;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content bg-light">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Update Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-light">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label for="catid" class="col-form-label">Product ID</label>
                                            <input type="text" name="txt_id" class="form-control" id="catid" value="<?php echo $proid;?>" readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="pro" class="col-form-label">Product Name</label>
                                            <input type="text" name="txt_proname" class="form-control" id="pro" value="<?php echo $proname;?>">
                                        </div>
                                        

                                        <div class="form-group col-md-6">
                                                <label for="Sex" class="col-form-label">Category</label>
                                                <select class="form-control" id="Sex" name="txt_catname" value="<?php echo $catid; ?>">
                                                    <?php
                                                        $categories = $obj->fun_displaydataCon("tbl_category","IsDelete",0);
                                                        foreach ($categories as $item) {
                                                            $cat_id = $item['CategoryID'];
                                                            $cat_name = $item['CategoryName'];
                                                    ?>
                                                    <option value="<?php echo $cat_id;?>" <?php if($catid == $cat_id) {echo "SELECTED";};?>>
                                                        <?php echo $cat_name;?>    
                                                    </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label for="meodel" class="col-form-label">Model</label>
                                                <select class="form-control" id="Sex" name="txt_modelname" value="<?php echo $catid; ?>">
                                                    <?php
                                                        $model = $obj->fun_displaydataCon("tbl_model","IsDelete",0);
                                                        foreach ($model as $row) {
                                                            $model_id = $row['ModelID'];
                                                            $model_name = $row['ModelName'];
                                                    ?>
                                                    <option value="<?php echo $model_id;?>" <?php if($modelid == $model_id) {echo "SELECTED";};?>>
                                                        <?php echo $model_name;?>      
                                                    </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                
                                            </div>
                                           

                                             <div class="form-group col-md-6">
                                                <label for="status" class="col-form-label">Status</label>
                                                <input type="text" class="form-control" name="txt_status" value="<?php echo($Status) ?>">
                                            </div>
                                    
                                            <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Photo</label>
                                                <img src="images/<?php echo $photo; ?>" class="img">
                                                <input type="file" name="txtphoto" >
                                                <input type="hidden" name="txtoldphoto" value="<?php echo $photo;?>">
                                                
                                            </div>
                                        </div>
                                        <!-- Button  -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="reset" class="btn btn-info" >Reset</button>
                                            <button type="submit" class="btn btn-default bg-primary text-white" name="btnupdate">Update</button>
                                        </div>
                                        <!-- Button  -->
                                    
                                    </form>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <!--End Update Form--> 

                        <?php
                            
                			}
                		?>
                	</table>
                </form>        
                <!-- End data Table -->   

            <!-- Modal Addnew category-->
            <?php 
                include('productaddform.php'); 
             ?>  
                   <!-- <div class="form-group text-center">
                    	<img src="images/noimage.jpg" onclick="triggerClick()" id="display">
                    	<label for="image" class="btn-danger lbl">Image</label>
                    	<input type="file" name="image" onchange="displayimage(this)" id="image" style="display: none;">
                        </div> -->
        </div>
        <!-- #/ container -->

        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <?php include('../footer.php'); ?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>



    <script src="../test.js"></script>
</body>

</html>