<?php  
//import class.php
	require_once('inc/class.php');
//instant object
    $obj = new mycodes;

    if (isset($_REQUEST['btnaddnew'])){
        $suppliername = $_REQUEST['txtsubname'];
        $sex = $_REQUEST['gender'];
        $dob = $_REQUEST['txtdob'];
        $pob = $_REQUEST['txtpob'];
        $jobtitle = $_REQUEST['txtjob'];
        $companyname = $_REQUEST['txtcompany'];
        $address = $_REQUEST['txtaddress'];
        $phone = $_REQUEST['txtphone'];
        $email = $_REQUEST['txtemail'];

        if($_FILES['txtphoto']['tmp_name']){
            $photo= $obj->f_upload_img('txtphoto',100,'images');
        }else{
            $photo = "default.jpg";
        }
        
        $tblname="tblsupplier";
        $fields=array("SupplierName","Sex","DOB","POB","JobTitle","CompanyName","Address","Phone","Email","Photo");
        $values=array($suppliername,$sex,$dob,$pob,$jobtitle,$companyname,$address,$phone,$email,$photo);
        $obj->fun_insertdata($tblname,$fields,$values);
        header('location:supplierform.php');
        ob_end_flush(); 

    }

?>
