<?php 
session_start();
if(isset($_SESSION['username'])){ 
  require_once ('model/model.php');
  $tableName = $_GET['tableName'];
  $username = $_GET['username'];
  $user = showUser($tableName, $username);
?>
<!DOCTYPE html>
<html>
<head>
	 <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
</head>
<body>
<?php include 'controler/header.php'; ?>
<br>

<fieldset>
<legend><B>USER PROFILE</B></legend><div style= 'margin-right: 750px;float: left; text-align: left;color: green;'> Username:<?php echo $_GET['username']; ?><hr>
	<?php if(!empty($user['name'])){echo  "<br>Name: ".$user['name']."<hr>";} ?>
	<?php if(!empty($user['email'])){echo  "<br>Email: ".$user['email']."<hr>";} ?>
	<?php if(!empty($user['gender'])){echo  "<br>Gender: ".$user['gender']."<hr>";} ?>
	<?php if(!empty($user['dob'])){echo  "<br>Date Of Birth: ".$user['dob']."<hr>";} ?>
	<?php if(!empty($user['phone'])){echo  "<br>Phone: ".$user['phone']."<hr>";} ?>
	<?php if(!empty($user['address'])){echo  "<br>Address: ".$user['address']."<hr>";} ?>
	<?php if(!empty($user['CompanyName'])){echo  "<br>Company Name: ".$user['CompanyName']."<hr>";} ?>
	<?php if(!empty($user['Email'])){echo  "<br>Email: ".$user['Email']."<hr>";} ?>
	<?php if(!empty($user['TradeLicense'])){echo  "<br>Trade License No: ".$user['TradeLicense']."<hr>";} ?>
	<?php if(!empty($user['Phone'])){echo  "<br>Phone: ".$user['Phone']."<hr>";} ?>
	<?php if(!empty($user['CompanyAddress'])){echo  "<br>Address: ".$user['CompanyAddress']."<hr>";} ?>
	</div>
	<div style= 'float: right;position: absolute;left:500px; top: 180px;color: green;'>
		
	<fieldset>
<img src="<?php echo 'resources/otherUserUploads/'.$_GET['username'].'.jpg' ?>" alt='Profile Picture' width='180' height='200'>
  <br><hr>
</fieldset>
	</div></fieldset>
<br>
 <div><?php include 'controler/footer.php';?></div>
</body>
</html>
<?php }
else{
$msg="<script>alert('You Have To Login First To Access This Page!')</script>";
    header("location:login.php?alert=" . $msg);
}
 ?>