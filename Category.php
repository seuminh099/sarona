
<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
?>
<!DOCTYPE html>
<head>
	<title>List of Categories</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
			<h1><center>List of Categories</center></h1>
			<a href="addnewcategory.php">Add New Category</a>
		
		<table cellpadding="5px" cellspacing="0" align="center" border="1px">
			<tr>
				<th width="150px">Category Name</th>
				<th width="100px">Photo</th>
				<th width="100px">Description</th>
				<th width="100px"></th>
				<th width="100px"></th>
			</tr>
				<?php
			//Accessing method fun_displaydata
			$Category = $obj->fun_displaydataCon("tblcategory","IsDelete",0);
			foreach ($Category as $record){
				$catid = $record['CategoryID'];
				$categoryname = $record['CategoryName'];
				$photo = $record['Photo'];
				$desc = $record['Description'];
			?>
			<tr>
				<td><?php echo $categoryname; ?></td>
				<td><img src="Image/<?php echo $photo;?>" width="50px"></td>
				<td><?php echo $desc; ?></td>
				<td><a href="category_update?CategoryID=<?php echo $catid;?>">Update</a></td>
				<td><a href="category_delete?CategoryID=<?php echo $catid;?>">Delete</a></td>
			</tr>
			<?php
			}
			?>
		</table>
</body>
</html>