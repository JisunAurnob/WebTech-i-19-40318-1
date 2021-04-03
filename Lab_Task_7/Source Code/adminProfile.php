<?php 
session_start();
require_once ('model/model.php');
$tableName = 'users';
$admin = showUser($tableName, $_SESSION['username']);

if(isset($_SESSION['username'])){ ?>
<!DOCTYPE html>
<html>
<head><!-- 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Profile</title>
</head>
<body>
<?php 
	echo "<div>";include 'controler/header.php';echo "</div>";
 ?>
  <div class="container"><div style="color: blue;"><?php if(!empty($_GET['successMsg'])){echo $_GET['successMsg'];} ?></div>
<fieldset>
<legend><B>PROFILE</B></legend>
<B><div style= 'margin-right: 750px;float: left; text-align: left;color: green;'> Username: <?php 
if(empty($_GET['username']))
echo $_SESSION['username'];
else
 echo $_GET['username']; ?><hr>
	<br>Name: <?php echo $admin['name']; ?><hr>
	<br>E-mail: <?php echo $admin['email']; ?><hr>
	<br>Date Of Birth: <?php echo $admin['dateofbirth']; ?><hr>
	<br>Gender: <?php echo $admin['gender']; ?><hr>
	<br><a class='button' href="editAdminProfile.php">E d i t</a><br>
	<br><a class='button' style="padding: 15px 45px;" href="changePassword.php">Change Password</a>
</div></B>
	<div style= 'float: right;position: absolute;left:600px; top: 180px;color: green;'>
		<form action="controler/adminProfileControler.php" method="post" enctype="multipart/form-data">
	<fieldset>
<img src="<?php echo $admin['profilepicture']; ?>" alt='Profile Picture' width='180' height='200'><br>
<input type="file" name="fileToUpload" id="fileToUpload">
  <br><hr>
  <input type="submit" name="changeProPic" value="Change Profile Pic">

<div style="color: red;"><?php if(!empty($_GET['msg'])){echo $_GET['msg'];} ?></div>
</fieldset>
</form>
	</div></fieldset>
<br><br></div>

<?php include 'controler/footer.php';?>
</body>
</html>
<?php }
else{
$msg="<script>alert('You Have To Login First To Access This Page!')</script>";
    header("location:login.php?alert=" . $msg);
}
 ?>