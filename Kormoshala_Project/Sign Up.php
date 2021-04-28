<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Sign Up</title>
</head>
<body>
	<div class="main-container">
	<?php 
	echo "<div>";include 'controler/header.php';echo "</div>";
 ?>
 <h1 style="font-family: Raleway; font-size: 30px; color: #008fb3"><center>Create Your Desired Account</center></h1>
 <center>
<div>
	<a class='headerButton'href='adminSignUp.php'>Admin</a><br><br>
	<a class='headerButton'href='seekerSignUp.php'>Are You A Job Seeker?</a><br><br>
	<a class='headerButton'href='corporateEmployerSignUp.php'>Corporate Employer ?</a><br><br>
	<a class='headerButton'href='personalEmployerSignUp.php'>Freelance Employer ? </a><br><br>
</div>
</center>
</div>
<div><?php include 'controler/footer.php';?></div>
</body>
</html>