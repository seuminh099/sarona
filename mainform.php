<?php
//import class.php
    require_once('inc/class.php');
//instant object
    $obj = new mycodes;

    if(!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "add":
               

                break;

            case "remove":
               

                break;
        }
    }
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
    <link href="style1.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="style1.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <?php include('preloader.php');  ?>
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
        <?php include('nav-header.php'); ?>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <?php include('headerstart.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->


        <!--**********************************
            Sidebar start
        ***********************************-->
       <?php include('sidebar.php'); ?>
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

            <div class="container-fluid">
                <form method="post" action="" enctype="multipart/form-data">

                    <h3 ><center>List of Product</center></h3>
                    <!-- <table id="example" class="table table-striped table-bordered" style="width:100%" > -->
                    <table cellpadding="5px" cellspacing="0" align="center" border="1px" class="table table-hover font-weight-bolder">
                        <thead class="table-info">
                            <tr class="font-weight-bolder">
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Category Name</th>
                                <th>Model Name</th>
                                <th>Qty</th>
                                <th>Unit Price Purchase</th>
                                <th>Unit Price Sale</th>
                                <th>Status </th>
                                <th></th>
                           </tr>
                        </thead>
                            <tr >
                                <td><?php echo "" ?></td>
                                <td><?php echo  ""?></td>
                                <td><?php echo  ""?></td>
                                <td><?php echo  ""?></td>
                                <td><?php echo  ""?></td>
                                <td><?php echo  ""?></td>
                                <td><?php echo  ""?></td>
                                <td><?php echo  ""?></td>
                                <td>
                                    <a href="#" class="btn btn-danger">Remove  <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                    </table>





                <?php
                        //Accessing method fun_displaydata
                        $Category = $obj->fun_displaydataCon("tblproduct","IsDelete",0);
                        foreach ($Category as $record){
                            $proid = $record['ProductID'];
                            $proname= $record['ProductName'];
                            $photo= $record['Photo'];
                            $price=$record['UnitPrice_Sale'];
                            $qty=$record['Qty'];        
                ?>
                <div >
                    <form method="post" action="mainform.php">
                        <div class="form-row col-md-3 item">
                                <div class="form-group col-md-2">
                                    <img src="images/<?php echo $photo;?>" width="50px" class="rounded float-left">
                                </div>
                                <div class="form-group col-md-9 aa">
                                    <input type="text" class="form-control name" name="price" value="<?php echo $proname;?>" readonly>
                                    <input type="text" class="form-control name" name="price" value="Price: <?php echo $price."$";?>" readonly>
                                    <input type="text" class="form-control qty" name="qty" value="<?php echo "QTY:";?> 0" size="3" >
                                    <input type="submit" class="btn btn-primary" name="addtopurchase" value="Purachase" >
                                </div>     
                        </div>
                    </form>
                </div>
                <?php
                    }
                ?>
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
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="test.js"></script>

</body>

</html>