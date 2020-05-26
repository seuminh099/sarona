<?php
//import class.php
    require_once('inc/class.php');
//instant object
    $obj = new mycodes;
?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>lOGIN</title>
    <!-- Favicon icon -->
    <link href="css/style.css" rel="stylesheet">
    <link href="style1.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="36x36" href="images/bdsmall.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <?php include('preloader.php');  ?>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0 ">
                            <div class="card-body pt-5 form">
                                <a class="text-center" href="loginform.php"> <h3>LOG IN ACCOUNT</h3></a>
        
                                <form class="mt-5 mb-5 login-input " action="logincode.php" method="post">
                                    <div class="form-group">
                                        <input type="text" name="txtusername" class="form-control text-dark" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="txtpassword" class="form-control text-dark" placeholder="Password">
                                    </div>
                                    <input type="submit" name="btnlogin" class="btn btn-primary btn-lg btn-block" value="LOGIN">
                                    <input type="reset"  class="btn btn-secondary btn-lg btn-block" value="RESET">    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>





