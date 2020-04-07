<?php
	//import Class
	require_once('inc/class.php');
	//instance Object
	$obj = new mycodes;

	//test key
	if (isset($_REQUEST['ModelID'])) {
		$modelid = $_REQUEST['ModelID'];
			$table = "tblmodel";
			$fields = array("IsDelete");
			$values = array("0");
			$obj->fun_updatedata($table,$fields,$values,"ModelID",$modelid);
			header('location:modelform.php'); 	 
	}
