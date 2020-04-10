
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
            <div id="../main-wrapper">

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
                <?php

                //Test Delete button

                if(isset($_REQUEST['ProID'])){
                    $key_proid = $_REQUEST['ProID'];

                    //count product in tblpurchasedetail
                    $countpurchase = $obj->fun_count("tblpurchasedetail","ProductID",$key_proid);
                    //count product in tblsaledetail
                    $countsale = $obj->fun_count("tblsaledetail","ProductID",$key_proid);
                    $result = $obj->fun_countpro2con("tblproduct","Qty","ProductID","1",$key_proid);
                    //ber sern jea in $countpurchase == 0 and $countsale == 0 ban ney tha product ng ot torn ban louk ban tinh ey te jing delete ban
                    if(($countpurchase == 0 ) && ($countsale == 0)){

                        if($result == 1) {
                        ?>
                            <script type="text/javascript">toastr.error('Qty > O')</script>
                        <?php
                        }else{

                            $row = $obj->fun_lookup("tblproduct","ProductID",$key_proid);
                            $logo = $row['Photo'];
                            $table = "tblproduct";
                            $fieldid = "ProductID";
                            
                            $countcatewithimg = $obj->fun_count("tblcategory","Photo",$logo);

                            if($countcatewithimg == 1){
                            //Access to methoad fundeletedata and fundeleteimage
                            $obj->fun_deleteimage($logo);
                            $obj->fun_deletedata($table,$fieldid,$key_proid);
                            ?>
                            <script type="text/javascript">toastr.success('Delete successfully')</script>
                            <?php
                            }else{
                                $obj->fun_deletedata($table,$fieldid,$key_proid);
                            ?>
                                <script type="text/javascript">toastr.success('Delete successfully')</script>
                            <?php           
                            }
                            
                        }
                    }else{
                    ?>
                         <script type="text/javascript">toastr.error('you can not delete this product')</script>
                    <?php
                    }
    }

                    //Test restore button
                 if(isset($_REQUEST['ProductID'])){
                    $key_proid = $_REQUEST['ProductID'];
                    //$count_pro = $obj->fun_countpro($key_catid);
                    $table = "tblproduct";
                    $fields = array("IsDelete");
                    $values = array("0");
                    $obj->fun_updatedata($table,$fields,$values,"ProductID",$key_proid);
                ?>
                    <script type="text/javascript">toastr.success('Restore successfully......')</script>
                <?php
                 }
                ?>
                <form method="post" action="" enctype="multipart/form-data">

                    <h3 ><center>List of Product Restore</center></h3>
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%" > -->
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
                        $product = $obj->fun_displaydataCon("tblproduct","IsDelete",1);
                        foreach ($product as $record){
                                $catid = $record['CategoryID'];
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
                                    <a href="productrestoreform.php?ProductID=<?php echo $proid;?>" class="btn btn-primary">
                                        Restore
                                    </a>
                                </td>
                				<td>
                                    <a href="productrestoreform.php?ProID=<?php echo $proid;?>" 
                                           class="btn btn-danger delete">Delete</a>
                                </td>
                			</tr>

                        <?php
                                
                			}
                		?>
                	</table>
                </form>        
                <!-- End data Table -->   

            <!-- Bottun Add new  -->
            <a href="#" class="btn btn-primary">Restore All</a>
            <!-- Bottun Add new  --> 
            <a href="productformshow.php" class="btn btn-primary">Back</a>
            <!-- Modal Addnew category-->
  

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