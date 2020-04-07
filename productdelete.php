<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
	//Test key
	if(isset($_REQUEST['ProductID'])){
		$key_proid = $_REQUEST['ProductID'];
		//$count_pro = $obj->fun_countpro($key_catid);
		$table = "tblproduct";
        $fields = array("IsDelete");
        $values = array("1");
        $obj->fun_updatedata($table,$fields,$values,"ProductID",$key_proid);
		header('location:productformshow.php');
	}
?>