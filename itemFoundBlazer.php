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
							$sql = "SELECT * FROM tbl_bigImg_202 where id=1"; //query string
							$result = $connection -> query($sql);
							if ($result -> num_rows > 0) {
							// output data of each row
							
							while($row = $result -> fetch_assoc()){
							echo '<img id="blazer" src="' . $row['img'] . '"/>';
							}
							}	
					?>
				<p id="discription">
					בלייזר שחור עם שרוולים צרים
				</p>
				<h4>פריטים נוספים שיכולים לעניין אותך</h4>
				<section class="secTab">
					<?php
						$sql = "SELECT * FROM tbl_smallImg_202"; //query string
						$result = $connection -> query($sql);
						if ($result -> num_rows > 0) {
						// output data of each row
						
						while($row = $result -> fetch_assoc()){
							
							if ($row['id'] == 2){
						echo '<img id="bBlue" onclick="changeImage(this)" src="' . $row['img'] . '"/>';
							}
								if ($row['id'] == 3){
						echo '<img id="bPink" onclick="changeImage(this)" src="' . $row['img'] . '"/>';
							}
									if ($row['id'] == 4){
						echo '<img id="bYellow" onclick="changeImage(this)" src="' . $row['img'] . '"/>';
							}
						}
						}
					mysqli_close($connection);
					?>
				</section>
				
				<form action="updateCart.php" method="get">
					<label>
						<select class="selectSize" name="size">
							<option value="" default selected>מידה</option>
							<option value="s" >S</option>
							<option value="m">M</option>
							<option value="l" >L</option>
							<option value="xl">XL</option>
						</select> </label>
					<label>
						<select class="selectColor" name="color">
							<option value="" default selected>צבע</option>
							<option value="black" name="color">שחור</option>
							<option value="navy" name="color">כחול כהה</option>
							<option value="red" name="color">אדום</option>
							<option value="brown" name="color">חום</option>
						</select> </label>
					
						<input type="submit" id="button2" value="סרוק מוצר נוסף" formaction="index.php">
						<input type="submit" id="button1" value="הזמן מהמוכרת" formaction="updateCart.php">
					
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
		</div>
				<script>
		  function changeImage(img) {
		    var newImg = document.getElementById('blazer');
		    var descript=document.getElementById('discription');
		    switch (img.id) {
		      case 'bBlue':
		      {
		        newImg.src = "images/blazerBlueBig.png";
		        descript.innerHTML="בלייזר כחול עם שרוולים צרים";
		      } 
		        break;
		      case 'bPink':
		      {
		        newImg.src = "images/blazerPinkBig.png";
		        descript.innerHTML="בלייזר צמוד ורוד שרוולים צרים";
		      }
		        break;
		      case 'bYellow':
		      default:
		      {
		   		 newImg.src = "images/blazerYellowBig.png";
		   		 descript.innerHTML="בלייזר  שמש צהוב שרוולים צרים";
		   	  }
		    }
		  }
		</script>
	</body>
</html>