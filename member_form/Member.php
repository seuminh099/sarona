
<?php
//import class.php
	require_once('inc/class.php');
//instant object
	$obj = new mycodes;
?>
<!DOCTYPE html>
<head>
	<title>Member</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
			<h1><center>Member Type</center></h1>
			<a href="addnewmember.php">Add New Member</a>
		
		<table cellpadding="5px" cellspacing="0" align="center" border="1px">
			<tr>
				<th width="150px">Membertype</th>
				<th width="100px">Discount</th>
			</tr>
				<?php
			//Accessing method fun_displaydata
			$Member = $obj->fun_displaydataCon("tblmember","IsDelete",0);
			foreach ($Member as $record){
				$memberid = $record['MemberID'];
				$membertype = $record['MemberType'];
				$discount = $record['Discount'];
			?>
			<tr>
				<td><?php echo $membertype; ?></td>
				<td><?php echo $discount;?></td>
				<td><a href="member_update?MemberID=<?php echo $memberid;?>">Update</a></td>
				<td><a href="member_delete?MemberID=<?php echo $memberid;?>">Delete</a></td>
			</tr>
			<?php
			}
			?>
		</table>
</body>
</html>