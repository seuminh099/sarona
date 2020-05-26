
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
    <title> Bundouen2 Phoneshop || Customer </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="images/bdsmall.png">
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
                    <h3 ><center>List of Customer </center></h3>
    			<!-- <a href="categoryaddform.php">Add New Category</a> -->
                <!-- In data Table -->    
                <?php
                /* ----------------------------------------- Test Delete Button ----------------------------------------- */
                if (isset($_REQUEST['CustomerID'])) {
                    $cusid = $_REQUEST['CustomerID'];
                        $table = "tbl_customer";
                        $fields = array("IsDelete");
                        $values = array("1");
                        $obj->fun_updatedata($table,$fields,$values,"CustomerID",$cusid);
                ?>
                        <script type="text/javascript">toastr.success('Customer has been Deleted')</script>
                <?php
                }
                /* ----------------------------------------- Test Add New Button ---------------------------------------- */
                if(isset($_REQUEST['btnadd'])){
                    $cusname = $_REQUEST['txtcusname'];
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

                    $member = $_REQUEST['txtmember'];
                
                        $table = "tbl_customer";
                        $fields = array("CustomerName","Sex","DOB","POB","JobTitle","Address","Phone","Email","Photo","MemberID");
                        $values = array($cusname,$sex,$dob,$pob,$jobtitle,$address,$phone,$email,$photo,$member);
                        $obj->fun_insertdata($table,$fields,$values);

                        ?>
                            <script type="text/javascript">toastr.success('Customer has been Added')</script>
                        <?php
                }
                /* ------------------------------------------ Test Update Button ---------------------------------------- */

                    if(isset($_REQUEST['btnupdate'])){
                        $cusid = strtolower(trim($_REQUEST['txtcusid']));
                        $cusname = strtolower(trim($_REQUEST['txtcusname']));
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
                                $member = $_REQUEST['txtmember'];

                                    $table = "tbl_customer";
                                    $fields = array("CustomerName","Sex","DOB","POB","JobTitle","Address","Phone","Email","Photo","MemberID");
                                    $values = array($cusname,$sex,$dob,$pob,$jobtitle,$address,$phone,$email,$photo,$member);
                                    $obj->fun_updatedata($table,$fields,$values,"CustomerID",$cusid);
                        ?>
                                    <script type="text/javascript">toastr.success('Customer has been updated')</script>
                        <?php
                
        }
                ?>                               
                <form method="post" action="" enctype="multipart/form-data">
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%" > -->
                	<table cellpadding="5px" cellspacing="0" align="center" border="1px" class="table table-hover font-weight-bolder">
                		<thead class="table-info">
                			<tr class="font-weight-bolder">
                                <th >Customer ID</th>
                                <th >Customer Name</th>
                                <th >Gender</th>
                                <th >DOB</th>
                                <th >POB</th>
                                <th >Job Title</th>
                                <th >Address</th>
                                <th >Phone</th>
                                <th >Email</th>
                                <th >Photo</th>
                                <th >Member</th>
                				<th ></th>
                				<th ></th>
                	       </tr>
                		</thead>
                		<?php
                		//Accessing method fun_displaydata
                		$Category = $obj->fun_displaydataCon("tbl_customer","IsDelete",0);
                		foreach ($Category as $record){
                			$customerid = $record['CustomerID'];
                			$customername= $record['CustomerName'];
                            $gender= $record['Sex'];
                            $dob= $record['DOB'];
                            $pob= $record['POB'];
                            $job= $record['JobTitle'];
                            $address= $record['Address'];
                            $phone= $record['Phone'];
                            $email= $record['Email'];
                            $photo= $record['Photo'];
                            $member= $record['MemberID'];

                            $getmember=$obj->fun_lookup("tbl_member","MemberID",$member);
                            $member_id=$getmember['MemberID'];
                            $member_type=$getmember['MemberType'];
                		?>
                            
                			<tr>
                                <td><?php echo $customerid; ?></td>
                				<td ><?php echo $customername; ?></td>
                                <td><?php echo $gender; ?></td>
                                <td><?php echo $dob; ?></td>
                                <td><?php echo $pob; ?></td>
                                <td><?php echo $job; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><img src="images/<?php echo $photo; ?> " width="50px" ></td>
                                <td><?php echo $member_type; ?></td>
                				<td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "u". $customerid;?>"> 
                                        Update
                                    </button>
                                </td>
                				<td>
                                    <a href="customerform.php?CustomerID=<?php echo $customerid;?>" 
                                           class="btn btn-danger delete" id="delete">Delete</a>
                                </td>
                			</tr>
                            

                    <!--Modal Update Form  -->
                    <div class="modal fade" id="<?php echo "u". $customerid;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content bg-light">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Update Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-light">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="catid" class="col-form-label">Customer ID</label>
                                            <input type="text" name="txtcusid" class="form-control" id="catid" value="<?php echo $customerid ;?>" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="catname" class="col-form-label">Customer Name</label>
                                            <input type="text" name="txtcusname" class="form-control" id="catname" value="<?php echo $customername;?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                                <label for="Sex" class="col-form-label">Gender</label>
                                                <select class="form-control" id="Sex" name="gender" value="<?php echo $gender; ?>">
                                                    <?php
                                                        if($gender=="Male"){
                                                    ?>
                                                        <option value="Male"<?php echo "SELECTED";?>>Male</option>
                                                        <option value="Female">Female</option>
                                                    <?php
                                                        }else{
                                                    ?>
                                                        <option value="Male">Male</option>
                                                        <option value="Female"<?php echo "SELECTED";?>>Female</option>
                                                    <?php
                                                        };
                                                    ?>

                                                </select>
                                            </div>
                                        <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">Date of Birth</label>
                                                <input type="Date" name="txtdob" class="form-control" id="catname" value="<?php echo $dob;?>">
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label for="catname" class="col-form-label">Place Of Birth</label>
                                                <input type="text" name="txtpob" class="form-control" id="catname" value="<?php echo $pob;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Jop Title</label>
                                                <input type="text" name="txtjob" class="form-control" id="catname" value="<?php echo $job;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Address</label>
                                                <input type="text" name="txtaddress" class="form-control" id="catname" value="<?php echo $address;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Phone</label>
                                                <input type="text" name="txtphone" class="form-control" id="catname" value="<?php echo $phone;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="catname" class="col-form-label">Email</label>
                                                <input type="text" name="txtemail" class="form-control" id="catname" value="<?php echo $email;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="member" class="col-form-label">Member</label>
                                                <select name="txtmember" class="form-control" id="member" value="<?php echo $member;?>">
                                                    <?php

                                                        $updatemember = $obj->fun_displaydataCon("tbl_member","IsDelete",0);

                                                        foreach ($updatemember as $items) {
                                                            $memberid = $items['MemberID'];
                                                            $membertype = $items['MemberType'];
                                                    ?>
                                                            <option value="<?php echo $memberid;?>"
                                                                <?php 
                                                                if($member == $memberid)
                                                                {echo "SELECTED";};?> >
                                                                <?php echo $membertype;?>
                                                            </option>
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
                    <!--End Update Form--> 

                        <?php
                			}
                		?>
                	</table>
                </form>        
                <!-- End data Table -->   


            <!-- Bottun Add new  -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewcustomer" data-whatever="@mdo">
                Add New
            </button>
            <a class="btn btn-primary" href="customerrestore.php">Restore</a>
            <!-- Bottun Add new  --> 

            <!-- Modal Addnew category-->
            <?php 
                include('customeraddform.php'); 
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


    <script>
        
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>

</html>