<?php
if (isset($_GET['indexToRemove'])) {
	include ("dbAccess.php");
	
	$remInd = mysqli_real_escape_string($connection, $_GET['indexToRemove']);
	$sql1 = "delete from tbl_cart_202 where id=$remInd";
	$insert_row = $connection -> query($sql1);
	if (!$insert_row) {
		die('Error : (' . $connection -> errno . ') ' . $connection -> error);
	}
	
	$sql2 = "SELECT * FROM `tbl_cart_202`";
	$fullTable = $connection -> query($sql2);
	if (!$fullTable) {
		die('Error : (' . $connection -> errno . ') ' . $connection -> error);
	}
	$sql3 = "truncate table tbl_cart_202";
	$result = $connection -> query($sql3);
	if (!$result) {
		die('Error : (' . $connection -> errno . ') ' . $connection -> error);
	}
	if ($fullTable -> num_rows > 0) {
		while ($row = $fullTable -> fetch_assoc()) {
			$description = $row['description'];
			$size = $row['size'];
			$color = $row['color'];
			$image = $row['image'];
			$sql4 = "insert into tbl_cart_202(description,size,color,image) values ('$description','$size','$color','$image')";
			$connection -> query($sql4);
		}
	}
	
	mysqli_close($connection);
} else {
	//some alternative!
}
?>