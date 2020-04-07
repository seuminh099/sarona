<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
	//Test key
	if(isset($_REQUEST['ModelID'])){
		$key_modelid = $_REQUEST['ModelID'];
		//count product
		$countproduct = $obj->fun_count("tblproduct","ModelID",$key_modelid);
		//ber sern jea in category nus ot mean product oy lub ban
		if($countproduct == 0){
			$row = $obj->fun_lookup("tblmodel","ModelID",$key_modelid);
			$table = "tblmodel";
			$fieldid = "ModelID";
				$obj->fun_deletedata($table,$fieldid,$key_modelid);
			header('location:modelform.php');
		}else{
			echo "You cannot delete this ";
		}
	}
?>
