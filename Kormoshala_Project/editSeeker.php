<?php 
session_start();
if(isset($_SESSION['username'])){ 
  require_once ('model/model.php');
  $tableName = 'seekers';
  $seekerUsername = $_GET['username'];
  $seeker = showUser($tableName, $seekerUsername);?>
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Seeker</title>
   <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
</head>
<body>
<?php 
	echo "<div>";include 'controler/header.php';echo "</div>";
	require_once 'controler/manageSeekerControler.php'
	//$_GET['username'];
 ?>
<form method="post" action="Controler/editSeekerControler.php?username=<?php echo $seekerUsername; ?>">
  <fieldset>
<legend>Seeker:</legend><div style="float: left;">  
  <label for="name" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Name </label>
    <input type="text" id="name" name="name" value="<?php echo $seeker['name']; ?>" style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];}?></span><br>
  <br><hr>
  <label for="email" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Email </label>
    <input type="text" id="email" name="email" value="<?php echo $seeker['email']; ?>"  style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span><br>
  <br><hr>
  <!-- <label for="username" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Username </label>
    <input type="text" id="username" name="username" value="<?php if(!empty($_GET['username'])){echo $_GET['username'];} ?>"style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['userNameErr'])){echo $_GET['userNameErr'];}?></span><br>
  <br><hr>
 -->  <label for="phone" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Phone </label>
    <input type="text" id="phone" name="phone" value="<?php echo $seeker['phone']; ?>"  style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['phoneErr'])){echo $_GET['phoneErr'];}?></span><br>
  <br><hr>
  <label for="birthday" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Date Of Birth: </label>
  <input type="date" id="birthday" name="birthday" value="<?php echo $seeker['dob']; ?>">
  <span class="error">* <?php if(!empty($_GET['dobErr'])){echo $_GET['dobErr'];}?></span>
  <br><br><hr><br>
  <label style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Gender: </label>
  <input type="radio" id="gender" name="gender" value="Female" <?php if($seeker['gender']=="Female"){echo "checked";} ?> >Female
  <input type="radio" id="gender" name="gender" value="Male" <?php if($seeker['gender']=="Male"){echo "checked";} ?> >Male
  <input type="radio" id="gender" name="gender" value="Other" <?php if($seeker['gender']=="Other"){echo "checked";}  ?> >Other
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