
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
    <title>Bundouen II Phoneshop</title>
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


    <!-- Alert Script-->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>

<body>

    <!--*******************
        Preloader start....
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

        /* ------------------------------------------------ Test Delete Button ------------------------------- */
        if (isset($_REQUEST['StaffID'])) {
            $staffid = $_REQUEST['StaffID'];
            $table = "tbl_staff";
            $fields = array("IsDelete");
            $values = array("1");
            $obj->fun_updatedata($table,$fields,$values,"StaffID",$staffid);
        ?>
            <script type="text/javascript">toastr.success('Staff has been Delete')</script>
        <?php
        }
        /* ------------------------------------------------ Test Add New Button ------------------------------ */
        if(isset($_REQUEST['btnaddstaff'])){
          
          $staffname = $_REQUEST['txtstaffname'];
          $sex = $_REQUEST['gender'];
          $dob = $_REQUEST['txtdob'];
          $pob = $_REQUEST['txtpob'];
          $jobtitle = $_REQUEST['txtjob'];
          $address = $_REQUEST['txtaddress'];
          $phone = $_REQUEST['txtphone'];
          $email = $_REQUEST['txtemail'];
          
          if($_FILES['txtphoto']['tmp_name']){
                        $photo = $obj->f_upload_img('txtphoto',100,'images');
                    }else{
                        $photo = "default.jpg";
                    }

          $username = $_REQUEST['txtuser'];
          $password = $_REQUEST['txtpass'];

            $table = "tbl_staff";
            $fields = array("StaffName","Sex","DOB","POB","JobTitle","Address","Phone","Email","Photo","Username","Password");
            $values = array($staffname,$sex,$dob,$pob,$jobtitle,$address,$phone,$email,$photo,$username,$password);
            $obj->fun_insertdata($table,$fields,$values);
        ?>
            <script type="text/javascript">toastr.success('Staff has been Added')</script>
        <?php
        }

        /* ------------------------------------------------- Test Update Button ------------------------------- */
        if(isset($_REQUEST['btnupdatestaff'])){
          $staffid = strtolower(trim($_REQUEST['txtstaffid']));
          $staffname = strtolower(trim($_REQUEST['txtstaffname']));
          $sex = $_REQUEST['gender'];
          $dob = $_REQUEST['txtdob'];
          $pob = $_REQUEST['txtpob'];
          $jobtitle = $_REQUEST['txtjob'];
          $address = $_REQUEST['txtaddress'];
          $phone = $_REQUEST['txtphone'];
          $email = $_REQUEST['txtemail'];

          $oldphoto = $_REQUEST['txtoldphoto'];
          if($_FILES['txtphoto']['tmp_name']){
                        $photo = $obj->f_upload_img('txtphoto',100,'images');
                    }else{
                        $photo = $oldphoto;
                    }

          $username = $_REQUEST['txtuser'];
          $password = $_REQUEST['txtpass'];

            $table = "tbl_staff";
            $fields = array("StaffName","Sex","DOB","POB","JobTitle","Address","Phone","Email","Photo","Username","Password");
            $values = array($staffname,$sex,$dob,$pob,$jobtitle,$address,$phone,$email,$photo,$username,$password);
            $obj->fun_updatedata($table,$fields,$values,"StaffID",$staffid);
         ?>
            <script type="text/javascript">toastr.success('Staff has been Updated')</script>
        <?php
        }
        ?>
            <div class="container-fluid">
              <!-- This is for code -->
              <h1><center>List of Staff</center></h1>

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
                      $Staff = $obj->fun_displaydataCon("tbl_staff","IsDelete","0");
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
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "u". $staffid; ?>"> 
                              Update        
                          </button>
                        </td> <!-- Button Update -->
                        <td><a class="btn btn-danger" href="staff_form.php?StaffID=<?php echo $staffid;?>">Delete</a></td> <!-- Button Delete -->
                      </tr>

                      <!-- Update Modal -->
                      <div class="modal fade" id="<?php echo "u". $staffid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Update Staff</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>

                                <div class="modal-body">
                                  <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Staff ID</label>
                                          <input type="text" name="txtstaffid" value="<?php echo $staffid;?>" readonly="" class="form-control" />
                                        </div>

                                        <div class="col-md-6">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Staff Name</label>
                                          <input type="text" name="txtstaffname" value="<?php echo $staffname;?>" class="form-control" />
                                        </div>

                                        <div class="col-md-3">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Gender</label>
                                            <select name="gender" class="custom-select mr-sm-2 form-control" value="<?php echo $sex;?>">
                                              <?php
                                                  if ($sex =="Male"){
                                                  
                                              ?>
                                                <option value="Male" <?php echo "SElECTED";?> >Male</option>
                                                <option value="Female">Female</option>
                                              <?php
                                                }else{
                                              ?>
                                                <option value="Male">Male</option>
                                                <option value="Female" <?php echo "SElECTED";?> >Female</option>
                                              <?php
                                                };
                                              ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark complex-colorpicker ">Date of birth</label>
                                          <input type="date" name="txtdob"  class="form-control" value="<?php echo $dob;?>" />
                                        </div>

                                        <div class="col-md-6">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Job Title</label>
                                          <input type="text" name="txtjob" value="<?php echo $jobtitle;?>" class="form-control" />
                                        </div>

                                        <div class="col-md-12">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Place of Birth</label>
                                          <input type="text" name="txtpob" value="<?php echo  $pob;?>" class="form-control" />
                                        </div>

                                        <div class="col-md-12">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Address</label>
                                          <input type="text" name="txtaddress" value="<?php echo $address;?>" class="form-control" />
                                        </div>

                                        <div class="col-md-6">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Phone Number</label>
                                          <input type="text" name="txtphone" value="<?php echo $phone;?>" class="form-control" />
                                        </div>

                                        <div class="col-md-6">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Email</label>
                                          <input type="text" name="txtemail" value="<?php echo $email;?>" class="form-control" />
                                        </div>

                                        <div class="col-md-6">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">User Name</label>
                                          <input type="text" name="txtuser" value="<?php echo $username;?>" class="form-control" />
                                        </div>


                                        <div class="col-md-6">
                                          <label for="recipient-name" class="col-form-label font-weight-bold text-dark">Password</label>
                                          <input type="password" name="txtpass" value="<?php echo $password;?>" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                          <label for="message-text" class="col-form-label font-weight-bold text-dark">Photo</label>
                                               <img src="images/<?php echo$photo?>" class="img">
                                               <input type="file" name="txtphoto" >
                                               <input type="hidden" name="txtoldphoto" value="<?php echo $photo;?>">
                                        </div>
                                    </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="reset" class="btn btn-info" >Reset</button>
                                        <input type="submit" class="btn btn-primary" name="btnupdatestaff" value="Save" >
                                      </div>
                                  </form>
                                </div>
                          </div>
                        </div>
                      </div>
                      <!-- Update Modal -->
                		<?php
                			}
                		?>
                	</table>
                </form>

        <!-- End Button add new staff  -->
        <button type="button" name="btnaddstaff" class="btn btn-primary" data-toggle="modal" data-target="#addnewcat" data-whatever="@mdo">
        Add New</button>
        <!-- End Button add new staff  -->
        <a href="staffformrestore.php" class="btn btn-primary">Restore</a>

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