<?php
//import class.php
    require_once('inc/class.php');
//instant object
    $obj = new mycodes;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Member Update</title>
        <link rel="stylesheet" type="text/css" href="inputstyle.css">
</head>

<body>
		<center>
            <h3>Update Member</h3>
		</center>
                <table cellpadding="10" cellspacing="0" align="center">
                    <?php
                        //TestKey
                        if(isset($_REQUEST['MemberID'])){
                            $key_memberid = $_REQUEST['MemberID'];
                            $row = $obj->fun_lookup("tblmember","MemberID",$key_memberid);
                            $membertype = $row['MemberType'];
                            $discount = $row['Discount'];
                    ?>
                        <form action="" enctype="multipart/form-data" method="post">
                        <tr>
                                <td class="label">MemberID :</td>
                                <td><input type="text" name="txt_MemberID" placeholder="Member ID" readonly value="<?php echo $key_memberid; ?>" />
                                </td>
                        </tr>
                        <tr>
                                <td class="label">MemberType :</td>
                                <td><input type="text" name="txt_Membertype" placeholder="Member Type" value="<?php echo $membertype; ?>" /></td>
                        </tr>
                         <tr>
                                <td class="label">Discount :</td>
                                <td><input type="text" name="txt_discount" placeholder="Discount" value="<?php echo $discount; ?>" /></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td class="btn">
                                        <input type="submit" value="Update" name="btn_update" />
                                        <input type="reset" value="Reset" name="btn_reset" />
                                        
                                </td>
                        </tr>              
        </form>
                    <?php
                        }
                    ?>
                </table>
            
       
         <?php
        //import class.php
        require_once('inc/class.php');
        //instant object
        $obj = new mycodes;

        //Test Update Button
        if(isset($_REQUEST['btn_update'])){
            $memberid = strtolower(trim($_REQUEST['txt_MemberID']));
            $membertype = strtolower(trim($_REQUEST['txt_Membertype']));
            $discount = $_REQUEST['txt_discount'];
            $result = $obj->fun_checkData("tblmember","MemberType","MemberID",$membertype,$memberid);
             if($result){
                echo "<h2>Cannot Update</h2>";
            }else{
                $tblname = "tblmember";
                $fields = array("MemberType","Discount");
                $values = array($membertype,$discount);
                $obj->fun_updatedata($tblname,$fields,$values,"MemberID",$memberid);
                header('location:Member.php');  
           } 
        }
        ?>
</html>