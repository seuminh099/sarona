
<?php
session_start();
//import class.php kaka
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
                    <h3 ><center>List of Model</center></h3>
    			<!-- <a href="categoryaddform.php">Add New Category</a> -->
                <!-- In data Table -->  
                <?php
                //Test Add Button
    if(isset($_REQUEST['btn_addnew'])){
        $modelname = $_REQUEST['txtmodelname'];
        $desc = $_REQUEST['txtdesc'];
        $result = $obj->fun_checkExistingData($modelname,"tblmodel","ModelName");
        if($result){
       
            ?>
                          <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('You cannot addnew model')</script>
                <?php
        }else{
            $tblname = "tblmodel";
            $fields = array("ModelName","Description");
            $values = array($modelname,$desc);
            $obj->fun_insertdata($tblname,$fields,$values);
            ?>
                            <!-- Alert Success -->
                                <script type="text/javascript">toastr.success('Model successfully added')</script>
                        <?php  
       } 
    }
                //Test key delete
	if(isset($_REQUEST['ModelID'])){
		$key_moid = $_REQUEST['ModelID'];
		$countproduct = $obj->fun_count("tblproduct","ModelID",$key_moid);
		if ($countproduct == 0){
			$row = $obj->fun_lookup("tblmodel","ModelID",$key_moid);
			$table = "tblmodel";
			//Access to methoad fundeletedata and fundeleteimage
	        $fields = array("IsDelete");
	        $values = array("1");
	        $obj->fun_updatedata($table,$fields,$values,"ModelID",$key_moid);
	        ?>
                            <!-- Alert Success -->
                                <script type="text/javascript">toastr.success('Deleted successfully')</script>
                        <?php 
		}else{
			?>
                          <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('You cannot delete this model becouse have product')</script>
                <?php
			
			}	
	}
    //test button update model
    if (isset($_REQUEST['btn_update'])) {
        $modelid=$_REQUEST['txtmodelid'];
        $modelname=$_REQUEST['txtmodelname'];
        $des=$_REQUEST['txtdesc'];
        $result = $obj->fun_checkData("tblmodel","ModelName","ModelID",$modelname,$modelid);
             if($result){
                ?>
                          <!-- Alert Error -->
                            <script type="text/javascript">toastr.error('Cannot Update')</script>
                <?php
            }else{
                $table="tblmodel";
                $field=array("ModelName","Description");
                $value=array($modelname,$des);
                $obj->fun_updatedata($table,$field,$value,"ModelID", $modelid);
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
                                <th >Model ID</th>
                				<th >Model Name</th>
                                <th >Description</th>
                				<th ></th>
                				<th ></th>
                	       </tr>
                		</thead>
                		<?php
                		//Accessing method fun_displaydata
                		$Category = $obj->fun_displaydataCon("tblmodel","IsDelete",0);
                		foreach ($Category as $record){
                			$modelid = $record['ModelID'];
                			$modelname = $record['ModelName'];
                            $desc = $record['Description'];    
                		?>
                            
                			<tr >
                                <td ><?php echo $modelid; ?></td>
                				<td ><?php echo $modelname; ?></td>
                                <td><?php echo $desc; ?></td>
                				<td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "u".$modelid; ?>"> 
                                        Update
                                    </button>
                                </td>
                				<td>
                                    <a href="modelform.php?ModelID=<?php echo $modelid;?>" 
                                           class="btn btn-danger delete" id="delete">Delete</a>
                                </td>
                			</tr>
                            
                    <!--Modal Update Form  -->
                    <div class="modal fade" id="<?php echo "u".$modelid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <label for="catid" class="col-form-label">Model ID</label>
                                            <input type="text" name="txtmodelid" class="form-control" id="catid" readonly value="<?php echo $modelid;?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="catname" class="col-form-label">Model Name</label>
                                            <input type="text" name="txtmodelname" class="form-control" id="catname" value="<?php echo $modelname;?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="des" class="col-form-label">Decription</label>
                                            <input type="text" name="txtdesc" class="form-control" id="des" value="<?php echo $desc;?>" >
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewmodel" data-whatever="@mdo">
                Add New
            </button>
            <a href="modelformRestore.php" class="btn btn-primary">
                Restore
            </a>
            <!-- Bottun Add new  --> 
            <!-- Modal Addnew category-->
            <?php 
                 include('modeladdform.php'); 
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