<!DOCTYPE html>
<html>
	<head>
		<title>עובדים</title>
		<link rel="stylesheet" href="includes/style.css">
		<meta charset="UTF-8">
	</head>
	<body>
	<header>
		<a href="index.html" id="logo"> </a>
		<img  class="clock1" src="images/clock1.png">
		<nav class="desktopNav">
			<ul class="MenuDesktop">
				<li><a href="work1.php" class="MenuDesktopBorder current">עובדים</a></li>
				<li><a href="statstic.html" class="MenuDesktopBorder">סטטיסטיקה</a></li>
				<li><a href="inventory.html" class="MenuDesktopNoBorder">מלאי</a></li>
			</ul>
		</nav>
	</header>
	<div class="clear"> </div>
		<main class="mainDesktop">
			<h1 class="headlineDesk">עובדים</h1>
			<div class="clear"> </div>
			<a href="index.php" class="breadcrums"> <דף הבית</a><p class="description">עובדים</p>
			<div class="clear"> </div>
			<table id="t01">
			  <tr>
			  	<th>כמות פניות</th>
			  	 <th>מצב עובד</th>
			  	 <th>שעת כניסה למערכת</th>
			    <th>שם העובד</th>
			  </tr>
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
				 
			
				
				$connection->query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
				
				$sql = "SELECT * FROM tbl_workes_202";
				$result = $connection->query($sql);
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>" . $row["numCalls"]. " </td><td> " . $row["status"]. "</td><td> " . $row["entry"]. "</td><td>". $row["name"]. "</td></tr>";
				    }
				} else {
				    echo "0 results";
				} 
			?>
							
			
			</table>
		</main>
		<div class="clear"></div>
	</body>
</html>
<?php
//close DB connection
mysqli_close($connection);
?>