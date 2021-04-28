<?php 
session_start();
if(isset($_SESSION['username'])){ 
  require_once ('model/model.php');
  $tableName = 'freelancers';
  $freeUsername = $_GET['username'];
  $freelancer = showUser($tableName, $freeUsername);
  ?>
<!DOCTYPE html>
<html>
<head>
   <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Edit Freelance Employer</title>
</head>
<body>
<?php 
	echo "<div>";include 'controler/header.php';echo "</div>";
	require_once 'controler/manageFreelanceEmployerControler.php'
	//$_GET['username'];
 ?>
<form method="post" action="Controler/editFreelanceEmployerControler.php?username=<?php echo $freeUsername; ?>">
  <fieldset>
<legend>Freelance Employer:</legend><div style="float: left;">  
  Name: <input type="text" name="name" value="<?php echo $freelancer['name']; ?>">
  <span class="error"><?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];}?></span><br>
  <br><hr>
  E-mail: <input type="text" name="email" value="<?php echo $freelancer['email']; ?>">
   <span class="error"><?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span><br>
  <br><hr>
  Phone: <input type="text" name="phone" value="<?php echo $freelancer['phone']; ?>">
   <span class="error"><?php if(!empty($_GET['phoneErr'])){echo $_GET['phoneErr'];}?></span><br>
  <br><hr>
  Address: <input type="text" name="address" value="<?php echo $freelancer['address']; ?>">
   <span class="error"><?php if(!empty($_GET['addressErr'])){echo $_GET['addressErr'];}?></span><br>
  <br><hr>
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