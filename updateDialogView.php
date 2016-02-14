<?php
if (isset($_GET['dialogItemName'])) {
	include ("dbAccess.php");
	
	$itemName = mysqli_real_escape_string($connection, $_GET['dialogItemName']);
	
	if (strpos($itemName, 'בלייזר') !== false) {
    	$sql = "SELECT * FROM `tbl_bigImg_202` where id=1";
	}
	if (strpos($itemName, 'מכנס') !== false) {
    	$sql = "SELECT * FROM `tbl_bigImg_202` where id=6";
	}
	if (strpos($itemName, 'חולצה') !== false) {
    	$sql = "SELECT * FROM `tbl_bigImg_202` where id=10";
	}
	$itemImage = $connection -> query($sql);
	if (!$itemImage) {
		die('Error : (' . $connection -> errno . ') ' . $connection -> error);
	}
	$row = $itemImage -> fetch_assoc();
	
	echo '<img src="' . $row['img'] . '"/>';
	
}

mysqli_close($connection);
?>