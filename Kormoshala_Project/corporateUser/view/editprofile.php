<?php
session_start();
require_once '../model/model.php';
$tableName='corporate';
$corpEmployee = showEmployee($tableName, $_SESSION['username']);
if (isset($_SESSION['username'])) { ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
    <script type="text/javascript" src="../script/editprofile.js" ></script>
     <style>
.error {color: #FF0000;}
</style>
<title>Edit Profile</title>
</head>
<body>

<header>

	<?php
	
	 include '../model/header.php';

	 ?></header>

<section>
  
  
  <article>

  	<form method="post" action="<?php echo htmlspecialchars('../controller/editProfileController.php');?>" enctype="multipart/form-data">
    <fieldset>
<legend><B>EDIT PROFILE</B></legend>

  <br><br>
  <div class="row">
    <div class="col-20">
      <label for="email"><b>Email</b></label>
    </div>
    <div class="col-55">
      <input type="text" id="email" name="email" value="<?php echo $corpEmployee['Email']; ?>" onfocus="change(this)" onkeyup="change(this)" onblur="change(this)">
      <span class="error" id="emailErr"><?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];} ?></span>
    </div>
  </div>
  

  <div class="row">
    <div class="col-20">
      <label for="phone"><b>Phone</b></label>
    </div>
    <div class="col-55">
      <input type="tel" id="phone" name="phone" placeholder="01234567891"  value="<?php echo $corpEmployee['Phone']; ?>" onfocus="change(this)" onkeyup="change(this)" onblur="change(this)">
      <span class="error" id="phoneErr"><?php if(!empty($_GET['phnErr'])){echo $_GET['phnErr'];} ?>
    </div>
  </div>
  </span><br><br><br><br><br><br><hr>
  <!-- Password: <input type='password' name='password' value="<?php //echo $corpEmployee['Password']; ?>"> -->
 
  <div class="image">
 <fieldset>
  <img src='<?php echo $corpEmployee['Image']; ?>' alt='Profile Picture' width='150' height='150'><hr>
 <input type="file" name="fileToUpload" id="fileToUpload">
 </fieldset>
  </div>

   <input type="submit" class="registerbtn" name="save" value="Save"><br>
  <input type="reset"class="registerbtn" value="Reset"><br>
  <a class='button' href="changepassword.php">Change Password</a><br>



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

