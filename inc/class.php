<?php
	//create class
	class mycodes{
		//propoties
		var $pro_link,$pro_sql,$pro_query,$pro_count,$pro_arr,$pro_myrow,$pro_result,$pro_target;
		//methoad
		//PHP and Mysql Connection
		function fun_link(){
			$this->pro_link = mysqli_connect("localhost","root","","bd_phone");
			mysqli_set_charset($this->pro_link,"utf8");
			return $this->pro_link;
		}
		//check Existing Username and password
		function fun_checkuserpwd($arg_user,$arg_pwd){
			//create Sql statement
			$this->pro_sql ="SELECT * FROM tblstaff WHERE Username='$arg_user' and Password='$arg_pwd'";
			//sent sql statement to server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			$this->pro_count = mysqli_num_rows($this->pro_query);
			//echo $this->pro_count;
		
			if($this->pro_count == 1){
				return true;
			}else{
				return false;
			}

		}
		//Display Data from Table
		function fun_displaydata($arg_tblname){
			$this->pro_arr = array();
			$this->pro_sql = "select * from $arg_tblname";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			while ($this->pro_myrow = mysqli_fetch_assoc($this->pro_query)){
				array_push($this->pro_arr,$this->pro_myrow);
			}
			return $this->pro_arr;
		}
		//Display Data from Table with Con
		function fun_displaydataCon($arg_tblname,$arg_field,$arg_value){
			$this->pro_arr = array();
			$this->pro_sql = "select * from $arg_tblname Where $arg_field = $arg_value";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			while ($this->pro_myrow = mysqli_fetch_assoc($this->pro_query)){
				array_push($this->pro_arr,$this->pro_myrow);
			}
			return $this->pro_arr;
		}
		 function fun_countproduct($arg_catid){
			$this->pro_sql="SELECT * FROM tblproduct WHERE CategoryID=$arg_catid";
			$this->pro_query=mysqli_query($this->fun_link(),$this->pro_sql);
			$this->pro_count= mysqli_num_rows($this->pro_query);
			return $this->pro_count;
		}
		//Lookup
		function fun_lookup($arg_table,$arg_fieldid,$arg_valueid){
			$this->pro_sql = "select * from $arg_table where $arg_fieldid = $arg_valueid";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			$this->pro_myrow = mysqli_fetch_assoc($this->pro_query);
			return $this->pro_myrow;
		}

		/* count product for update */
		 function fun_countpro($arg_proname,$arg_status){
			$this->pro_sql = "select * from tblproduct where ProductName = '$arg_proname' And Status = '$arg_status' ";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			$this->pro_count = mysqli_num_rows($this->pro_query);
			return $this->pro_count;
		}
		/* count product for update */
		 function fun_countproupdate($arg_proname,$arg_id,$arg_status){
			$this->pro_sql = "select * from tblproduct where ProductName = '$arg_proname' And ProductID = '$arg_id' And Status = '$arg_status' ";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			$this->pro_count = mysqli_num_rows($this->pro_query);
			return $this->pro_count;
		}

		//Count product with two condition
		function fun_countpro2con($arg_table,$arg_fname,$arg_fid,$arg_fnameval,$arg_fidval){
			//Create Sql Statement
			$this->pro_sql = "Select * From $arg_table Where $arg_fname = '$arg_fnameval' And $arg_fid = '$arg_fidval'";
			//Sent Sql Statement to server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			//Count Record
			$this->pro_count = mysqli_num_rows($this->pro_query);
			return $this->pro_count;
		}
		

		//check Existing Username
		function fun_checkExistingData($arg_user,$arg_tblname,$arg_field){
			//create Sql statement
			$this->pro_sql ="SELECT * FROM $arg_tblname WHERE $arg_field = '$arg_user'";
			//sent sql statement to server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			$this->pro_count = mysqli_num_rows($this->pro_query);
			//echo $this->pro_count;
		
			if($this->pro_count == 1){
				return $this->pro_result = true;
			}else{
				return $this->pro_result = false;
			}
			return $this->pro_result;
		}
		function fun_insertdata($arg_tblname,$arg_arrfields,$arg_arrvalues){
			$this->pro_count = count($arg_arrfields);
			$this->pro_sql = "INSERT into $arg_tblname (";
			for($x = 0; $x<$this->pro_count; $x++){
				$this->pro_sql .= $arg_arrfields[$x];
				if($x<$this->pro_count - 1){
					$this->pro_sql .= ",";
				}else{
					$this->pro_sql .= ") VALUES(";
				}
			}
			for($x = 0; $x<$this->pro_count; $x++){
				$this->pro_sql .= "'" .$arg_arrvalues[$x] . "'";
				if($x<$this->pro_count - 1){
					$this->pro_sql .= ",";
				}else{
					$this->pro_sql .= ")";
				}
			}
			mysqli_query($this->fun_link(),$this->pro_sql);
		}
		//function upload image
	  	function f_upload_img($field,$width,$folder){
			if(trim($_FILES[$field]["tmp_name"]) != ""){
				$images = $_FILES[$field]["tmp_name"];
				$new_images = "Thum_".$_FILES[$field]["name"];
				//copy($_FILES["fileUpload"]["tmp_name"],"MyResize/".$_FILES["fileUpload"]["name"]);
				//$width=100; //*** Fix Width & Heigh (Autu caculate) ***//
				$size=GetimageSize($images);
				$height=round($width*$size[1]/$size[0]);
				$images_orig = ImageCreateFromJPEG($images);
				$photoX = ImagesX($images_orig);
				$photoY = ImagesY($images_orig);
				$images_fin = ImageCreateTrueColor($width, $height);
				ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
				ImageJPEG($images_fin,$folder."/".$new_images);
				ImageDestroy($images_orig);
				ImageDestroy($images_fin);
				}
				return $new_images;
			  }
		function fun_deletedata($arg_table,$arg_field,$arg_valueid){
			$this->pro_sql = "Delete from $arg_table where $arg_field = $arg_valueid";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
		}
		//Delete Image
		function fun_deleteimage($arg_imgname){
			$this->pro_target = "images/$arg_imgname";
			if(file_exists($this->pro_target)){
				if($arg_imgname != "default.jpg"){
					unlink($this->pro_target);
				}
			}
		}
		//Check Existing FieldName and Filedid
		function fun_checkData($arg_table,$arg_fname,$arg_fid,$arg_fnameval,$arg_fidval){
			//Create Sql Statement
			$this->pro_sql = "Select * From $arg_table Where $arg_fname = '$arg_fnameval' And $arg_fid <>'$arg_fidval'";
			//Sent Sql Statement to server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			//Count Record
			$this->pro_count = mysqli_num_rows($this->pro_query);
			if($this->pro_count == 1){
				$this->pro_result = true;
			}else{
				$this->pro_result = false;
			}
			return $this->pro_result;
		}
		//Update Statement
		function fun_updatedata($table,$field,$value,$fid,$vid){
			$this->pro_count = count($field);
			$this->pro_sql = "Update $table SET ";
			for($x=0;$x<$this->pro_count;$x++){
				$this->pro_sql .= "$field[$x]='$value[$x]'";
				if ($x <($this->pro_count -1)) {
					$this->pro_sql .= ", ";
				}else{
					$this->pro_sql .= " WHERE $fid=$vid";
				}
			}
			mysqli_query($this->fun_link(),$this->pro_sql);
		}

		function fun_count($arg_tblname,$arg_field,$arg_value){
			$this->pro_sql = "select * from $arg_tblname where $arg_field = '$arg_value'";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			$this->pro_count = mysqli_num_rows($this->pro_query);
			return $this->pro_count;
		}

	}
?>

