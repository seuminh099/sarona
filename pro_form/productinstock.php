
<?php
session_start();
//import class.php
	require_once('../inc/class.php');
//instant object
    $obj = new mycodes;
//require_once('../inc/restrict.php');
    
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
    <link href="./plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <!-- row -->
            <div class="container-fluid" id="load-products">
                <!-- Body Here -->

                    <center><h3 class="header-title">ទំនិញក្នុងស្តុក</h3></center>
                    <br>
                    <form>
                        <!-- Row 1 ------------- -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="col-form-label headertitle">ស្វែងរកតាមឈ្មោះទំនិញ</label>
                                <div class="input-group ">
                                    <select name="framework" id="framework" class="selectpicker" data-live-search="true">
                                        <?php
                                            $proname = $obj->fun_SelectDistinc("tbl_product","ProductName","IsDelete",0);
                                            foreach ($proname as $item) {
                                                $pro_name = $item['ProductName'];              
                                        ?>
                                          <option>
                                                <?php echo $pro_name; ?>
                                          </option>
                                           <?php
                                                }
                                            ?>
                                        </select>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label class="col-form-label headertitle">ប្រភេទទំនិញ</label>
                                       <select name="framework" id="framework" class="selectpicker" data-live-search="true">
                                   
                                          <?php
                                            $cate = $obj->fun_SelectDistinc("tbl_category","CategoryName","IsDelete",0);
                                            foreach ($cate as $item) {
                                                $cat_name = $item['CategoryName'];              
                                        ?>
                                          <option>
                                                <?php echo $cat_name; ?>
                                          </option>
                                           <?php
                                                }
                                            ?>  
                                        </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="col-form-label headertitle">ទំហំផ្ទុក</label>
                                <div class="input-group ">
                                  <select class="selectpicker" id="inputGroupSelect04" data-live-search="true">
                                    <option>16</option>
                                    <option>32</option>
                                    <option>64</option>
                                    <option>128</option>
                                    <option>256</option>
                                    <option>512</option>
                                  </select>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label headertitle">កូដទំនិញ</label>
                                <div class="input-group ">
                                  <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected></option>
                                    <option></option>
                                  </select>
                                </div>
                            </div>                
                        </div>

                        <!-- Row 2 ------------- -->
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="col-form-label headertitle">ស្វែងរកតាមវិក្ក័យប័ត្រ</label>
                                <div class="input-group ">
                                  <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected></option>
                                    <option></option>
                                  </select>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label headertitle">ថ្ងៃខែនាំចូល</label>
                                <div class="input-group ">
                                  <input type="date" name="txtaddress" class="form-control" id="catname" >
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label headertitle">ដល់ថ្ងៃទី</label>
                                <div class="input-group ">
                                  <input type="date" name="txtaddress" class="form-control" id="catname" >
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label headertitle">អ្នកផ្គត់ផ្គង់</label>
                                <div class="input-group ">
                                  <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected></option>
                                    <option></option>
                                  </select>
                                </div>
                            </div>                
                        </div>

                    </form>

                    <!-- Display Product -->
                    <table class="table table-hover">
                      <thead>
                        <tr class="text">
                          <th scope="col">ល.រ</th>
                          <th scope="col">វិក្ក័យប័ត្រ</th>
                          <th scope="col">កាលបរិច្ឆេទ</th>
                          <th scope="col">កូតទំនិញ</th>
                          <th scope="col">ឈ្មោះទំនិញ</th>
                          <th scope="col">ប្រភេទទំនិញ</th>
                          <th scope="col">ចំនួន</th>
                          <th scope="col">តម្លៃរាយ</th>
                          <th scope="col">តម្លៃសរុប</th>
                          <th scope="col">តម្លៃលក់</th>
                          <th scope="col">ទំហំផ្ទុក</th>
                          <th scope="col">អ្នកទិញ</th>
                          <th scope="col">អ្នកផ្គត់ផ្គង់</th>
                          <th scope="col">ម៉ាក</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $purchase = $obj->fun_displaydata("vpurchase");
                            $i = 0;
                            $totalQty = 0;
                            $totalQty = 0;
                            $totalPrice = 0;
                            foreach ($purchase as $item) {
                                $invoice = $item['Invioce'];
                                $date = $item['PurchaseDate'];
                                $Imei = $item['Imei'];
                                $ProductName = $item['ProductName'];
                                $CategoryName = $item['CategoryName'];
                                $PurchaseQty = $item['PurchaseQty'];
                                $PurchasePrice = $item['PurchasePrice'];
                                $subPrice = $PurchaseQty * $PurchasePrice;
                                $SalePrice = $item['SalePrice'];
                                $StorageName = $item['StorageName'];
                                $UserName = $item['UserName'];
                                $SupplierName = $item['SupplierName'];
                                $ModelName = $item['ModelName'];
                                $i = $i + 1;
                                $totalQty = $totalQty + $PurchaseQty;
         ;                      $totalPrice =$totalPrice + $subPrice;

                        ?>
                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $invoice; ?></td>
                          <td><?php echo $date ?></td>
                          <td><?php echo $Imei ?></td>
                          <td><?php echo $ProductName ?></td>
                          <td><?php echo $CategoryName ?></td>
                          <td><?php echo $PurchaseQty ?></td>
                          <td><?php echo $PurchasePrice ?></td>
                          <td><?php echo $subPrice; ?></td>
                          <td><?php echo $SalePrice ?></td>
                          <td><?php echo $StorageName ?></td>
                          <td><?php echo $UserName ?></td>
                          <td><?php echo $SupplierName ?></td>
                          <td><?php echo $ModelName ?></td>      
                        </tr>
                        <?php 
                          }
                        ?>

                        <tr class="table-danger">
                            <td colspan="6">
                                <center>សរុប</center>
                            </td>
                            <td><?php echo $totalQty; ?></td>
                            <td></td>
                            <td><?php echo $totalPrice; ?></td>
                        </tr>
                      </tbody>
                    </table>
                <!-- End Body -->
           
                
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

    </script>
</body>

 <script> 
 /* 
 $(document).ready(function(){  
      $('.selectpicker').selectpicker();
 });
 */



 </script>
</html>

