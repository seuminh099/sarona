
<?php
//import class.php
	require_once('inc/class.php');
//instant object
    $obj = new mycodes;

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Product</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="images/bdsmall.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="./plugins/toastr/css/toastr.min.css" rel="stylesheet">

<!--<link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> -->
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
    <?php include('preloader.php');  ?>
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
        <?php include('nav-header.php'); ?>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <?php include('headerstart.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->


        <!--**********************************
            Sidebar start
        ***********************************-->
       <?php include('sidebar.php'); ?>
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

                <!-- In data Table -->                                   
                <form method="post" action="" enctype="multipart/form-data">
                    <?php 
                      if(isset($_REQUEST['CategoryID'])){
                        $key_catid=$_REQUEST['CategoryID'];
                        $arrow=$obj->fun_lookup("tblcategory","CategoryID",$key_catid);
                        $cat_name=$arrow['CategoryName'];
                    ?>
                    <h3 ><center>List of Product <?php echo  $cat_name; ?></center></h3>
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%" > -->
                    <?php
                 /* ---------------------------------------------- Test Delete Button ----------------------------------------*/
                if(isset($_REQUEST['ProductID'])){
                    $key_proid = $_REQUEST['ProductID'];
                    //$count_pro = $obj->fun_countpro($key_catid);
                    $table = "tblproduct";
                    $fields = array("IsDelete");
                    $values = array("1");
                    $obj->fun_updatedata($table,$fields,$values,"ProductID",$key_proid);
                ?>
                    <script type="text/javascript">toastr.success('Delete successfully......')</script>
                <?php
                }
                /*------------------------------------------------- Test add new button --------------------------------------*/
                if(isset($_REQUEST['btn_addnew'])){
                    $proname = $_REQUEST['txt_proname'];
                    $imei = $_REQUEST['txt_imei'];
                    $desc = $_REQUEST['txt_desc'];
                    $cat_id = $_REQUEST['txt_catname'];
                    $model_id = $_REQUEST['txt_modelname'];
                    $pricepur = $_REQUEST['txt_pricePur'];
                    $pricesale = $_REQUEST['txt_priceSale'];
                    $Status = $_REQUEST['txt_status'];
                    if($_FILES['txtphoto']['tmp_name']){
                        $Logo = $obj->f_upload_img('txtphoto',100,'images');
                    }else{
                        $Logo = "default.jpg";
                    }
                    
                    $result1 = $obj->fun_countpro($proname,$Status);
                    $result2 = $obj->fun_checkExistingData($imei,"tblproduct","Imei");
                    if($result1 >0){
                ?>
                    <script type="text/javascript">toastr.error('<?php echo $proname?> is Exsting')</script>
                <?php
                    }else{
                          if($result2 == false){
                            $tblname = "tblproduct";
                             $fields = array("ProductName","Imei","Description","CategoryID","ModelID","UnitPrice_Purchase","UnitPrice_Sale","Photo","Status");
                             $values = array($proname,$imei,$desc,$cat_id,$model_id,$pricepur,$pricesale,$Logo,$Status);
                             $obj->fun_insertdata($tblname,$fields,$values);
                ?>
                             <script type="text/javascript">toastr.success('Insert successfully......')</script>
                <?php
                             //header('location:productformshow.php');
                            //ob_end_flush(); 
                        }else{
                        ?>
                            <script type="text/javascript">toastr.error('<?php echo $imei?> is Exsting')</script>
                        <?php
                        }    
                    }
                }
                

                /* --------------------------------------------------------- test update button ----------------------------------------*/
                if(isset($_REQUEST['btnupdate'])){
                    $proid = $_REQUEST['txt_id'];
                    $proname = $_REQUEST['txt_proname'];
                    $imei = $_REQUEST['txt_imei'];
                    $desc = $_REQUEST['txt_desc'];
                    $cat_id = $_REQUEST['txt_catname'];
                    $model_id = $_REQUEST['txt_modelname'];
                    $pricepur = $_REQUEST['txt_pricePur'];
                    $pricesale = $_REQUEST['txt_priceSale'];
                    $Status = $_REQUEST['txt_status'];
                    $oldphoto = $_REQUEST['txtoldphoto'];
                    if($_FILES['txtphoto']['tmp_name']){
                        $Logo = $obj->f_upload_img('txtphoto',100,'images');
                    }else{
                        $Logo = $oldphoto;
                    }

                    $result = $obj->fun_countproupdate($proname,$proid,$Status);
                    $result1 = $obj->fun_countpro($proname,$Status);
                    $result2 = $obj->fun_checkData("tblproduct","Imei","ProductID",$imei,$proid);

                    if((($result == 1 ) && ($result1 == 1)) || (($result == 0 ) && ($result1 == 0))){
                        if($result2){
                    ?>
                           <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('<?php echo $imei?> is Exsting')</script>
                    <?php
                        }else{
                            $tblname = "tblproduct";
                            $fields = array("ProductName","Imei","Description","CategoryID","ModelID","UnitPrice_Purchase","UnitPrice_Sale","Photo","Status");
                            $values = array($proname,$imei,$desc,$cat_id,$model_id,$pricepur,$pricesale,$Logo,$Status);
                            $obj->fun_updatedata($tblname,$fields,$values,"ProductID",$proid);
                            ?>
                            <!-- Alert Success -->
                                <script type="text/javascript">toastr.success('Update successfully')</script>
                        <?php
                            }
                    }else{

                        ?>
                          <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('<?php echo $proname?> is Exsting')</script>
                <?php
                    }
                }
                ?>	
                    <table cellpadding="5px" cellspacing="0" align="center" border="1px" class="table table-hover font-weight-bolder">
                		<thead class="table-info">
                			<tr class="font-weight-bolder">
                                <th>Product Name</th>
                                <th>Imei</th>
                                <th>Description</th>
                                <th>Category Name</th>
                                <th>Model Name</th>
                                <th>Qty</th>
                                <th>Unit Price Purchase</th>
                                <th>Unit Price Sale</th>
                                <th>Status </th>
                                <th>Photo</th>
                                <th></th>
                                <th></th>
                	       </tr>
                		</thead>
                		<?php
                        //Accessing method fun_displaydata
                        $product = $obj->fun_displaydataCon("tblproduct","IsDelete",0);
                        foreach ($product as $record){
                            $catid = $record['CategoryID'];
                            if ($key_catid== $catid) {
                                $proid = $record['ProductID'];
                                $proname = $record['ProductName'];
                                $imei = $record['Imei'];
                                $desc = $record['Description'];

                                $category = $obj->fun_lookup("tblcategory","CategoryID",$catid);
                                $catname = $category['CategoryName'];

                                $modelid = $record['ModelID'];
                                $model = $obj->fun_lookup("tblmodel","ModelID",$modelid);
                                $modelname = $model['ModelName'];

                                $qty = $record['Qty'];
                                $unitpricepurchase = $record['UnitPrice_Purchase'];
                                $unitpricesale = $record['UnitPrice_Sale'];
                                $Status = $record['Status'];
                                $photo = $record['Photo'];
                        ?>
                			<tr >
                                <td><?php echo $proname; ?></td>
                                <td><?php echo $imei; ?></td>
                                <td><?php echo $desc; ?></td>
                                <td><?php echo $catname; ?></td>
                                <td><?php echo $modelname; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $unitpricepurchase; ?></td>
                                <td><?php echo $unitpricesale; ?></td>
                                <td><?php echo $Status; ?></td>
                                <td><img src="images/<?php echo $photo;?>" width="50px"></td>
                				<td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "u".$proid;?>"> 
                                        Update
                                    </button>
                                </td>
                				<td>
                                    <a href="productform.php?ProductID=<?php echo $proid;?>&CategoryID=<?php echo $key_catid; ?>" 
                                           class="btn btn-danger delete" id="delete">Delete</a>
                                </td>
                			</tr>
                            

                    <!------------------------------------------------------   -Modal Update Form  --------------------------------------------------------->
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
                                            <input type="text" name="txt_id" class="form-control" id="catid" value="<?php echo $proid;?>" >
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="catname" class="col-form-label">Product Name</label>
                                            <input type="text" name="txt_proname" class="form-control" id="catname" value="<?php echo $proname;?>">
                                        </div>

                                         <div class="form-group col-md-3">
                                            <label for="pro" class="col-form-label">Imei Number</label>
                                            <input type="text" name="txt_imei" class="form-control" id="pro" value="<?php echo $imei;?>">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="des" class="col-form-label">Description</label>
                                            <input type="text" name="txt_desc" class="form-control" id="des" value="<?php echo $desc;?>">
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label for="Sex" class="col-form-label">Category</label>
                                                <select class="form-control" id="Sex" name="txt_catname" value="<?php echo $catid; ?>">
                                                    <?php
                                                        $categories = $obj->fun_displaydataCon("tblcategory","IsDelete",0);
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
                                                        $model = $obj->fun_displaydataCon("tblmodel","IsDelete",0);
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
                                                <label for="unit" class="col-form-label">Unitprice purchase</label>
                                                <input type="text" name="txt_pricePur" class="form-control" id="unit" value="<?php echo $unitpricepurchase;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="sale" class="col-form-label">Unitprice Sale</label>
                                                <input type="text" name="txt_priceSale" class="form-control" id="sale" value="<?php echo $unitpricesale;?>">
                                            </div>
                                           <div class="form-group col-md-6">
                                                <label for="status" class="col-form-label">Status</label>
                                                <select name="txt_status" class="form-control">
                                            <?php
                                                if($Status == 'New'){
                                            ?>
                                                    <option value="New" selected>New</option>
                                                    <option value="Old">old</option>
                                            <?php
                                                }else{
                                            ?>
                                                    <option value="New">New</option>
                                                    <option value="Old" selected>old</option>
                                            <?php
                                                }
                                            ?>
                                            </select>
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
                    <!-- ------------------------------------------------------    End Update Form -------------------------------------------------------> 

                        <?php
                                }
                			}
                		?>
                	</table>
                    <?php
                        }
                    ?>
                </form>        
                <!--  -----------------------------------------------------------   End data Table ---------------------------------------------------------->   


            <!--------------------------------------------------------------------   Bottun Add new  --------------------------------------------------------->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewproduct" data-whatever="@mdo">
                Add New
            </button>
            <!---------------------------------------------------------------------   Bottun Restore  ---------------------------------------------------------> 
            <a href="productrestoreform.php" class="btn btn-primary">Restore</a>
            <!-- ------------------------------------------------------------------ Modal Addnew product ------------------------------------------------------>
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
        <?php include('footer.php'); ?>
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
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>


    <script src="./plugins/toastr/js/toastr.min.js"></script>
    <script src="./plugins/toastr/js/toastr.init.js"></script>
    <script src="test.js"></script>
    <script src="script.js"></script>


    <script>
        
        $(document).ready(function() {
            $('#example').DataTable();
        } );



        $(document).ready(function(){
            $('.toast').toast('show');
        });
    </script>
</body>

</html>