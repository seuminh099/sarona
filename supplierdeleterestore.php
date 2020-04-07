<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
	//Test key
	if(isset($_REQUEST['SupplierID'])){
		$key_supid = $_REQUEST['SupplierID'];


			$row = $obj->fun_lookup("tblsupplier","SupplierID",$key_supid);
			$logo = $row['Photo'];
			$table = "tblsupplier";
			$fieldid = "SupplierID";

			$countcatewithimg = $obj->fun_count("tblsupplier","Photo",$logo);

			if($countcatewithimg == 1){
				$obj->fun_deleteimage($logo);
				$obj->fun_deletedata($table,$fieldid,$key_supid);
			}else{
				//Access to methoad fundeletedata and fundeleteimage
				$obj->fun_deletedata($table,$fieldid,$key_supid);
			}
			header('location:supplierform.php');
	}
?>