
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
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1"> -->
    <title>Bundouen II Phoneshop</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="../images/bdsmall.png">

    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../style1.css" rel="stylesheet">
   
    <link href="../plugins/toastr/css/toastr.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
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

                <!-- ============================== test button Delete ========================================== -->
                    <?php
                        //Test key
                        if(isset($_REQUEST['CategoryID'])){
                            $key_catid = $_REQUEST['CategoryID'];

                            $count_pro = $obj->fun_countproduct($key_catid);

                            if ($count_pro == 0){

                                $row = $obj->fun_lookup("tbl_category","CategoryID",$key_catid);

                            $table = "tbl_category";
                            $fields = array("IsDelete");
                            $values = array("1");
                            $obj->fun_updatedata($table,$fields,$values,"CategoryID",$key_catid);
                    ?>
                        <script type="text/javascript">toastr.success('This Category has been Delete!!!!')</script>
                    <?php
                        }else{
                    ?>
                        <script type="text/javascript">toastr.error('you Cannot Delete this Category ?>')</script>
                    <?php
                        }

                        }
                    ?>
                    <!-- ============================== test button Delete ========================================== -->  
                

                 <!--=========================================== Test button Update ==========================================-->
                <?php   
                        if(isset($_REQUEST['btn_update'])){
                            $catid = ($_REQUEST['txt_CatID']);
                            $catname = ($_REQUEST['txt_catname']);
                            $desc = $_REQUEST['txt_desc'];

                            $oldphoto = $_REQUEST['txtoldphoto'];
                            if($_FILES['txtphoto']['tmp_name']){
                                $catphoto = $obj->f_upload_img('txtphoto',100,'images');
                            }else{
                                $catphoto = $oldphoto;
                            }
                            $result = $obj->fun_checkData("tbl_category","CategoryName","CategoryID",$catname,$catid);
                            if($result){

                            echo "<h2>Cannot Update</h2>";
                            }else{
                            
                                $tblname = "tbl_category";
                                $fields = array("CategoryName","Photo","Description");
                                $values = array($catname,$catphoto,$desc);
                                $obj->fun_updatedata($tblname,$fields,$values,"CategoryID",$catid);
                    ?>                                             
                        <script type="text/javascript">toastr.success('Update Sucessfully')</script>
                    <?php
                            }
                        }
                    ?>
                    <!--=================================== End test button update data =======================================-->

                     <!-- ===============================test button add new ================================================-->
                    <?php 
                        if(isset($_REQUEST['btn_addnew'])){
                            $catname = $_REQUEST['txtcatname'];
                            $desc = $_REQUEST['txtdesc'];
                            if($_FILES['txtphoto']['tmp_name']){
                                $Photo = $obj->f_upload_img("txtphoto",100,"images");
                            }else{
                                $Photo = "default.jpg";
                            }
                            $result = $obj->fun_checkExistingData($catname,"tbl_category","CategoryName");
                            if($result){
                    ?>
                            <script type="text/javascript">toastr.error('<?php echo "$catname is Exsting"; ?>')</script>    
                    <?php
                            }else{
                                $tblname = "tbl_category";
                                $fields = array("CategoryName","Photo","Description");
                                $values = array($catname,$Photo,$desc);
                                $obj->fun_insertdata($tblname,$fields,$values);
                    ?>      
                        <script type="text/javascript">toastr.success('Add Sucessfully')</script>

                    <?php
                           }
                        }
                     ?> 
                    <!-- ============================== end button add new ========================================== -->
                            
                <form method="post" action="" enctype="multipart/form-data">
                    <h3 ><center>List of Categories</center></h3>

                    <!-- ================================= show data intable ===================================================== -->
                	<table cellpadding="5px" cellspacing="0" align="center" border="1px" class="table table-hover font-weight-bolder">
                		<thead class="table-info">
                			<tr class="font-weight-bolder">
                				<th  >Category 
                                Name</th>
                                <th >Description</th>
                				<th >Photo</th>
                				<th ></th>
                				<th ></th>
                                <th ></th>
                	       </tr>
                		</thead>
                		<?php
                		//Accessing method fun_displaydata
                		$Category = $obj->fun_displaydataCon("tbl_category","IsDelete",0);
                		foreach ($Category as $record){
                			$catid = $record['CategoryID'];

                            $count=$obj->fun_countproduct($catid);

                			$categoryname = $record['CategoryName'];
                			$photo = $record['Photo'];
                            $desc = $record['Description'];    
                		?>
                            
                			<tr >
                				<td ><?php echo $categoryname; ?></td>
                                <td><?php echo $desc; ?></td>
                				<td><img src="Images/<?php echo $photo;?>" width="60px"></td>

                                <td>
                                    <a class="btn btn-info"  href="productform.php?CategoryID=<?php echo $catid;?>">
                                        Qty Of <?php echo $categoryname;?>[<?php echo  $count;?>]
                                     </a>
                                </td>

                				<td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "u". $catid; ?>"> 
                                        Update
                                    </button>
                                </td>
                				<td>
                                    <a href="categoryform.php?CategoryID=<?php echo $catid;?>" 
                                           class="btn btn-danger delete" >Delete</a>
                                </td>
                			</tr>
                            
                    <!--  =====================  Modal Update Form ==========================  -->
                    <div class="modal fade" id="<?php echo "u". $catid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-lg" role="document">
                            <div class="modal-content bg-light">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Update Category !!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-light">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="catid" class="col-form-label">Category ID</label>
                                            <input type="text" name="txt_CatID" class="form-control" id="catid" readonly value="<?php echo $catid ;?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="catname" class="col-form-label">Category Name</label>
                                            <input type="text" name="txt_catname" class="form-control" id="catname" value="<?php echo $categoryname;?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="des" class="col-form-label">Decription</label>
                                            <input type="text" name="txt_desc" class="form-control" id="des" value="<?php echo $desc ;?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="des" class="col-form-label">Photo</label>
                                            <img src="Images/<?php echo $photo ;?>" class="img">
                                            <input type="file" name="txtphoto" id="newimg" >
                                            <input type="hidden" name="txtoldphoto" value="<?php echo $photo ;?>">
                                        </div> 
                                        <!-- Button  -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="reset" class="btn btn-info" >Reset</button>
                                            <button type="submit" class="btn btn-default bg-primary text-white" name="btn_update"
                                            ​id="toastr-success-top-right" >Update</button>
                                        </div>
                                        <!-- Button  -->
                                    </form>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <!--  =====================  End Modal Update Form ==========================  -->
                        <?php
                			}
                		?>
                	</table>
                </form>


            <!--​============= Button Add new ===========-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewcat" data-whatever="@mdo">
                Add New
            </button>
            <!--​============= End Button Add new ===========-->

            <!--​============= End Button Restore ===========-->
            <a href="categoryrestoreform.php" class="btn btn-primary">Restore</a>
            <!--​============= End Button Restore ===========-->


            <!--​============= Modal Addnew category ===========-->
            <?php 
                include('categoryaddform.php'); 
            ?>
            <!--​=============  End Modal Addnew category ===========-->


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