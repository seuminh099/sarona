<?php  
	// import clsass 
	require_once('class.php');
	//instance code
	$obj= new mycodes;
	//test session
	if (!isset($_SESSION['Username']) || !isset($_SESSION['Password'])) {
		//Redirect Page
		header('location:../loginform.php');
	}else{
		$username=$_SESSION['Username'];
		$password=$_SESSION['Password'];
		$result=$obj->fun_checkuserpwd($username,$password);
		if (!$result) {
			//Redirect Page
			header('location:../loginform.php');
		}
	}
?>