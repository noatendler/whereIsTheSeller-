<?php


$sql = "SELECT * FROM tbl_cart_202";
$result = $connection -> query($sql);
if ($result -> num_rows > 0) {
	// output data of each row
	while ($row = $result -> fetch_assoc()) {
		echo '
			<article class="dropDownCartMenuContentArticle">
				<div class="dropDownCartMenuArticleImgContainer">
					<img class="dropDownCartMenuArticleImg" 
					   src="' . $row['image'] . '"/>
				</div>
				<h5>' . $row['description'] . '</h5>
				<p>צבע:<span class="cartMenuItemColor">' . $row['color'] . '</span></p>
				<p>מידה:<span class="cartMenuItemSize">' . $row['size'] . '</span></p>
				<br>
				<p>';
				if (strpos($row['description'], 'בלייזר') !== false) {
    				echo '<a class="dropDownCartMenuArticleHrefs blazerCartDialog updateBtn" href="#">עדכון</a>|<a class="dropDownCartMenuArticleHrefs blazerCartDialog removeBtn" href="#">הסרה</a>';
				}
				if (strpos($row['description'], 'מכנס') !== false){
					echo '<a class="dropDownCartMenuArticleHrefs pantsCartDialog updateBtn" href="#">עדכון</a>|<a class="dropDownCartMenuArticleHrefs pantsCartDialog removeBtn" href="#">הסרה</a>';
				}
				if (strpos($row['description'], 'חולצה') !== false){
					echo '<a class="dropDownCartMenuArticleHrefs blazerCartDialog updateBtn" href="#">עדכון</a>|<a class="dropDownCartMenuArticleHrefs pantsCartDialog removeBtn" href="#">הסרה</a>';
				}
				echo '</p>
				<div class="clear"></div>
			</article>
		';

	}
} else {
	echo "<p>אין פריטים בעגלה</p>";
}
mysqli_close($connection);
?>