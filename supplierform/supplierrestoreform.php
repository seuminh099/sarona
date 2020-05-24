
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
    <title>Product</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="../images/bdsmall.png">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
                    
    			<!-- <a href="categoryaddform.php">Add New Category</a> -->
                <!-- In data Table -->                                   
                <form method="post" action="" enctype="multipart/form-data">

                    <!-- =======================Test Button Restore========================= -->
                    <?php
                       if(isset($_REQUEST['SupplierID'])){
                        $subid = $_REQUEST['SupplierID'];
                        
                        $tblname = "tbl_supplier";
                        $fields = array("IsDelete");
                        $values = array("0");
                        $obj->fun_updatedata($tblname,$fields,$values,"SupplierID",$subid);
                        //header('location:supplierform.php');
                        ob_end_flush(); 
                    ?>
                        <script type="text/javascript">toastr.success('Restore successfully!!!')</script>
                    <?php
                        }
                    ?>
                    <!-- =======================End Test Button Restore========================= -->


                    <!-- =======================Test Button Delete Restore========================= -->
                    <?php
                        if(isset($_REQUEST['SupID'])){
                            $key_supid = $_REQUEST['SupID'];

                                $countpurchase = $obj->fun_count("tbl_purchase","SupplierID",$key_supid);

                                if ($countpurchase > 0) {

                                    
                    ?>
                                <script type="text/javascript">toastr.error('Your cannot Delete this supplier')</script>
                                    
                    <?php
                                    
                        }else{
                               
                                $row = $obj->fun_lookup("tbl_supplier","SupplierID",$key_supid);
                                    $logo = $row['Photo'];
                                    $table = "tblsupplier";
                                    $fieldid = "SupplierID";

                                    $countcatewithimg = $obj->fun_count("tbl_supplier","Photo",$logo);

                                        if($countcatewithimg == 1){
                                            $obj->fun_deleteimage($logo);
                                            $obj->fun_deletedata($table,$fieldid,$key_supid);
                                        }else{
                                            //Access to methoad fundeletedata and fundeleteimage
                                            $obj->fun_deletedata($table,$fieldid,$key_supid);
                                        }
                    ?>
                                <script type="text/javascript">toastr.success('Delete successfully!!!')</script>
                    <?php
                                }    
                            }
                    ?>
                    <!-- =======================End Test Button Delete Restore========================= -->

                    <h3 ><center>Restoer Supplier</center></h3>
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%" > -->
                	<table cellpadding="5px" cellspacing="0" align="center" border="1px" class="table table-hover font-weight-bolder">
                		<thead class="table-info">
                			<tr class="font-weight-bolder">
                                <th>Supplier Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>POB</th>
                                <th>JobTitle</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th></th>
                                <th></th>
                	       </tr>
                		</thead>
                		<?php
                        //Accessing method fun_displaydata
                        $product = $obj->fun_displaydataCon("tbl_supplier","IsDelete",1);
                        foreach ($product as $record){
                            	$supplierid = $record['SupplierID'];
                                $suppliername = $record['SupplierName'];
                                $sex = $record['Sex'];
                                $dob = $record['DOB'];
                                $pob = $record['POB'];
                                $jobtitle = $record['JobTitle'];
                                $companyname = $record['CompanyName'];
                                $address = $record['Address'];
                                $phone = $record['Phone'];
                                $email = $record['Email'];
                                $photo = $record['Photo'];
                        ?>
                			<tr >
                                <td><?php echo $suppliername; ?></td>
                                <td><?php echo $sex; ?></td>
                                <td><?php echo $dob; ?></td>
                                <td><?php echo $pob; ?></td>
                                <td><?php echo $jobtitle; ?></td>
                                <td><?php echo $companyname; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><img src="images/<?php echo $photo;?>" width="50px"></td>
                				<td>
                                    <a href="supplierrestoreform.php?SupplierID=<?php echo $supplierid;?>" 
                                           class="btn btn-primary" >Restore <i class="fas fa-trash-restore"></i></a>
                                </td>
                				<td>
                                    <a href="supplierrestoreform.php?SupID=<?php echo $supplierid;?>" 
                                           class="btn btn-danger delete" >Delete <i class="fas fa-trash-alt"></i> </a>
                                </td>
                			</tr>

                        <?php
                                
                			}
                		?>
                	</table>
                </form>        
                <!-- End data Table -->   


            <!-- Bottun Add new  -->
            <a href="#" class="btn btn-primary">Restore All <i class="fas fa-trash-restore"></i></a>
            <!-- Bottun Add new  --> 
            <a href="supplierform.php" class="btn btn-primary">Back <i class="fas fa-chevron-left"></i></a>
            <!-- Modal Addnew category-->
            <?php 
                include('supplieraddform.php'); 
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
    <script src="../script.js"></script>

</body>

</html>