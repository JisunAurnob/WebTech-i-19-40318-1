<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="design.css">
	<title>Login</title>
<style>
.error {color: #FF0000;}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #008fb3;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #008fb3;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
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
input[type=submit]:hover {
  background-color: #cc0000;
  color: black;
}
</style>
</head>
<body>
<div><?php include 'controler/header.php';?></div>
<?php if(!empty($_GET['jsonmsg'])){echo $_GET['jsonmsg'];} ?>
<?php if(!empty($_GET['alert'])){echo $_GET['alert'];} ?>
<!-- <div><h1 style="font-family: cursive; font-size: 30px; color: #008fb3"><center> Login</center><br></div> -->
<form method="post" action="controler/loginControler.php">
  <div class="displayMiddle"><div><h1 style="font-family: cursive; font-size: 30px; color: #008fb3"><center> Login</center></div>
  <label for="username" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> User Name: </label>
  <input type="text" id="username" name="username">
  <span class="error"><?php if(!empty($_GET['userNameErr'])){echo $_GET['userNameErr'];}?></span>
  <br>
  <label for="password" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Password: </label>
  <input type="Password" id="password" name="Password">
  <span class="error"><?php if(!empty($_GET['passErr'])){echo $_GET['passErr'];}?></span>
  <br>
  <input type="checkbox" id="reme" name="rememberMe" value="rememberMe">
  <label for="reme" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Remember Me</label><br>
  <br>
  <input type="submit" name="submit" value="Submit">
  <center><a  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='red'" style="text-decoration: none; color: red;" href="">Forgot Password?</a></div></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</form>
<br><br><br><br><br><br><br><br><br><br><?php include 'controler/footer.php';?>
</body>
</html>