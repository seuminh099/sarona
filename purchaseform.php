<?php
//import class.php
	require_once('inc/class.php');
//instant object
    $obj = new mycodes;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1"> -->
    <title>PurChase Form</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="images/bdsmall.png">

    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="style1.css" rel="stylesheet">
   
    <link href="plugins/toastr/css/toastr.min.css" rel="stylesheet">

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


                                    
                                
                                    <form action="" enctype="multipart/form-data" method="post">

                                        <div class="container-fluid">
                                          <div class="row">
                                            <div class="col-md-3">
                                                <label for="catname" class="col-form-label">លេខវិក្ក័យប័ត្រ</label>
                                            <input type="text" name="txtdob" class="form-control" id="catname" placeholder="" value="BD-000001" readonly="">
                                        </div>
                                        <div class="col-md-6">
                                            <h3 style="text-align: center;">នាំចូលទំនិញ</h3>
                                        </div>


                                            
                                            <div class="col-md-3">
                                            <label for="catname" class="col-form-label">វិក្ក័យប័ត្រអ្នកផ្គត់ផ្គង់</label>
                                            <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                            </div>
                                        </div>
                                                            
                                        <div class="form-row">
                                             
                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">ឈ្មោះទំនិញ</label>
                                                <div class="input-group ">
                                                 <input type="text" name="txtdob" class="form-control" id="catname" placeholder="insert​ Product...">
                                                  <div class="input-group-append ">
                                                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-plus"></i></button>
                                                  </div>
                                                </div>
                                            </div>
                                             <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">ឈ្មោះអ្នកផ្គត់ផ្គង់</label>
                                                <div class="input-group ">
                                                  <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                    <option selected></option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                  </select>
                                                  <div class="input-group-append ">
                                                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-plus"></i></button>
                                                  </div>
                                                </div>
                                            </div>

                                             <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">អ្នកបញ្ចូល</label>
                                                <div class="input-group ">
                                                  <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                    <option selected></option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                  </select>
                                                  
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">កាលបរិច្ឆេទ</label>
                                                <input type="date" name="txtaddress" class="form-control" id="catname" >
                                            </div>
                                            <!----------------------------------------------->

                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">តម្លៃទិញចូល</label>
                                                <div class="input-group">
                                                  <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                  <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">តម្លៃលក់ចេញ</label>
                                                <div class="input-group">
                                                  <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                  <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">ចំនួន</label>
                                                <div class="input-group">
                                                  <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                 
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">ទំរង់នាំចូល</label>
                                                <div class="input-group ">
                                                  <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                    <option selected></option>
                                                    <option value="1">New</option>
                                                    <option value="2">Second Hand</option>
                                                  </select>
                                                 
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="Sex" class="col-form-label">លេខកូដទំនិញ</label>
                                                <input type="text" name="txtdob" class="form-control" id="catname" placeholder="insertcode...">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">ទំហំផ្ទុក</label>
                                                <div class="input-group ">
                                                 <input type="text" name="txtdob" class="form-control" id="catname" placeholder="insert​ Storage...">
                                                  <div class="input-group-append ">
                                                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-plus"></i></button>

                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">បញ្ចុះតម្លៃ(%)</label>
                                                <div class="input-group ">
                                                 <input type="text" name="txtdob" class="form-control" id="catname" placeholder="insert​ Discount...">
                                                  
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="catname" class="col-form-label">បញ្ចុះតម្លៃ(លុយ)</label>
                                                <div class="input-group ">
                                                 <input type="text" name="txtdob" class="form-control" id="catname" placeholder="insert​ Discount...">
                                                  
                                                </div>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                                              <label class="custom-control-label" for="customCheck1">ប្រើប្រាស់អាយមី</label>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                        </div>


                                        <table class="table ">
                                          <thead>
                                            <tr>
                                              <th scope="col">ល.រ</th>
                                              <th scope="col">ឈ្មោះទំនិញ</th>
                                              <th scope="col">លេខកូដទំនិញ</th>
                                              <th scope="col">តម្លៃទិញចូល</th>
                                              <th scope="col">ចំនួន</th>
                                              <th scope="col">បញ្ចុះតម្លៃ</th>
                                              <th scope="col">សរុប</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th scope="row">1</th>
                                              <td>Iphone 11 Pro Max</td>
                                              <td>778899</td>
                                              <td>1200</td>
                                              <td>10</td>
                                              <td>0</td>
                                              <td>12000</td>
                                              <td>
                                                <div class="form-group col-4">
                                                    <input type="text" name="txtdob" class="form-control" id="catname" value="1" >
                                                </div>
                                            </td>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th scope="row">2</th>
                                              <td>Samsung S20 Ultra</td>
                                              <td>998877</td>
                                              <td>1200</td>
                                              <td>10</td>
                                              <td>0</td>
                                              <td>12000</td>
                                              <td>
                                                  <div class="form-group col-4">
                                                    <input type="text" name="txtdob" class="form-control" id="catname" value="1" >
                                                </div>
                                            </td>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th scope="row">3</th>
                                              <td>OPPO Reno3 Pro</td>
                                              <td>998877</td>
                                              <td>800</td>
                                              <td>10</td>
                                              <td>0</td>
                                              <td>8000</td>
                                              <td>
                                                <div class="form-group col-4">
                                                    <input type="text" name="txtdob" class="form-control" id="catname" value="1" >
                                                </div>
                                            </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        
                                    </form>    


            


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

<script src="plugins/toastr/js/toastr.min.js"></script>
<script src="plugins/toastr/js/toastr.init.js"></script>


    <script src="test.js"></script>
    <script src="script.js"></script>


    <script>
        
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>

</html>