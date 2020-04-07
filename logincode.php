<?php  
session_start();
//import class.php
    require_once('inc/class.php');
//instant object
    $obj = new mycodes;

    //test button login
    if (isset($_POST['btnlogin'])){
        $username=$_POST['txtusername'];
        $password=$_POST['txtpassword'];

        $result=$obj->fun_checkuserpwd($username,$password);

        if ($result){
            $_SESSION['Username']=$username;
            $_SESSION['Password']=$password;
            header('location:staff_form/staff_form.php');
        }else{
            echo "Loing Failed";
            header('location:loginform.php');
        }
    }

?>
