<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
	//Test key
	if(isset($_REQUEST['ProductID'])){
		$key_proid = $_REQUEST['ProductID'];

		//count product in tblpurchasedetail
		$countpurchase = $obj->fun_count("tblpurchasedetail","ProductID",$key_proid);
		//count product in tblsaledetail
		$countsale = $obj->fun_count("tblsaledetail","ProductID",$key_proid);
		$result = $obj->fun_countpro2con("tblproduct","Qty","ProductID","1",$key_proid);
		//ber sern jea in $countpurchase == 0 and $countsale == 0 ban ney tha product ng ot torn ban louk ban tinh ey te jing delete ban
		if(($countpurchase == 0 ) && ($countsale == 0)){

			if($result == 1) {
				echo "Amout product > 0";
			}else{

				$row = $obj->fun_lookup("tblproduct","ProductID",$key_proid);
				$logo = $row['Photo'];
				$table = "tblproduct";
				$fieldid = "ProductID";
				
				$countcatewithimg = $obj->fun_count("tblcategory","Photo",$logo);

				if($countcatewithimg == 1){
				//Access to methoad fundeletedata and fundeleteimage
				$obj->fun_deleteimage($logo);
				$obj->fun_deletedata($table,$fieldid,$key_proid);

				}else{
					$obj->fun_deletedata($table,$fieldid,$key_proid);				
				}
				//header('location:productformshow.php');
			}
		}else{
			echo "You cannot delete this product";
		}
	}
?>