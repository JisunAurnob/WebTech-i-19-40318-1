<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
    	* <a href=".php">Change Profile Picture</a><br><br>
    	* <a href="changePassword.php">Change Password</a><br><br>
    	* <a href="logout.php">Logout</a>
    </div>
    </th>
    <th><?php if (isset($_SESSION['username'])) {
	echo "<fieldset>
<legend><B>PROFILE</B></legend><div style= 'margin-right: 750px;float: left; text-align: left;color: green;'> Username: ".$_SESSION['username']."<hr>
	<br>Name: Aurnob, MD. Jisun Abedin<hr>
	<br>Email: jisunabedin@gmail.com<hr>
	<br>Gender: Male<hr>
	<br>Date Of Birth: 3/08/1999<hr>
	</div>
	<div style= 'float: right;position: absolute;left:500px; top: 180px;color: green;'>
	<fieldset>
<img src='resources/jisun.png' alt='Profile Picture' width='180' height='200'>
</fieldset>
	</div></fieldset>";

}?></th>
  </tr>
</table>

<div><?php include 'resources/footer.php';?></div>
</body>
</html>