
<?php
//import class.php
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
    <title>Bundouen II Phoneshop</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="images/bdsmall.png">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../style1.css" rel="stylesheet">
   

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
       <?php include('../sidebar.php'); ?>
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
                    <h3 ><center>Restore Model</center></h3>
    			<!-- <a href="categoryaddform.php">Add New Category</a> -->
                <!-- In data Table -->       
                <?php

                    //Test key delted
                    if(isset($_REQUEST['MeID'])){
                        $key_memberid = $_REQUEST['MeID'];
                        //count customer
                        $countcustomer = $obj->fun_count("tblcustomer","CustomerID",$key_memberid);
                        //ber sern jea in member nus ot mean customer oy lub ban
                        if($countcustomer == 0){
                            $row = $obj->fun_lookup("tblmember","MemberID",$key_memberid);
                            $table = "tblmember";
                            $fieldid = "MemberID";
                                $obj->fun_deletedata($table,$fieldid,$key_memberid);
                            ?>
                            <!-- Alert Success -->
                                <script type="text/javascript">toastr.success('Deleted successfully')</script>
                        <?php 
                        }else{
                            ?>
                          <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('You cannot delete this member becouse have customer')</script>
                <?php
                        }
                    }
                //test key restore
                if (isset($_REQUEST['MemberID'])) {
                    $memberid = $_REQUEST['MemberID'];
                        $table = "tblmember";
                        $fields = array("IsDelete");
                        $values = array("0");
                        $obj->fun_updatedata($table,$fields,$values,"MemberID",$memberid); 
                        ?>
                            <!-- Alert Success -->
                                <script type="text/javascript">toastr.success('Restore successfully')</script>
                        <?php    
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
                                <th ></th>
                	       </tr>
                		</thead>
                		<?php
                		//Accessing method fun_displaydata
                		$member = $obj->fun_displaydataCon("tblmember","IsDelete",1);
                		foreach ($member as $record){
                			$memberid = $record['MemberID'];
                			$membertype = $record['MemberType'];
                            $Discount = $record['Discount'];    
                		?>    
                			<tr >
                                <td ><?php echo $memberid; ?></td>
                				<td ><?php echo $membertype; ?></td>
                                <td><?php echo $Discount; ?></td>
                				<td>

                                    <a href="memberrestore.php?MemberID=<?php echo $memberid;?>" 
                                           class="btn btn-primary delete" id="delete">Restore</a>

                                </td>
                				<td>
                                    <a href="memberrestore.php?MeID=<?php echo $memberlid;?>" 
                                           class="btn btn-danger delete" id="delete">Delete</a>
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                      <label class="form-check-label" for="inlineCheckbox1"></label>
                                    </div>
                                </td>
                			</tr>
                            
                    

                        <?php
                			}
                		?>
                	</table>
                </form>        
                <!-- End data Table -->   


            <!-- Bottun Add new  -->
            <a href="#" class="btn btn-primary"> Restore All </a>
            <a href="modelform.php" class="btn btn-primary">Back</a>

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