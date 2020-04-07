
         <?php
            require_once('inc/class.php');
            //instant object
                $obj = new mycodes;

        //Test Update Button
        if(isset($_REQUEST['btn_update'])){
            $catid = strtolower(trim($_REQUEST['txt_CatID']));
            $catname = strtolower(trim($_REQUEST['txt_catname']));
            $desc = $_REQUEST['txt_desc'];
            $oldphoto = $_REQUEST['txtoldphoto'];
             if($_FILES['txtphoto']['tmp_name']){
                $catphoto = $obj->f_upload_img('txtphoto',100,'image');
            }else{
                $catphoto = $oldphoto;
            }
            $result = $obj->fun_checkData("tblcategory","CategoryName","CategoryID",$catname,$catid);
             if($result){
                echo "<h2>Cannot Update</h2>";
            }else{
                $tblname = "tblcategory";
                $fields = array("CategoryName","Photo","Description");
                $values = array($catname,$catphoto,$desc);
                $obj->fun_updatedata($tblname,$fields,$values,"CategoryID",$catid);
                header('location:categoryform.php');  
           } 
        }
        ?>
