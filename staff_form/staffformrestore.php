
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
    <title>Bundouen2 Phoneshop</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="images/bdsmall.png">
    <!-- Custom Stylesheet -->
    <!--<link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../style1.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

            <?php
                /* --------------------------------------- Test Delete button ---------------------------------- */

                if (isset($_REQUEST['StID'])) {
                    $key_staffid = $_REQUEST['StID'];
                    
                    $countstaffsale = $obj->fun_lookup("tbl_sale","StaffID",$key_staffid);
                    $countstaffpurchase = $obj->fun_lookup("tbl_purchase","StaffID",$key_staffid);
                    $row = $obj->fun_lookup("tbl_staff","StaffID",$key_staffid);
                    if(($countstaffsale > 0) || ($countstaffpurchase > 0)){
                        ?>
                        <script type="text/javascript">toastr.error('Can not delete this staff')</script>
                    <?php
                    }else{
                            $staffid=$row['StaffID'];
                            $photo = $row['Photo'];

                            $table = "tbl_staff";
                            $fieldid = "StaffID";

                            $countcatewithimg = $obj->fun_count("tbl_staff","Photo",$photo);

                            if($countcatewithimg == 1){
                                $obj->fun_deleteimage($photo);
                                $obj->fun_deletedata($table,$fieldid,$key_staffid);
                            }else{
                                $obj->fun_deletedata($table,$fieldid,$key_staffid);
                            }
                            ?>
                            <script type="text/javascript">toastr.success('Staff has been deleted')</script>
                         <?php
                    }
                }
                /* --------------------------------------- Test Button Restore --------------------------------- */
                if (isset($_REQUEST['StaffID'])) {
                    $staffid = $_REQUEST['StaffID'];
                    $row = $obj->fun_lookup("tblstaff","StaffID",$staffid);
                    $table = "tbl_staff";
                    $fields = array("IsDelete");
                    $values = array("0");
                    $obj->fun_updatedata($table,$fields,$values,"StaffID",$staffid);
                    ?>
                    <script type="text/javascript">toastr.success('Staff has been Restore')</script>
                    <?php
}
            ?>

            <div class="container-fluid">
              <!-- This is for code -->
              <h1><center>List of Staff Restore</center></h1>

                <form method="post" action="" enctype="multipart/form-data">
                	<table cellpadding="5px" cellspacing="0" align="center" border="1px" class="table table-hover font-weight-bolder">
                		<thead >
                			<tr class="table-info">
                				<th >Staff Name </th> 
                        <th >Sex</th>
                        <th >Date of Birth</th>
                        <th >Place of Birth</th>
                        <th >Job Title</th>
                        <th >Address</th>
                        <th >Phone Number</th>
                        <th >Email</th>
                        <th >Photo</th>
                        <th >User Name</th>
                        <th >Password</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                      <!--
                        <th><input type="text" name="" class="form-control form-control-sm" placeholder="Search..."></th>   
                        <th><input type="text" name="" class="form-control form-control-sm" placeholder="Search..."></th>   
                        <th><input type="text" name="" class="form-control" placeholder="Search..."></th>   
                        <th><input type="text" name="" class="form-control" placeholder="Search..."></th>   
                        <th><input type="text" name="" class="form-control" placeholder="Search..."></th>   
                        <th><input type="text" name="" class="form-control" placeholder="Search..."></th>   
                        <th><input type="text" name="" class="form-control" placeholder="Search..."></th>   
                        <th><input type="text" name="" class="form-control" placeholder="Search..."></th>   
                        <th><input type="text" name="" class="form-control" placeholder="Search..."></th>   
                        <th><input type="text" name="" class="form-control" placeholder="Search..."></th>   
                    -->   
                		</thead>
                		<?php
                      $Staff = $obj->fun_displaydataCon("tbl_staff","IsDelete","1");
                      foreach($Staff as $row) {
                        $staffid = $row['StaffID'];
                        $staffname = $row['StaffName'];
                        $sex = $row['Sex'];
                        $dob = $row['DOB'];
                        //$dob=date("l-d-Y") ;
                        $pob = $row['POB'];
                        $jobtitle = $row['JobTitle'];
                        $address = $row['Address'];
                        $phone = $row['Phone'];
                        $email = $row['Email'];
                        $photo = $row['Photo'];
                        $username = $row['Username'];
                        $password = $row['Password'];

                    ?>
                			<tr>
                        <td><?php echo"$staffname";?></td>
                        <td><?php echo"$sex";?></td>
                        <td><?php echo"$dob";?></td>
                        <td><?php echo"$pob";?></td>
                        <td><?php echo"$jobtitle";?></td>
                        <td><?php echo"$address";?></td>
                        <td><?php echo"$phone";?></td>
                        <td><?php echo"$email";?></td>
                        <td><img src="images/<?php echo $photo;?>" width="80px"></td>
                        <td><?php echo"$username";?></td>
                        <td><?php echo"$password";?></td>
                        <td>

                          <a class="btn btn-primary" href="staffformrestore.php?StaffID=<?php echo $staffid;?>">Restore</a>

                        </td> <!-- Button Update -->
                        <td><a class="btn btn-danger" href="staffformrestore.php?StID=<?php echo $staffid;?>">Delete</a></td> <!-- Button Delete -->
                      </tr>

                		<?php
                			}
                		?>
                	</table>
                </form>

        <a href="#" class="btn btn-primary">Restore All</a>
        <a href="staff_form.php" class="btn btn-primary">Back</a>
        <!-- Modal Add New Staff  -->
        <?php include('staffaddform.php');?>
        <!--End Modal Add New Staff  -->    
            




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

    <script src="../plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="../plugins/sweetalert/js/sweetalert.init.js"></script>

    <script src="../test.js"></script>


</body>

</html>