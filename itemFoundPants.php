<!DOCTYPE html>
<html>
	<head>
		<title>where is the seller?!</title>
		<link rel="stylesheet" href="includes/style.css">
		<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
			<main>
				<h1 class="pageHeadline">תיאור פריט</h1>
				<h2 class="pageHeadline"> &check;נמצא הפריט המבוקש</h2>
				<?php
					include("dbAccess.php" );

						$sql = "SELECT * FROM tbl_bigImg_202 where id=6"; //query string
						$result = $connection -> query($sql);
						if ($result -> num_rows > 0) {
						// output data of each row
						
						while($row = $result -> fetch_assoc()){
						echo '<img id="mainPants" src="' . $row['img'] . '"/>';
						}
						}	
					?>
				<!--<img  id="mainPants" src="images/bluePants.png">-->
				<p id="discription1">
					מכנס מחויט כחול כהה
				</p>
				<h4>פריטים נוספים שיכולים לעניין אותך</h4>
				<section class="secTab">
					<?php
						$sql = "SELECT * FROM tbl_smallImg_202"; //query string
						$result = $connection -> query($sql);
						if ($result -> num_rows > 0) {
						// output data of each row
						
						while($row = $result -> fetch_assoc()){
							
							if ($row['id'] == 5){
						echo '<img id="pBlack" onclick="changeImage(this)" src="' . $row['img'] . '"/>';
							}
								if ($row['id'] == 7){
						echo '<img id="pPink" onclick="changeImage(this)" src="' . $row['img'] . '"/>';
							}
									if ($row['id'] == 8){
						echo '<img id="pRed" onclick="changeImage(this)" src="' . $row['img'] . '"/>';
							}
						}
						}
				      mysqli_close($connection);
					?>
				</section>
				<form action="index.php" method="get">
					<label>
						<select class="selectSize" name="size">
							<option value="" default selected>מידה</option>
							<option value="34">34</option>
							<option value="36">36</option>
							<option value="38">38</option>
							<option value="40">40</option>
						</select> </label>
					<label>
						<select class="selectColor" name="color">
							<option value="" default selected>צבע</option>
							<option value="שחור" name="color">שחור</option>
							<option value="כחול כהה" name="color">כחול כהה</option>
							<option value="אדום" name="color">אדום</option>
							<option value="חום" name="color">חום</option>
						</select> </label>
					<label>
						<input type="submit" id="button2" value="סרוק מוצר נוסף" formaction="index.php">
					</label>
					<label>
						<input type="submit" id="button1" value="הזמן מהמוכרת" formaction="waitingForSeller.php">
					</label>
				</form>
				
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
		<div id="lightBoxShadowBackground"></div>
		<script>
		updateCart();
		
		  function changeImage(img) {
		    var newImg = document.getElementById('mainPants');
		    var descript=document.getElementById('discription1');
		    switch (img.id) {
		      case 'pBlack':
		      {
		        newImg.src = "images/blackPantsBig.png";
		        descript.innerHTML="מכנס מחוייט שחור צמוד";
		      } 
		        break;
		      case 'pPink':
		      {
		        newImg.src = "images/pinkPantsBig.png";
		        descript.innerHTML="מכנס מחוייט ורוד מסטיק";
		      }
		        break;
		      case 'pRed':
		      default:
		      {
		   		 newImg.src = "images/redPantsBig.png";
		   		 descript.innerHTML="מכנס מחוייט אדום שני";
		   	  }
		    }
		  }
		</script>
	</body>
</html>