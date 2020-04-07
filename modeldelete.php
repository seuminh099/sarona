<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
	//Test key
	if(isset($_REQUEST['ModelID'])){
		$key_moid = $_REQUEST['ModelID'];
		$countproduct = $obj->fun_count("tblproduct","ModelID",$key_moid);
		if ($countproduct == 0){
			$row = $obj->fun_lookup("tblmodel","ModelID",$key_moid);
			$table = "tblmodel";
			//Access to methoad fundeletedata and fundeleteimage
	        $fields = array("IsDelete");
	        $values = array("1");
	        $obj->fun_updatedata($table,$fields,$values,"ModelID",$key_moid);
			header('location:modelform.php');
		}else{
			echo "You cannot delete this model becouse have product";
			}	
	}
?>