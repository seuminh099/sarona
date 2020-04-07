<?php 
    require_once('inc/class.php');
//instant object
    $obj = new mycodes;

                if(isset($_REQUEST['btn_addnew'])){
                    $catname = $_REQUEST['txtcatname'];
                    $desc = $_REQUEST['txtdesc'];
                    if($_FILES['txtphoto']['tmp_name']){
                        $Photo = $obj->f_upload_img("txtphoto",100,"images");
                    }else{
                        $Photo = "default.jpg";
                    }
                    $result = $obj->fun_checkExistingData($catname,"tblcategory","CategoryName");
                    if($result){
                        echo "$catname is Exsting";
                    }else{
                        $tblname = "tblcategory";
                        $fields = array("CategoryName","Photo","Description");
                        $values = array($catname,$Photo,$desc);
                        $obj->fun_insertdata($tblname,$fields,$values);
                        header('location:categoryform.php');
                    }
                }

        ?>
