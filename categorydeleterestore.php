<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
	//Test key
	if(isset($_REQUEST['CategoryID'])){
		$key_catid = $_REQUEST['CategoryID'];

		//count product
		$countproduct = $obj->fun_count("tblproduct","CategoryID",$key_catid);
		//ber sern jea in category nus ot mean product oy lub ban
		if($countproduct == 0){

			$row = $obj->fun_lookup("tblcategory","CategoryID",$key_catid);
			$logo = $row['Photo'];
			$table = "tblcategory";
			$fieldid = "CategoryID";

			$countcatewithimg = $obj->fun_count("tblcategory","Photo",$logo);

			if($countcatewithimg == 1){
				$obj->fun_deleteimage($logo);
				$obj->fun_deletedata($table,$fieldid,$key_catid);
			}else{
				//Access to methoad fundeletedata and fundeleteimage
				$obj->fun_deletedata($table,$fieldid,$key_catid);
			}
			header('location:categoryrestoreform.php');

		}else{
			echo "You cannot delete this category";
		}
	}
?>