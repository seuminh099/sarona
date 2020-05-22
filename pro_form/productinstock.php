
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
    <title>Product</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="36x36" href="../images/bdsmall.png">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="./plugins/toastr/css/toastr.min.css" rel="stylesheet">


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
                        <!-- header row 1 -->
                        <div class="form-group row">
                            <div class="col-sm-4 body-title">ស្វែងរកតាមឈ្មោះ</div>

                            <div class="col-sm-3 body-title">ប្រភេទទំនិញ</div>

                            <div class="col-sm-3 body-title">ទំហំផ្ទុក</div>

                            <div class="col-sm-2 body-title">កូតទំនិញ</div>
                        </div>

                        <!-- Detail row 1 -->
                        <div class="form-group row">
                            <!-- Cbo Find By Name Product -->
                            <div class="col-sm-3">
                                <select class="form-control form-control-sm selectfind">
                                    <option>ស្វែងរកតាមឈ្មោះ</option>
                                </select>
                            </div>

                            <!-- Btn Add Product -->
                            <div class="col-sm-1">
                                
                            </div>

                            <!-- Cbo Find By Category Name -->
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm selectfind">
                                    <option>ប្រភេទទំនិញ</option>
                                </select>
                            </div>

                            <!-- Btn Add Category -->
                            <div class="col-sm-1">
                                
                            </div>

                            <!-- Cbo Find By Storage Name -->
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm selectfind">
                                    <option>ទំហំផ្ទុក</option>
                                </select>
                            </div>

                            <!-- Btn Add Storage -->
                            <div class="col-sm-1">
                                
                            </div>

                            <!-- Cbo Find By Code Product -->
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm selectfind">
                                    <option>កូតទំនិញ</option>
                                </select>
                            </div>
                        </div>

                        <!-- header row 2 -->
                        <div class="form-group row">
                            <div class="col-sm-4 body-title">លេខវិក្ក័យប័ត្រ</div>

                            <div class="col-sm-3 body-title">ថ្ងៃខែនាំចូល</div>

                            <div class="col-sm-3 body-title">ដល់</div>

                            <div class="col-sm-2 body-title">អ្នកផ្គត់ផ្គង់</div>
                        </div>

                        <!-- Detail row 2 -->
                        <div class="form-group row">
                            <!-- Cbo Find By Invoice Number -->
                            <div class="col-sm-3">
                                <select class="form-control form-control-sm selectfind">
                                    <option>លេខវិក្ក័យប័ត្រ</option>
                                </select>
                            </div>

                            <!-- Blank col -->
                            <div class="col-sm-1">  
                            </div>

                            <!-- Cbo Find By Start Date -->
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm selectfind">
                                    <option>ថ្ងៃ ខែ ឆ្នាំ</option>
                                </select>
                            </div>

                            <!-- Blank col -->
                            <div class="col-sm-1">
                            </div>

                            <!-- Cbo find by End Date -->
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm selectfind">
                                    <option>ថ្ងៃ ខែ ឆ្នាំ</option>
                                </select>
                            </div>

                            <!-- Blank col -->
                            <div class="col-sm-1">
                            </div>

                            <!-- Cbo find by Supplier -->
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm selectfind">
                                    <option>អ្នកផ្គតផ្គង់</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-1">
                                <button type="button" class="btn btn-primary btn-sm">ស្វែងរក</button>
                            </div>

                            <div class="col-3">
                                <button type="button" class="btn btn-primary btn-sm">បង្ហាញទាំងអស់</button>
                            </div>

                             <div class="col-6">
                                
                            </div>

                             <div class="col-1">
                                <button type="button" class="btn btn-primary btn-sm">Excel</button>
                            </div>

                             <div class="col-1">
                                <button type="button" class="btn btn-primary btn-sm">Print</button>
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
                        <tr>
                          <th scope="row">1</th>
                          <td>BD-001</td>
                          <td>15-May-20</td>
                          <td>0000001</td>
                          <td>iPhone 11 Pro </td>
                          <td>Phone</td>
                          <td>1</td>
                          <td>1100</td>
                          <td>1100</td>
                          <td>1200</td>
                          <td>32GB</td>
                          <td>Admin</td>
                          <td>Dara</td>
                          <td>Iphone</td>
                        </tr>
                       <th scope="row">2</th>
                          <td>BD-002</td>
                          <td>15-May-20</td>
                          <td>0000002</td>
                          <td>iPhone 11 Pro </td>
                          <td>Phone</td>
                          <td>1</td>
                          <td>1100</td>
                          <td>1100</td>
                          <td>1200</td>
                          <td>32GB</td>
                          <td>Admin</td>
                          <td>Dara</td>
                          <td>Iphone</td>
                        </tr>
                        <tr class="table-danger">
                            <td colspan="6">
                                <center>សរុប</center>
                            </td>
                            <td>2</td>
                            <td></td>
                            <td>2200</td>

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

</html>