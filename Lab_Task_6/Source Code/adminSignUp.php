<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="design.css">
	<title>Admin Registration</title>
	<style>
.error {color: #FF0000;}
input[type=text], select, input[type=password], select {
  width: 120%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #008fb3;
  border-radius: 4px;
  box-sizing: border-box;
}
/*input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #008fb3;
  border-radius: 4px;
  box-sizing: border-box;
}*/
input[type=submit],input[type=reset] {
  width: 100%;
  background-color: black;
  font-size: 18px;
  font-family: Raleway;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover,input[type=reset]:hover {
  background-color: #cc0000;
  color: black;
}
</style>
</head>
<body>
<?php 
  echo "<div>";include 'controler/header.php';echo "</div>";
  //require 'controler/adminSignUpControler.php';
 ?>

<!-- <p><span class="error">* required field</span></p> -->

<form method="post" action="<?php echo htmlspecialchars('Controler/adminSignUpControler.php');?>">
  <fieldset>
<legend>REGISTRATION:</legend><div style="margin-left: 400px; "><div style="float: left;">  
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
<?php if(!empty($_GET['jsonmsg'])){echo $_GET['jsonmsg'];} ?>

<div><?php include 'controler/footer.php';?></div>
</body>
</html>