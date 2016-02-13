<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<title>where is the seller?!</title>
		
		<link rel="stylesheet" href="includes/style.css">
		<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="includes/scripts.js"></script>
	</head>
	<body>
			<header >
				<a href="#" id="logo"></a>
				<p class="number numberExt">
					0
				</p>
				<img  class="cart" src="images/tabletShoppingCart.png" title="עגלה" alt="עגלה">
				<div class="dropDownCartMenu dropDownCartMenuShadowWrapper">
					<div class="dropDownCartMenuHeader">
						<button id="topDropDownCartMenuButton">
							&#10006;
						</button>
						<div class="clear"></div>
					</div>
					<div class="dropDownCartMenuContent">
						<?php
						include ("dbAccess.php");
						
						if (isset($_GET['size'])) {
							$size1 = $_GET['size'];
							$color1 = $_GET['color'];
							$image = "images/blackBlazer2.png";
							$sql = "insert into tbl_cart_202(description,size,color,image) values ('בלייזר 763','$size1','$color1','$image')";
							$insert_row = $connection -> query($sql);
							if (!$insert_row) {
								die('Error : (' . $connection -> errno . ') ' . $connection -> error);
							}
						}
						include("buildCartView.php")
						?>
					</div>
					<div class="dropDownCartMenuFooter">
						<button class="bottomCloseButton">
							סגור
						</button>
						<div class="clear"></div>				
					</div>						
				</div>
		<img  class="clock1" src="images/clock1.png" title="שעון" alt="שעון">
		<nav class="desktopNav">
			<ul class="MenuDesktop">
				<li><a href="work1.php" class="MenuDesktopBorder">עובדים</a></li>
				<li><a href="statstic.html" class="MenuDesktopBorder">סטטיסטיקה</a></li>
				<li><a href="inventory.html" class="MenuDesktopNoBorder">מלאי</a></li>
			</ul>
		</nav>
			</header>
			
			<main>
				<h1 class="pageHeadline">סריקת מוצר</h1>
				<img src="images/mainBarcode.jpg" title="ברקוד" alt="ברקוד" id="mainBarcode">
				<a href="itemFoundBlazer.html" id="leftLink"></a>
				<a href="itemFoundPants.html" id="rightLink"></a>			
				<div class="clear"></div>
				
				<section id="cartDialog">
					<img id="cartDialogImage" src="">
					<h1>הסר מוצר</h1>
					<br>
					<p>שםבגד</p>
					<p>צבעבגד</p>
					<p>מידהבגד</p>
					<select name="size" id="cartDialogSelectBlazerSize">
						<option value="" default selected>מידה</option>
						<option value="s" >S</option>
						<option value="m">M</option>
						<option value="l" >L</option>
						<option value="xl">XL</option>
					</select>
					<button id="cartDialogRemove">מחק מוצר</button>
					<button id="cartDialogCancel">ביטול</button>
					<div class="clear"></div>
				</section>
				
			<h1 class="headlineDesk">דף הבית</h1>
			<div class="clear"> </div>
			<a href="work1.php">
			<section class="secHomePage" id="workers">
				<img class="picDesktop" src="images/work2.png" title="עובדים" alt="עובדים">
				<p class="descriptionDesk">עובדים</p>
			</section>
			</a>
			<a href="statstic.html">
			<section class="secHomePage" id="statistic">
				<img class="picDesktop" src="images/statisticImg.png" title="סטטיסטיקה" alt="סטטיסטיקה">
				<p class="descriptionDesk">סטטיסטיקה</p>
			</section>
			</a>
			<a href="inventory.html">
			<section class="secHomePage" id="inventory">
				<img class="picDesktop" src="images/clothing.png" title="מלאי" alt="מלאי">
				<p class="descriptionDesk"> מלאי</p>
			</section>
			<div class="clear"></div>
			</a>					
			</main>
			
			<div class="clear"></div>
			<footer>
				<nav>
					<ul class="footerNavText">
						<li>
							<a href="#" id="barcodeLi"> <img  src="images/barcode7.png" class="imgExt" title="ברקוד" alt="ברקוד">
							<p class="titleIcon">
								סריקת ברקוד
							</p></a>
						</li>
						<li>
							<a href="chooseCamera.html" id="cameraLi"> <img src="images/camera1.png" class="imgExt" title="מצלמה" alt="מצלמה">
							<p id="video" class="titleIcon">
								שיחת וידאו
							</p></a>
						</li>
						<li>
							<a href="#" class="barcodeScan" id="bellLi"> <img src="images/bell.png" class="imgExt" title="פעמון" alt="פעמון">
							<p class="titleIcon">
								קרא למוכרת
							</p></a>
						</li>
					</ul>
				</nav>
			</footer>
			<div id="lightBoxShadowBackground"></div>
		<script>
			updateCart();
		</script>
		
	</body>
</html>