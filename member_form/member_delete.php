<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
	//Test key
	if(isset($_REQUEST['MemberID'])){
		$key_memberid = $_REQUEST['MemberID'];
		$count_pro = $obj->fun_countpro($key_memberid);
		if ($count_pro == 0){
			$row = $obj->fun_lookup("tblmember","MemberID",$key_memberid);
		$table = "tblmember";
		//Access to methoad fundeletedata and fundeleteimage
        $fields = array("IsDelete");
        $values = array("1");
        $obj->fun_updatedata($table,$fields,$values,"MemberID",$key_memberid);
		header('location:memberform.php');
	}else{
		echo "You cannot delete this member";
	}
	}
?>