<!DOCTYPE html>
<html>
<head>
  <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
  <script type="text/javascript" src="scripts/adminSignUpHandler.js"></script>
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
  <label for="name" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Name </label> 
  <input type="text" id="name" name="name" onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="nameErr"><?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];} ?></span>
  <br><hr>
  <label for="email" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> E-mail </label> 
  <input type="text" id="email" name="email" onfocus="change(this)"  onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="emailErr"><?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span>
  <br><hr>
  <label for="username" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> User Name </label> 
  <input type="text" id="username" name="username" onkeyup="checkUsername(this.value)">
  <span class="error" id="usernameErr"><?php if(!empty($_GET['userNameErr'])){echo $_GET['userNameErr'];}?></span>
  <br><hr>
  <label for="Password" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Password </label> 
  <input type="Password" id="Password" name="Password" onfocus="change(this)"  onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="PasswordErr"><?php if(!empty($_GET['passErr'])){echo $_GET['passErr'];}?></span>
  <br><hr>
  <label for="confirmpass" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Confirm Password </label> 
  <input type="Password" id="confirmpass" name="confirmpass" onfocus="change(this)"  onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="confirmpassErr"><?php if(!empty($_GET['confirmpassErr'])){echo $_GET['confirmpassErr'];}?></span>
  <br><hr>
  <fieldset>
  <legend>Gender</legend>
  Gender:
  <input type="radio" name="gender" id="gender" value="Female" onfocus="change(this)"  onkeyup="change(this)" onblur="revert(this)">Female
  <input type="radio" name="gender" id="gender" value="Male" onfocus="change(this)"  onkeyup="change(this)" onblur="revert(this)">Male
  <input type="radio" name="gender" id="gender" value="Other" onfocus="change(this)"  onkeyup="change(this)" onblur="revert(this)">Other
  <span class="error" id="genderErr"><?php  if(!empty($_GET['genderErr'])){echo $_GET['genderErr'];}?></span>
  </fieldset>
  <hr>
  <fieldset>
  <legend>Date Of Birth</legend>
  <input type="date" id="birthday" name="birthday" onchange="dobValidate(this)" onblur="dobValidate(this)">
  <span class="error" id="birthdayErr"><?php if(!empty($_GET['dobErr'])){echo $_GET['dobErr'];}?></span>
  <br></fieldset><hr>
  <input type="submit" name="signup" value="SignUp"> <input type="reset" value="Reset"></div></div></fieldset>
</form>
<?php if(!empty($_GET['jsonmsg'])){echo $_GET['jsonmsg'];} ?></div>

<div><?php include 'controler/footer.php';?></div>
</body>
</html>