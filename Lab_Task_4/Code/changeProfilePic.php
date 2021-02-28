<!DOCTYPE html>
<html>
<head>
	<title>Profile Picture</title>
</head>
<body>
	<?php 
session_start();
	echo "<div>";include 'resources/header.php';echo "</div>";
 ?>
	<table style="width:100%; border: 1px solid black;">
  <tr style="border: 1px solid black;">
    <th style="border: 1px solid black;">
    	Account<hr>
    	<div style="float: left; text-align: left;">
    	* <a href="dashboard.php">Dashboard</a><br><br>
    	* <a href="profile.php">View Profile</a><br><br>
    	* <a href=".php">Edit Profile</a><br><br>
    	* <a href="changeProfilePic.php">Change Profile Picture</a><br><br>
    	* <a href="changePassword.php">Change Password</a><br><br>
    	* <a href="logout.php">Logout</a>
    </div>
    </th>
    <th style="border: 1px solid black;">

<form action="resources/upload.php" method="post" enctype="multipart/form-data">
  <fieldset>
<legend><B>PROFILE PICTURE</B></legend> <br>
  <img src="resources/jisun.png" width="180" height="200"><br><br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br><hr>
  <input type="submit" name="submit">
</form>
</fieldset>
<div><?php include 'resources/footer.php';?></div>
</body>
</html>