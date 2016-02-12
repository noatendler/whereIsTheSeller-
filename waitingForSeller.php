<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<title>Where is the seller?!</title>

		<link rel="stylesheet" href="includes/style.css">
		<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
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
						<p>עגלת הקניות</p>
						<div class="clear"></div>
					</div>
					<div class="dropDownCartMenuContent">
					<?php
						include ("dbAccess.php");
						if (isset($_GET['size'])) {
							$size1 = $_GET['size'];
							$color1 = $_GET['color'];
							$image = "images/bluePants2.png";
							$sql = "insert into tbl_cart_202(description,size,color,image) values ('Pants','$size1','$color1','$image')";
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
		<script>
			updateCart();
			setTheTimer();
			$('.dropDownCartMenu').slideToggle(300);
			// $('.cartModal').modal({show:true});
			// $('.modal-backdrop').removeClass("modal-backdrop");
		</script>
	</body>
</html>