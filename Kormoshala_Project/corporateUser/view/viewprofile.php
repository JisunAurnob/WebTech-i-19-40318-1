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
<title>View Profile</title>
</head>
<body>

<header>

	<?php

	 include '../model/header.php';
	 // $email="jahnnabi.moni54@gmail.com";
	 // $phone="01930284388";



	 ?></header>



<section>

  <article>

    

<div style="color: blue;"><?php if(!empty($_GET['successMsg'])){echo $_GET['successMsg'];} ?></div><br>

<fieldset>
<legend><B>PROFILE</B></legend><div class="align"><br>


   Username: <?php 
   if(empty($_GET['username']))
    echo $_SESSION['username'];
  else
    echo $_GET['username'];?><hr>
  <br>Email: <?php echo $corpEmployee['Email']; ?><hr>
  <br>Phone Number:<?php echo $corpEmployee['Phone']; ?><hr>
  <br><a class='button' href="editprofile.php">Edit Profile</a><br>
  
  </div>
 <div class="image">
  <fieldset>
<img src='<?php echo $corpEmployee['Image']; ?>' alt='Profile Picture' width='150' height='150'><br>
  <div style="color: red;"><?php if(!empty($_GET['msg'])){echo $_GET['msg'];} ?></div>
</fieldset>
  </div>

  </fieldset>
  </article>
</section>

<footer>
  <?php include '../model/footer.php';?>
</footer>

</body>
</html>
<?php }

else{

    header("location:loginpage.php?msg=" . "You Must Log in First !!");
    // echo "<script>location.href='login.php'</script>";
  }

?>