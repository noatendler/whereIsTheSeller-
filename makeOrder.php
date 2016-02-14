<!DOCTYPE html>
<html>
	<head>
		<title>ביצוע הזמנה</title>
		<link rel="stylesheet" href="includes/style.css">
		<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<meta charset="UTF-8">
	</head>
	<body>
	<header>
		<a href="index.php" id="logo"> </a>
		<img  class="clock1" src="images/clock1.png" title="שעון" alt="שעון">
		<nav class="desktopNav">
			<ul class="MenuDesktop">
				<li><a href="work.html" class="MenuDesktopBorder">עובדים</a></li>
				<li><a href="statstic.html" class="MenuDesktopBorder">סטטיסטיקה</a></li>
				<li><a href="inventory.html" class="MenuDesktopNoBorder current">מלאי</a></li>
			</ul>
		</nav>
	</header>
	<div class="clear"></div>
<?php
				//create a mySQL DB connection:
				$dbhost = "166.62.8.11";
				$dbuser = "auxstudDB5";
				$dbpass = "auxstud5DB1!";
				$dbname = "auxstudDB5";
				$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				 //testing connection success
				 if(mysqli_connect_errno()) {
				 die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
				 );
				 }
				$size1 = $_GET['size'];
				$quantity1= $_GET['quantity'];
				$connection->query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'"); 
				for($x=0; $x<sizeof($size1); $x++)
				{
											
				$sql = "INSERT INTO tbl_order_202 VALUES('$size1[$x]','$quantity1[$x]')";
				$result = $connection->query($sql);
				if ($connection->query($sql) === TRUE) {
					echo " ";
				} else {
					  echo "Error: " . $sql . "<br>" . $connection->error;
				}				
						
				}
			mysqli_close($connection);	
?>
		<main class="mainDesktop">
			<h2 class="orderSucsses">ההזמנה בוצעה בהצלחה</h2>
		</main>
	</body>
</html>