<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">  
    <link rel='stylesheet' type='text/css' href='style.php'/>
</head>
<body>
	 <header>
    <div class="wrapper">
        <div class="logo">
            <img src="files/logo.png" alt="">
        </div>
<ul class="nav-area">
<li><a href="#">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Services</a></li>
<li><a href="../Controller/logoutStudentController.php">Log Out</a></li>
</ul>
</div>


<?php
session_start();

if(isset($_SESSION['username']))
{
  ?>
<div class="dashboard">
 <br><a href='dashboardStudentView.php'>Dashboard</a>
 <br><a href='postAdStudentView.php'>Post ad</a>
 <br><a href='viewProfileStudentView.php'>View Profile</a>
 <br><a href='editProfileStudentView.php'>Edit Profile</a>
 <br><a href='upload.php'>Change Profile Picture</a>
<br><a href='changePasswordStudentView.php'>Change Password</a>
  <br><a href ='../Controller/logoutStudentController.php'>Logout </a>
  </div>

<?php

}
else {
header("location:../View/loginStudentView.php");
}
 ?>


 </header>
 </body>
 <?php require_once '../front/includes/footer.php';?>
