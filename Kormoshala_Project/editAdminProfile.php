<?php 
session_start();
require_once ('model/model.php');
$tableName = 'users';
$admin = showUser($tableName, $_SESSION['username']);

if(isset($_SESSION['username'])){ ?>
<!DOCTYPE html>
<html>
<head>
   <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
  <script type="text/javascript" src="scripts/editAdminProfile.js"></script>
	<title>Edit Admin</title>
  <style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php 
	echo "<div>";include 'controler/header.php';echo "</div>";
 ?>
<form method="post" action="<?php echo htmlspecialchars('Controler/editAdminProfileControler.php');?>">
  <fieldset>
<legend>Edit Profile:</legend><div style="float: left;">  
  Name: <input type="text" id="name" name="name" value="<?php echo $admin['name']; ?>" onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="nameErr" >* <?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];} ?></span>
  <br><hr>
  E-mail: <input type="text" id="email" name="email" value="<?php echo $admin['email']; ?>" onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="emailErr">* <?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span>
  <br><hr><br>
  Date Of Birth:
  <input type="date" id="birthday" name="birthday" value="<?php echo $admin['dateofbirth']; ?>" onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="birthdayErr">* <?php if(!empty($_GET['dobErr'])){echo $_GET['dobErr'];}?></span>
  <br><br><hr><br>
  Gender:
  <input type="radio" name="gender" value="Female" <?php if($admin['gender']=="Female"){echo "checked";} ?>  onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">Female
  <input type="radio" name="gender" value="Male" <?php if($admin['gender']=="Male"){echo "checked";} ?>  onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">Male
  <input type="radio" name="gender" value="Other" <?php if($admin['gender']=="Other"){echo "checked";}  ?>  onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">Other
  <span class="error" id="genderErr">* <?php  if(!empty($_GET['genderErr'])){echo $_GET['genderErr'];}?></span>
  <br><br><hr>
  <input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"></div></fieldset>
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