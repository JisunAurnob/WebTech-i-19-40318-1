<?php
session_start();
if (isset($_SESSION['username'])) { ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style.css">
  <script type="text/javascript" src="../script/changepass.js" ></script>
    <style>
.error {color: #FF0000;}
</style>
<title>Change Password</title>
</head>
<body>



<header>
  <?php 
  include '../model/header.php';
  require_once ('../model/model.php');
  $tableName = 'corporate';
  $corpEmployee = showEmployee($tableName, $_SESSION['username']);
 ?>
</header>



<section>

  <article>



  <form method='post' action='../controller/chngPassController.php'>  
<fieldset>




<legend><b>CHANGE PASSWORD</b></legend><br><!-- <div class="align"> -->

  <div class="row">
    <div class="col-25">
      <label for="cpassword"><b>Password</b></label>
    </div>
    <div class="col-75">
      <input type="password" id="cpassword" name="cpassword" value='<?php //echo $cpass;?>'  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class='error' id="cpassErr"><?php if(!empty($_GET['cpassErr'])){echo $_GET['cpassErr'];}?></span><br><hr>
  
  <div class="row">
    <div class="col-25">
      <label for="npassword"><b>New Password</b></label>
    </div>
    <div class="col-75">
      <input type="password" id="npassword" name="npassword" value='<?php //echo $cpass;?>' onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class='error' id="npassErr"><?php if(!empty($_GET['npassErr'])){echo $_GET['npassErr'];}?></span><br><hr>


  <div class="row">
    <div class="col-25">
      <label for="rpassword"><b>Retype New Password</b></label>
    </div>
    <div class="col-75">
      <input type="password" id="rpassword" name="rpassword" value='<?php //echo $cpass;?>'  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class='error' id="rpassErr"><?php if(!empty($_GET['rpassErr'])){echo $_GET['rpassErr'];}?></span><br><hr>
  
  <input type='submit' class="registerbtn" name='submit' value='Submit'>






</fieldset>
</form>
   
  </article>
</section>

<footer>
<?php include '../model/footer.php';?>
</footer>

</body>
</html>
<?php }

else{
    $msg="error";
    header("location:loginpage.php?msg=" . "You Must Log in First !!");
    // echo "<script>location.href='login.php'</script>";
  }

?>
