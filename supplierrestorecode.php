
<?php
//import class.php
	require_once('inc/class.php');
//instant object
    $obj = new mycodes;

    //test button
    if(isset($_REQUEST['SupplierID'])){
            $subid = $_REQUEST['SupplierID'];
            
            $tblname = "tblsupplier";
           	$fields = array("IsDelete");
            $values = array("0");
            $obj->fun_updatedata($tblname,$fields,$values,"SupplierID",$subid);
            header('location:supplierform.php');
            ob_end_flush(); 
    }
?>
