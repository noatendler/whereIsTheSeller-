<?php
if (isset($_GET['itemKind'])) {
	include ("dbAccess.php");
	$itemKind = mysqli_real_escape_string($connection, $_GET['itemKind']);
	$itemIndex = mysqli_real_escape_string($connection, $_GET['indexToRemove']);
	$itemSize = mysqli_real_escape_string($connection, $_GET['size']);
	$itemColor = mysqli_real_escape_string($connection, $_GET['color']);
	
		$sql = "UPDATE tbl_cart_202 SET size='$itemSize', color='$itemColor' WHERE id=$itemIndex";
		$insert_row = $connection -> query($sql);
		if (!$insert_row) {
			die('Error : (' . $connection -> errno . ') ' . $connection -> error);
		}
	mysqli_close($connection);
}
?>