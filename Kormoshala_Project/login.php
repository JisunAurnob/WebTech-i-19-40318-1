<!DOCTYPE html>
<html>
<head>
   <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
  <script type="text/javascript" src="scripts/login.js"></script>
	<title>Login</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php include 'controler/header.php';?>
 <center><div class="container"><?php if(!empty($_GET['jsonmsg'])){echo $_GET['jsonmsg'];} ?>
<?php if(!empty($_GET['alert'])){echo $_GET['alert'];} ?>
<!-- <div><h1 style="font-family: cursive; font-size: 30px; color: #008fb3"><center> Login</center><br></div> -->
<form method="post" action="controler/loginControler.php">
  <div><div><h1 style="font-family: cursive; font-size: 30px; color: #008fb3"><center> Login</center></h1></div>
  <label for="username" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> User Name </label>
  <input type="text" id="username" name="username" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="usernameErr"><?php if(!empty($_GET['userNameErr'])){echo $_GET['userNameErr'];}?></span>
  <br>
  <label for="Password" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Password </label>
  <input type="Password" id="Password" name="Password" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="passErr"><?php if(!empty($_GET['passErr'])){echo $_GET['passErr'];}?></span>
  <br>
  <input type="checkbox" id="reme" name="rememberMe" value="rememberMe">
  <label for="reme" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Remember Me</label><br>
  <br>
  <input type="submit" id="submit" name="submit" value="Login" disabled>
  <center><a  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='red'" style="text-decoration: none; color: red;" href="">Forgot Password?</a></div></center>
<br><br><br><br><br><br>

</form>
</div></center>

<?php include 'controler/footer.php';?>
</body>
</html>