<!DOCTYPE html>
<html>
	<head>
		<title>עובדים</title>
		<link rel="stylesheet" href="includes/style.css">
		<meta charset="UTF-8">
	</head>
	<body>
	<header>
		<a href="index.php" id="logo"> </a>
		<img  class="clock1" src="images/clock1.png">
		<nav class="desktopNav">
			<ul class="MenuDesktop">
				<li><a href="work1.php" class="MenuDesktopBorder">עובדים</a></li>
				<li><a href="statstic.html" class="MenuDesktopBorder">סטטיסטיקה</a></li>
				<li><a href="inventory.html" class="MenuDesktopNoBorder current">מלאי</a></li>
			</ul>
		</nav>
	</header>
	<div class="clear"></div>
		<main class="mainDesktop">
			<h1 class="headlineDesk">כמות פריטים במחסן</h1>
			<div class="clear"></div>
			<a href="index.php" class="breadcrums"> &#60;דף הבית</a><p class="description">מלאי</p>
			<div class="clear"> </div>
			<table id="t01">
			  <tr>
			  	<th>40</th>
			  	<th>39</th>
			  	<th>38</th>
			  	<th>37</th>
			  	<th>36</th>
			  	<th>כמות במלאי</th>
			  	<th>צבע</th>	
			    <th>קוד פריט</th>
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
				 
				  header('Content-Type: text/html; charset=utf-8');
				 
				$connection->query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'"); 

				$sql = "SELECT * FROM tbl_stock_202";
				$result = $connection->query($sql);
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>" . $row["40"]. " </td><td> " . $row["39"]. "</td><td> " . $row["38"]. "</td><td>". $row["37"]."</td><td>". $row["36"]."</td><td>". $row["quantity"]."</td>";
				    	echo "<td>" . $row["color"]. " </td><td> " . $row["code"]. "</td></tr> ";
					}
				} else {
				    echo "0 results";
				} 
			mysqli_close($connection);
?>
			</table>
		</main>
		<div class="clear"></div>
	</body>
</html>