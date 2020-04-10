<?php
//import class.php
  require_once('inc/class.php');
//instant object
    $obj = new mycodes;
     //Test Add new Button
    if(isset($_REQUEST['btn_addnew'])){
        $modelname = $_REQUEST['txtmodelname'];
        $desc = $_REQUEST['txtdesc'];
        $result = $obj->fun_checkExistingData($modelname,"tblmodel","ModelName");
        if($result){
            echo "$modelname is Exsting";
        }else{
            $tblname = "tblmodel";
            $fields = array("ModelName","Description");
            $values = array($modelname,$desc);
            $obj->fun_insertdata($tblname,$fields,$values);
            header('location:modelform.php');  
       } 
    }

?>