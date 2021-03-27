<?php 
session_start();
if(isset($_SESSION['username'])){ ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="design.css">
	<title>Change Password</title>
</head>
<body>
<?php 
	echo "<div>";include 'controler/header.php';echo "</div>";
	require_once ('model/model.php');
	$tableName = 'users';
	$admin = showUser($tableName, $_SESSION['username']);
 ?>
<form method="post" action="<?php echo htmlspecialchars('controler/changePasswordControler.php');?>">
  <fieldset>
<legend>CHANGE PASSWORD</legend><B><div style="float: left; ">  
  Current Password: <input type="Password" name="cpass">
  <span class="error">* <?php if(!empty($_GET['cpassErr'])){echo $_GET['cpassErr'];} ?></span>
  <br><br>
  New Password: <input type="Password" name="npass">
  <span class="error">* <?php if(!empty($_GET['npassErr'])){echo $_GET['npassErr'];} ?></span>
  <br><br>
  Retype New Password: <input type="Password" name="rtnpass">
  <span class="error">* <?php if(!empty($_GET['rtnpassErr'])){echo $_GET['rtnpassErr'];} ?></span>
  <br><hr>
  <input type="submit" name="submit" value="Change"></div></B>
</fieldset>
</form>


<div><?php include 'controler/footer.php';?></div>
</body>
</html>




<?php }
else{
$msg="<script>alert('You Have To Login First To Access This Page!')</script>";
    header("location:login.php?alert=" . $msg);
}
 ?>