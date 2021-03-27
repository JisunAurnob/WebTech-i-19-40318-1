<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="design.css">
	<title>Kormoshala</title>
</head>

<body>
	<?php 
	session_start();
	echo "<div>";
	include 'controler/header.php';
	echo "</div>";
 	?>
	<marquee><h2 style="color:#ff8000">Welcome to Kormoshala. Are You Unemployed? Need Jobs? This Is The Right Place For You. Our Slogan Is "Job For All"</h2></marquee>
	<br><br><br><br>
	<div style="margin-left: 120px; font-family: cursive; font-size: 30px; color: #008fb3">Featured Jobs</div><br>
 	<nav class="container">
 	<div class="box1">
	<a style="text-decoration: none;color: black;" href="http://www.aiub.edu/"><img src="resources/4.jpg" width="300" height="115"><br><b>Senior PHP Software Engineer</b><br>At least, 1.5 years experience as a senior engineer<br>Total of 3-5 years experience in web development<br>Strong knowledge of OOP-based Design Patterns<br>GG</a>
	</div>

	<div class="box2">
	<a style="text-decoration: none;color: black;" href="http://www.aiub.edu/"><img src="resources/5.png" width="300" height="115"><br><b>Senior PHP Software Engineer</b><br>At least, 1.5 years experience as a senior engineer<br>Total of 3-5 years experience in web development<br>Strong knowledge of OOP-based Design Patterns<br>GG</a>
	</div>

	<div class="box3">
	<a style="text-decoration: none;color: black;" href="http://www.aiub.edu/"><img src="resources/6.jpg" width="300" height="115"><br><b>Senior PHP Software Engineer</b><br>At least, 1.5 years experience as a senior engineer<br>Total of 3-5 years experience in web development<br>Strong knowledge of OOP-based Design Patterns<br>GG</a>
	</div>
 	</nav>
 	<br>
 	<div style="margin-left: 120px; font-family: cursive; font-size: 30px; color: #cc3300">Hot Jobs</div><br>
 	<nav class="container">
 	<div class="box4">
	<a style="text-decoration: none;color: black;" href="http://www.aiub.edu/"><img src="resources/1.jpg" width="300" height="115"><br><b>Senior PHP Software Engineer</b><br>At least, 1.5 years experience as a senior engineer<br>Total of 3-5 years experience in web development<br>Strong knowledge of OOP-based Design Patterns<br>GG</a>
	</div>

	<div class="box5">
	<a style="text-decoration: none;color: black;" href="http://www.aiub.edu/"><img src="resources/2.png" width="300" height="115"><br><b>Senior PHP Software Engineer</b><br>At least, 1.5 years experience as a senior engineer<br>Total of 3-5 years experience in web development<br>Strong knowledge of OOP-based Design Patterns<br>GG</a>
	</div>

	<div class="box6">
	<a style="text-decoration: none;color: black;" href="http://www.aiub.edu/"><img src="resources/3.png" width="300" height="115"><br><b>Senior PHP Software Engineer</b><br>At least, 1.5 years experience as a senior engineer<br>Total of 3-5 years experience in web development<br>Strong knowledge of OOP-based Design Patterns<br>GG</a>
	</div>
 	</nav>
 <br><br>
<?php include 'controler/footer.php'; ?>
</body>

</html>