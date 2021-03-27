<?php 
session_start();
require_once ('model/model.php');
$tableName = 'users';
$admin = showUser($tableName, $_SESSION['username']);

if(isset($_SESSION['username'])){ ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="design.css">
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
<legend>Admin:</legend><div style="float: left;">  
  Name: <input type="text" name="name" value="<?php echo $admin['name']; ?>">
  <span class="error">* <?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];} ?></span>
  <br><hr>
  E-mail: <input type="text" name="email" value="<?php echo $admin['email']; ?>">
  <span class="error">* <?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span>
  <br><hr><br>
  Date Of Birth:
  <input type="date" name="birthday" value="<?php echo $admin['dateofbirth']; ?>">
  <span class="error">* <?php if(!empty($_GET['dobErr'])){echo $_GET['dobErr'];}?></span>
  <br><br><hr><br>
  Gender:
  <input type="radio" name="gender" value="Female" <?php if($admin['gender']=="Female"){echo "checked";} ?> >Female
  <input type="radio" name="gender" value="Male" <?php if($admin['gender']=="Male"){echo "checked";} ?> >Male
  <input type="radio" name="gender" value="Other" <?php if($admin['gender']=="Other"){echo "checked";}  ?> >Other
  <span class="error">* <?php  if(!empty($_GET['genderErr'])){echo $_GET['genderErr'];}?></span>
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