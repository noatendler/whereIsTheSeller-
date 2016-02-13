<!DOCTYPE html>
<html>
	<head>
		<title>where is the seller?!</title>
		<link rel="stylesheet" href="includes/style.css">
		<script src="includes/scripts.js"></script>
		<meta charset="UTF-8">
	</head>
	<body>
		<div id="wrapper">
			<header>
				<a href="index.php" id="logo"> </a>
				<p class="number">
					0
				</p>
				<img  class="cart" src="images/tabletShoppingCart.png" title="עגלה" alt="עגלה">
			</header>
			<main>
				<h1 class="pageHeadline">תיאור פריט</h1>
				<h2 class="pageHeadline"> &check;נמצא הפריט המבוקש</h2>
				<?php
					include("dbAccess.php" );

						$sql = "SELECT * FROM tbl_bigImg_202 where id=12"; //query string
						$result = $connection -> query($sql);
						if ($result -> num_rows > 0) {
						// output data of each row
						
						while($row = $result -> fetch_assoc()){
						echo '<img id="blazer" src="' . $row['img'] . '"/>';
						}
						}	
				?>
				<p id="discription2">
					חולצה מכופרת תכלת
				</p>
				<h4>פריטים נוספים שיכולים לעניין אותך</h4>
				<section class="secTab">
					<?php
						$sql = "SELECT * FROM tbl_smallImg_202"; //query string
						$result = $connection -> query($sql);
						if ($result -> num_rows > 0) {
						// output data of each row
						
						while($row = $result -> fetch_assoc()){
							
							if ($row['id'] == 9){
						echo '<img id="eBlack" onclick="changeImage(this)" src="' . $row['img'] . '"/>';
							}
								if ($row['id'] == 10){
						echo '<img id="eBlue" onclick="changeImage(this)" src="' . $row['img'] . '"/>';
							}
									if ($row['id'] == 11){
						echo '<img id="eRed" onclick="changeImage(this)" src="' . $row['img'] . '"/>';
							}
						}
						}
					mysqli_close($connection);
					?>
				</section>
				<form action="updateCart.php" method="get">
					<label>
						<select class="selectSize">
							<option value="" default selected>מידה</option>
							<option value="s" name="size">S</option>
							<option value="m" name="size">M</option>
							<option value="l" name="size">L</option>
							<option value="xl" name="size">XL</option>
						</select> </label>
					<label>
						<select class="selectColor">
							<option value="" default selected>צבע</option>
							<option value="black" name="color">שחור</option>
							<option value="navy" name="color">כחול כהה</option>
							<option value="red" name="color">אדום</option>
							<option value="brown" name="color">חום</option>
						</select> </label>
					<label>
						<input type="submit" id="button2" value="סרוק מוצר נוסף" formaction="index.php">
					</label>
					<label>
						<input type="submit" id="button1" value="הזמן מהמוכרת" formaction="waitingForSeller.html">
					</label>
				</form>
			</main>
			<div class="clear"></div>
			<footer>
				<nav>
					<ul>
						<li>
							<a href="index.php" class="barcodeScan"> <img  src="images/barcode7.png" title="ברקוד" alt="ברקוד">
							<p>
								סריקת ברקוד
							</p></a>
						</li>
						<li>
							<a href="chooseCamera.html" class="barcodeScan"> <img src="images/camera1.png" title="מצלמה" alt="מצלמה">
							<p id="video">
								שיחת וידאו
							</p></a>
						</li>
						<li>
							<a href="#" class="barcodeScan"> <img src="images/bell.png" title="פעמון" alt="פעמון">
							<p>
								קרא למוכרת
							</p></a>
						</li>
					</ul>
				</nav>
			</footer>
			<script>
		  function changeImage(img) {
		    var newImg = document.getElementById('blazer');
		    var descript=document.getElementById('discription2');
		    switch (img.id) {
		      case 'eBlack':
		      {
		        newImg.src = "images/blackShirtBig.png";
		        descript.innerHTML="חולצה מכופתרת שחורה";
		      } 
		        break;
		      case 'eBlue':
		      {
		        newImg.src = "images/blueShirtBig.png";
		        descript.innerHTML="חולצה מכופתרת כחולה";
		      }
		        break;
		      case 'pRed':
		      default:
		      {
		   		 newImg.src = "images/redShirtBig.png";
		   		 descript.innerHTML="  חולצה משובצת אדומה";
		   	  }
		    }
		  }
			</script>
		</div>
	</body>
</html>