
<?php
//import class
	require_once('../inc/class.php');
//instant object
    $obj = new mycodes;
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Bundouen2 Phoneshop || Member</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="images/bdsmall.png">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../style1.css" rel="stylesheet">
    <link rel="../stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!--<link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
                    <h3 ><center>List of Members</center></h3>
    			<!-- <a href="categoryaddform.php">Add New Category</a> -->
                <!-- In data Table -->    
        <?php         
            //test button addnew
                if(isset($_REQUEST['btn_addnew'])){
                                $membertype = $_REQUEST['txtmembertype'];
                                $discount = $_REQUEST['txtdisc'];
                                $result = $obj->fun_checkExistingData($membertype,"tblmember","MemberType");
                                if($result){
                                    ?>
                          <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('<?php echo $membertype ?> Existing Members')</script>
                <?php
                                }else{
                                    $tblname = "tblmember";
                                    $fields = array("MemberType","Discount");
                                    $values = array($membertype,$discount);
                                    $obj->fun_insertdata($tblname,$fields,$values);
                                  
                                      ?>
                            <!-- Alert Success -->
                                <script type="text/javascript">toastr.success('Model has been added')</script>
                        <?php 
                                }
                            }
        //Test Delete Button
        if(isset($_REQUEST['MemberID'])){
            $key_memberid = $_REQUEST['MemberID'];
            $count = $obj->fun_count("tblcustomer","MemberID",$key_memberid);
            if ($count == 0){
                $row = $obj->fun_lookup("tblmember","MemberID",$key_memberid);
            $table = "tblmember";
            //Access to methoad fundeletedata and fundeleteimage
            $fields = array("IsDelete");
            $values = array("1");
            $obj->fun_updatedata($table,$fields,$values,"MemberID",$key_memberid);
            ?>
                            <!-- Alert Success -->
                                <script type="text/javascript">toastr.success('Delete successfully')</script>
                        <?php 
        }else{
            ?>
                          <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('Cannot Delete')</script>
                <?php
        }
        }
    //Test Update Button
        if(isset($_REQUEST['btn_update'])){
            $memberid = strtolower(trim($_REQUEST['txt_MemberID']));
            $membertype = strtolower(trim($_REQUEST['txt_Membertype']));
            $discount = $_REQUEST['txt_discount'];
            $result = $obj->fun_checkData("tblmember","MemberType","MemberID",$membertype,$memberid);
             if($result){
                ?>
                          <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('Cannot Update')</script>
                <?php
            }else{
                $tblname = "tblmember";
                $fields = array("MemberType","Discount");
                $values = array($membertype,$discount);
                $obj->fun_updatedata($tblname,$fields,$values,"MemberID",$memberid);
                 ?>
                            <!-- Alert Success -->
                                <script type="text/javascript">toastr.success('Update successfully')</script>
                        <?php 
           } 
        }
            ?>              
                <form method="post" action="" enctype="multipart/form-data">
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%" > -->
                	<table cellpadding="5px" cellspacing="0" align="center" border="1px" class="table table-hover font-weight-bolder">
                		<thead class="table-info">
                			<tr class="font-weight-bolder">
                                <th >Member ID</th>
                                <th >Member Type</th>
                                <th >Discount</th>
                				<th ></th>
                				<th ></th>
                	       </tr>
                		</thead>
                		<?php
                		//Accessing method fun_displaydata
                		$Category = $obj->fun_displaydataCon("tblmember","IsDelete",0);
                		foreach ($Category as $record){
                			$memberid = $record['MemberID'];
                			$membertype= $record['MemberType'];
                            $discount= $record['Discount'];    
                		?>
                            
                			<tr >
                                <td><?php echo $memberid; ?></td>
                				<td ><?php echo $membertype; ?></td>
                                <td><?php echo $discount; ?></td>
                				<td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "u". $memberid; ?>"> 
                                        Update
                                    </button>
                                </td>
                				<td>
                                    <a href="memberform.php?MemberID=<?php echo $memberid;?>" 
                                           class="btn btn-danger delete" id="delete">Delete</a>
                                </td>
                			</tr>
                            
                    <!--Modal Update Form  -->
                    <div class="modal fade" id="<?php echo "u". $memberid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content bg-light">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Update Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-light">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label for="catid" class="col-form-label">Member ID</label>
                                            <input type="text" name="txt_MemberID" class="form-control" id="catid" readonly value="<?php echo $memberid ;?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="catname" class="col-form-label">Member Type</label>
                                            <input type="text" name="txt_Membertype" class="form-control" id="catname" value="<?php echo $membertype;?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="des" class="col-form-label">Dicount</label>
                                            <input type="text" name="txt_discount" class="form-control" id="des" value="<?php echo $discount;?>" >
                                        </div>

                                        <!-- Button  -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="reset" class="btn btn-info" >Reset</button>
                                            <button type="submit" class="btn btn-default bg-primary text-white" name="btn_update">Update</button>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewMember" data-whatever="@mdo">
                Add New
            </button>
            <!-- Bottun Add new  --> 

            <!-- Button Restore -->
            <a href="memberrestore.php" class="btn btn-primary">Restore</a>
            <!-- Button Restore -->


            <!-- Modal Addnew category-->
            <?php 
                include('memberaddform.php'); 
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