<?php 
session_start();
if(isset($_SESSION['username'])){ ?>
<!DOCTYPE html>
<html>
<head>
	 <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
  <script type="text/javascript" src="scripts/changepass.js"></script>
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
  <label for="cpass" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Current Password </label> 
  <input type="Password" id="cpass" name="cpass" onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="cpassErr">* <?php if(!empty($_GET['cpassErr'])){echo $_GET['cpassErr'];} ?></span>
  <br><br>
  <label for="npass" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> New Password: </label> 
  <input type="Password" id="npass" name="npass" onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="npassErr">* <?php if(!empty($_GET['npassErr'])){echo $_GET['npassErr'];} ?></span>
  <br><br>
  <label for="rtnpass" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Retype New Password: </label> 
  <input type="Password" id="rtnpass" name="rtnpass" onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="rtnpassErr">* <?php if(!empty($_GET['rtnpassErr'])){echo $_GET['rtnpassErr'];} ?></span>
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