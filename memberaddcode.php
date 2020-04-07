<?php
//import class.php
    require_once('inc/class.php');
//instant object
    $obj = new mycodes;
    //test button addnew
    if(isset($_REQUEST['btn_addnew'])){
                    $membertype = $_REQUEST['txtmembertype'];
                    $discount = $_REQUEST['txtdisc'];
                    $result = $obj->fun_checkExistingData($membertype,"tblmember","MemberType");
                    if($result){
                        echo "$membertype is Exsting";
                    }else{
                        $tblname = "tblmember";
                        $fields = array("MemberType","Discount");
                        $values = array($membertype,$discount);
                        $obj->fun_insertdata($tblname,$fields,$values);
                        header('location:memberform.php');
                    }
                }
?> 