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
	<title>Category Update</title>
        <link rel="stylesheet" type="text/css" href="inputstyle.css">
</head>

<body>
		<center>
            <h3> Update Category</h3>
		</center>
                <table cellpadding="10" cellspacing="0" align="center">
                    <?php
                        //TestKey
                        if(isset($_REQUEST['CategoryID'])){
                            $key_catid = $_REQUEST['CategoryID'];
                            $row = $obj->fun_lookup("tblcategory","CategoryID",$key_catid);
                            $catname = $row['CategoryName'];
                            $desc = $row['Description'];
                            $photo = $row['Photo'];
                    ?>
                        <form action="" enctype="multipart/form-data" method="post">
                        <tr>
                                <td class="label">CategoryID :</td>
                                <td><input type="text" name="txt_CatID" placeholder="Category ID" readonly value="<?php echo $key_catid; ?>" />
                                </td>
                        </tr>
                        <tr>
                                <td class="label">CategoryName :</td>
                                <td><input type="text" name="txt_catname" placeholder="Category Name" value="<?php echo $catname; ?>" /></td>
                        </tr>
                         <tr>
                                <td class="label">Description :</td>
                                <td><input type="text" name="txt_desc" placeholder="Description" value="<?php echo $desc; ?>" /></td>
                        </tr>
                        <tr>
                                <td class="label">Photo :</td>
                                <td>
                                    <input type="file" name="txtphoto"/>
                                    <input type="hidden" name="txtoldphoto" value="<?php echo($photo); ?>">
                                </td>
                        </tr>
                        <tr>    
                                <td></td>
                                <td><img src="Image/<?php echo $photo;?>" height="100px"</td>

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
            
        ?>
         <?php
        //import class.php
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
</html>