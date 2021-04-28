<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
<script type="text/javascript" src="../script/login.js" ></script>
<title>login page</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>


<header>
  <?php include '../model/header.php';?>
</header>

<section>  
<!-- <nav></nav> -->
  <article>
    <div style="color: red;"><?php if(!empty($_GET['alert'])){echo $_GET['alert'];} ?></div><br>
    <div style="color: red;"><?php if(!empty($_GET['msg'])){echo $_GET['msg'];} ?></div><br>

    <form method="post" action="../controller/loginController.php"> 
  <fieldset>
    <legend><b>LOGIN</b></legend>
    
  <div class="row">
    <div class="col-15">
      <label for="username"><b>User Name</b></label>
    </div>
    <div class="col-55">
      <input type="text" id="username" name="username" placeholder="Your name.."  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="usernameErr"><?php if(!empty($_GET['usernameErr'])){echo $_GET['usernameErr'];}?></span><br>

  
   <div class="row">
    <div class="col-15">
      <label for="password"><b>Password</b></label>
    </div>
    <div class="col-55">
      <input type="password" id="password" name="password" placeholder="Password"  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="PasswordErr"><?php if(!empty($_GET['passErr'])){echo $_GET['passErr'];}?></span><br>
  

<input type="checkbox" name="remember" value=""  >Remember me<br><br>
  <input type="submit" class="registerbtn" name="submit" value="Log in"><br>
  <a href="#">Forget Password?</a>
  </fieldset> 
</form>
   
  </article>
</section>

<footer>
 <?php include '../model/footer.php';?>
</footer>

</body>
</html>
