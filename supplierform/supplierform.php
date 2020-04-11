
<?php
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

                    <!-- =========================Test button Update=========================== -->  
                    <?php
                        if(isset($_REQUEST['btnupdate'])){
                            $subid = $_REQUEST['txtsupid'];
                            $subname = $_REQUEST['txtsupname'];
                            $sex = $_REQUEST['gender'];
                            $dob = $_REQUEST['txtdob'];
                            $pob = $_REQUEST['txtpob'];
                            $jobtitle = $_REQUEST['txtjob'];
                            $company = $_REQUEST['txtcompany'];
                            $address = $_REQUEST['txtaddress'];
                            $phone = $_REQUEST['txtphone'];
                            $email = $_REQUEST['txtemail'];

                            $oldphoto = $_REQUEST['txtoldphoto'];
                            if($_FILES['txtphoto']['tmp_name']){
                                $photo = $obj->f_upload_img('txtphoto',100,'images');
                            }else{
                                $photo = $oldphoto;
                            }
                                $tblname = "tblsupplier";
                                $fields = array("SupplierName","Sex","DOB","POB","JobTitle","CompanyName","Address","Phone","Email","Photo");
                                $values = array($subname,$sex,$dob,$pob,$jobtitle,$company,$address,$phone,$email,$photo);
                                $obj->fun_updatedata($tblname,$fields,$values,"SupplierID",$subid);
                                //header('location:supplierform.php');
                                ob_end_flush(); 
                    ?>
                            <script type="text/javascript">toastr.success('Update successfully!!!')</script>
                    <?php
                        }
                    ?>
                    <!-- =========================end Test button Update=========================== --> 

                    <!-- =========================Test button add new =========================== --> 
                    <?php
                        if (isset($_REQUEST['btnaddnew'])){
                            $suppliername = $_REQUEST['txtsubname'];
                            $sex = $_REQUEST['gender'];
                            $dob = $_REQUEST['txtdob'];
                            $pob = $_REQUEST['txtpob'];
                            $jobtitle = $_REQUEST['txtjob'];
                            $companyname = $_REQUEST['txtcompany'];
                            $address = $_REQUEST['txtaddress'];
                            $phone = $_REQUEST['txtphone'];
                            $email = $_REQUEST['txtemail'];

                            if($_FILES['txtphoto']['tmp_name']){
                                $photo= $obj->f_upload_img('txtphoto',100,'images');
                            }else{
                                $photo = "default.jpg";
                            }
                            
                            $tblname="tblsupplier";
                            $fields=array("SupplierName","Sex","DOB","POB","JobTitle","CompanyName","Address","Phone","Email","Photo");
                            $values=array($suppliername,$sex,$dob,$pob,$jobtitle,$companyname,$address,$phone,$email,$photo);
                            $obj->fun_insertdata($tblname,$fields,$values);
                            //header('location:supplierform.php');
                            ob_end_flush();
                    ?>
                        <script type="text/javascript">toastr.success('Add Supplier successfully!!!')</script>
                    <?php 
                        }
                    ?>
                    <!-- =========================end Test button add new =========================== --> 

                    <!-- ========================= Test button Delete =========================== --> 
                    <?php
                        
                        if(isset($_REQUEST['SupplierID'])){
                            $subid = $_REQUEST['SupplierID'];

                            $countpurchase = $obj->fun_count("tblpurchase","SupplierID",$subid);

                            if ($countpurchase > 0) {         
                    ?>
                                <script type="text/javascript">toastr.error('you cannot delete this suplier')</script>
                    <?php
                            }else{
                                $tblname = "tblsupplier";
                                $fields = array("IsDelete");
                                $values = array("1");
                                $obj->fun_updatedata($tblname,$fields,$values,"SupplierID",$subid);
                                ob_end_flush();
                    ?>
                                <script type="text/javascript">toastr.success('Supplier has been Delete!!!')</script>
                    <?php

                            }
                        }
                    ?>
                    <!-- =========================End Test button Delete =========================== --> 
                    <h3 ><center>List of Supplier</center></h3>
                	<table cellpadding="5px" cellspacing="0" align="center" border="1px" class="table table-hover font-weight-bolder">
                		<thead class="table-info">
                			<tr class="font-weight-bolder">
                                <th>Supplier ID</th>
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
                        $product = $obj->fun_displaydataCon("tblsupplier","IsDelete",0);
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
                                <td><?php echo $supplierid; ?></td>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "u".$supplierid;?>"> 
                                        Update
                                     <i class="fas fa-redo"></i></button>
                                </td>
                				<td>
                                    <a href="supplierform.php?SupplierID=<?php echo $supplierid;?>" 
                                           class="btn btn-danger delete" id="delete">Delete <i class="fas fa-trash-alt"></i> </a>
                                </td>
                			</tr>
                            

                    <!--Modal Update Form  -->
                    <div class="modal fade" id="<?php echo "u".$supplierid;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content bg-light">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Update Supplier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-light">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label for="catid" class="col-form-label">Supplier ID</label>
                                            <input type="text" name="txtsupid" class="form-control" id="catid" value="<?php echo $supplierid;?>" readonly>
                                        </div>

                                        <div class="form-group col-md-9">
                                            <label for="catname" class="col-form-label">Supplier Name</label>
                                            <input type="text" name="txtsupname" class="form-control" id="catname" value="<?php echo $suppliername;?>">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="des" class="col-form-label">Gender</label>
                                            <select name="gender" value="<?php echo $sex;?>" class="custom-select mr-sm-2">
                                                <?php
                                                    if ( $sex=="Male") {
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

                                            <div class="form-group col-md-6">
                                                <label for="unit" class="col-form-label">DOB</label>
                                                <input type="date" name="txtdob" class="form-control" id="unit" value="<?php echo  $dob;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="sale" class="col-form-label">POB</label>
                                                <input type="text" name="txtpob" class="form-control" id="sale" value="<?php echo $pob;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="status" class="col-form-label">JobTitle</label>
                                                <input type="text" name="txtjob" class="form-control" id="status" value="<?php echo  $jobtitle;?>">
                                            </div>
                                    		<div class="form-group col-md-6">
                                                <label for="status" class="col-form-label">Company Name</label>
                                                <input type="text" name="txtcompany" class="form-control" id="status" value="<?php echo $companyname;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="status" class="col-form-label">Address</label>
                                                <input type="text" name="txtaddress" class="form-control" id="status" value="<?php echo $address;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="status" class="col-form-label">Phone</label>
                                                <input type="text" name="txtphone" class="form-control" id="status" value="<?php echo $phone;?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="status" class="col-form-label">Email</label>
                                                <input type="text" name="txtemail" class="form-control" id="status" value="<?php echo $email;?>">
                                            </div>
                                            <div class="form-group">
						                        <label for="" class="col-form-label font-weight-bold text-dark">Photo</label>
						                             <img src="images/<?php echo $photo;?>" class="img">
						                             <input type="file" name="txtphoto">
						                             <input type="hidden" name="txtoldphoto" value="<?php echo $photo; ?>">
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsupplier" data-whatever="@mdo">
                Add New <i class="fas fa-user-plus"></i></button>
            <!-- Bottun Add new  --> 
            <a href="supplierrestoreform.php" class="btn btn-primary">Restore <i class="fas fa-trash-restore"></i></a>
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