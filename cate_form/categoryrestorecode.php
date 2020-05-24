<?php
//import class.php
	require_once('../inc/class.php');
//instant object
	$obj = new mycodes;
	//Test key
	if(isset($_REQUEST['CategoryID'])){
		$key_catid = $_REQUEST['CategoryID'];
		//$count_pro = $obj->fun_countpro($key_catid);
		$table = "tbl_category";
        $fields = array("IsDelete");
        $values = array("0");
        $obj->fun_updatedata($table,$fields,$values,"CategoryID",$key_catid);
		header('location:categoryform.php');
	}
?>