<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
	//Test key
	if(isset($_REQUEST['CategoryID'])){
		$key_catid = $_REQUEST['CategoryID'];
		$count_pro = $obj->fun_countpro($key_catid);
		if ($count_pro == 0){
			$row = $obj->fun_lookup("tblcategory","CategoryID",$key_catid);
		$table = "tblcategory";
		//Access to methoad fundeletedata and fundeleteimage
        $fields = array("IsDelete");
        $values = array("1");
        $obj->fun_updatedata($table,$fields,$values,"CategoryID",$key_catid);
		header('location:categoryform.php');
	}else{
		echo "You cannot delete this category";
	}
	}
?>