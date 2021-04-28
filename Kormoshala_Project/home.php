<!DOCTYPE html>
<html>

<head>
	<link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Kormoshala</title>
</head>

<body>
	<?php 
	session_start();
	include 'controler/header.php';
 	?>
	<marquee><h2 style="color:#cc0066">Welcome to Kormoshala. Are You Unemployed? Need Jobs? This Is The Right Place For You. Our Slogan Is "Job For All"</h2></marquee>
    <center>
    <div style="width:600px;" class="searchBG"><br>
        <form method="post" action="<?php echo htmlspecialchars('searchJobs.php');?>">
        <input style="width:350px; margin-right: 10px;" type="text" id="search" name="search" placeholder="Search Jobs By Keyword"><input class="searchbt" style="width:140px;height: 48px;" type="submit" id="searchbt" name="searchbt" value="Search"></form>
    <br>
    </div></center>
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