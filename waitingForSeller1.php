<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<title>Where is the seller?!</title>
		<link rel="stylesheet" href="includes/style.css">
		<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="includes/scripts.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<a href="index.php" id="logo"> </a>
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
							$image = "images/blueShirt1.png";
							$sql = "insert into tbl_cart_202(description,size,color,itemkind,image) values ('חולצה מכופתרת כחולה','$size1','$color1','blueShirt','$image')";
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
			</header>
			<main id="clockMain">
				<h1 class="pageHeadline">זמן הגעה של המוכרת</h1>
				<p id="tempSetTimer">
					<b>הזמן שעבר מביצוע ההזמנה:</b>
				</p>
				<div class="clear"></div>
				<section class="timerAndCaption timerAndCaptionExt">
					
					<section class="timerOuterContainer">
						<p id="timerScreen" class="timerScreenExt">
							00:00
						</p>
					</section>
				</section>
				<div class="clear"></div>
				
				<section id="cartDialog">
					<div class="cartDialogHeader">
						<button id="cartDialogCloseButton">
							&times;
						</button>
					</div>
					<div id="cartDialogImage"></div>
					<h2 id="cartDialogHealine">הסר מוצר</h2>
					<br>
					<p class="removeFromCart cartDialogItemName">שםבגד</p>
					<p class="removeFromCart cartDialogItemColor">צבע:</p>
					<p class="removeFromCart cartDialogItemSize">מידה:</p>
					<section>
						<select class="cartDialogBlazerContent updateCart" name="size" id="cartDialogSelectBlazerSize">
							<option value="" default selected>מידה</option>
							<option value="s" >S</option>
							<option value="m">M</option>
							<option value="l" >L</option>
							<option value="xl">XL</option>
						</select>
						<select class="cartDialogBlazerContent updateCart" name="color" id="cartDialogSelectBlazerColor">
							<option value="" default selected>צבע</option>
							<option value="black" name="color">שחור</option>
							<option value="navy" name="color">כחול כהה</option>
							<option value="red" name="color">אדום</option>
							<option value="brown" name="color">חום</option>
						</select>
						<select class="cartDialogPantsContent updateCart" name="size" id="cartDialogSelectPantsSize">
							<option value="" default selected>מידה</option>
							<option value="34">34</option>
							<option value="36">36</option>
							<option value="38">38</option>
							<option value="40">40</option>
						</select>
						<select class="cartDialogPantsContent updateCart" name="color" id="cartDialogSelectPantsColor">
							<option value="" default selected>צבע</option>
							<option value="black" name="color">שחור</option>
							<option value="navy" name="color">כחול כהה</option>
							<option value="red" name="color">אדום</option>
							<option value="brown" name="color">חום</option>
						</select>
					</section>
					<button id="cartDialogRemoveButton">מחק מוצר</button>
					<button id="cartDialogBlazerUpdateButton">עדכן</button>
					<button id="cartDialogPantsUpdateButton">עדכן</button>
					<button id="cartDialogCancelButton">ביטול</button>
					<div class="clear"></div>
				</section>
			</main>
			<div class="clear"></div>
			<footer>
				<nav>
					<ul class="footerNavText">
						<li>
							<a href="index.php" id="barcodeLi"> <img  src="images/barcode7.png" class="imgExt" title="ברקוד" alt="ברקוד">
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
							<a href="#" id="bellLi"> <img src="images/bell.png" class="imgExt" title="פעמון" alt="פעמון">
							<p class="titleIcon">
								קרא למוכרת
							</p></a>
						</li>
					</ul>
				</nav>
			</footer>
		</div>
		<div id="lightBoxShadowBackground"></div>
		<script>
			updateCart();
			setTheTimer();
			$('.dropDownCartMenu').slideToggle(300);
		</script>
	</body>
</html>