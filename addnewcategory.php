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
	<title>Add New Category</title>
    <link rel="stylesheet" type="text/css" href="inputstyle.css">
</head>

<body>
		<center>
			<h2>Add New Category</h2>
		</center>
                <table cellpadding="10" cellspacing="0" align="center">
                        <form action="" method="post" enctype="multipart/form-data">
                        <tr>
                                <td class="label">Category Name :</td>
                                <td><input type="text" name="txtcatname" placeholder="Category Name" /></td>
                        </tr>
                        <tr>
                                <td class="label">Photo :</td>
                                <td><input type="file" name="txtphoto"/></td>
                        </tr>
                        <tr>
                                <td class="label">Description :</td>
                                <td><input type="text" name="txtdesc" placeholder="Description" /></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td class="btn">
                                        <input type="submit" value="Add New" name="btn_addnew" />
                                        <input type="reset" value="Reset" name="btn_reset" />
                                </td>
                        </tr>              
        </form>
                </table>
        
        <?php
        
                if(isset($_REQUEST['btn_addnew'])){
                    $catname = $_REQUEST['txtcatname'];
                    $desc = $_REQUEST['txtdesc'];
                    if($_FILES['txtphoto']['tmp_name']){
                        $Photo = $obj->f_upload_img("txtphoto",100,"image");
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
                        header('location:category.php');
                    }
                }
        ?>
        

</body>
</html>