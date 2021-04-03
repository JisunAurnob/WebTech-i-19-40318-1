<!DOCTYPE html>
<html>
<head>
  <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Admin Registration</title>
	<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php 
  echo "<div>";include 'controler/header.php';echo "</div>";
  //require 'controler/adminSignUpControler.php';
 ?>
  <div class="container"><form method="post" action="<?php echo htmlspecialchars('Controler/adminSignUpControler.php');?>">
  <fieldset>
<legend>REGISTRATION:</legend><div><div>  
  Name: <input type="text" name="name">
  <span class="error">* <?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];} ?></span>
  <br><hr>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span>
  <br><hr>
  User Name: <input type="text" name="username">
  <span class="error">* <?php if(!empty($_GET['userNameErr'])){echo $_GET['userNameErr'];}?></span>
  <br><hr>
  Password: <input type="Password" name="Password">
  <span class="error">* <?php if(!empty($_GET['passErr'])){echo $_GET['passErr'];}?></span>
  <br><hr>
  Confirm Password: <input type="Password" name="confirmpass">
  <span class="error">* <?php if(!empty($_GET['confirmpassErr'])){echo $_GET['confirmpassErr'];}?></span>
  <br><hr>
  <fieldset>
  <legend>Gender</legend>
  Gender:
  <input type="radio" name="gender" value="Female">Female
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="Other">Other
  <span class="error">* <?php  if(!empty($_GET['genderErr'])){echo $_GET['genderErr'];}?></span>
  </fieldset>
  <hr>
  <fieldset>
  <legend>Date Of Birth</legend>
  <input type="date" name="birthday">
  <span class="error">* <?php if(!empty($_GET['dobErr'])){echo $_GET['dobErr'];}?></span>
  <br></fieldset><hr>
  <input type="submit" name="signup" value="SignUp"> <input type="reset" value="Reset"></div></div></fieldset>
</form>
<?php if(!empty($_GET['jsonmsg'])){echo $_GET['jsonmsg'];} ?></div>
<!-- <p><span class="error">* required field</span></p> -->



<div><?php include 'controler/footer.php';?></div>
</body>
</html>