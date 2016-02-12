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
					      	 	<p>צבע:<span>' . $row['color'] . '</span></p>
								<p>מידה:<span>' . $row['size'] . '</span></p>
								<br>
								<p>
									<a class="dropDownCartMenuArticleHrefs updateBtn" href="#">עדכון</a>|<a class="dropDownCartMenuArticleHrefs removeBtn" href="#">הסרה</a>
								</p>
								<div class="clear"></div>
					      	 </article>
					      	 ';

	}
} else {
	echo "<p>אין פריטים בעגלה</p>";
}
mysqli_close($connection);
?>