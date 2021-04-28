<?php 
session_start();
if(isset($_SESSION['username'])){ 
	require_once ('model/model.php');
	$tableName = 'corporate';
	$corpUsername = $_GET['username'];
	$corpEmp = showUser($tableName, $corpUsername);?>
<!DOCTYPE html>
<html>
<head>
   <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Edit Corporate Employer</title>
</head>
<body>
<?php 
	include 'controler/header.php';
	//require_once 'controler/manageCorporateEmployerControler.php'
	//$_GET['username'];
 ?>
<form method="post" action="Controler/editCorporateEmployerControler.php?username=<?php echo $corpUsername; ?>">
  <fieldset>
<legend>Corporate Employer:</legend><div style="float: left;">
<label for="name" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Company Name </label>
    <input type="text" id="name" name="name" value="<?php echo $corpEmp['CompanyName']; ?>" style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];}?></span><br>
  <br><hr>
  <label for="email" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> E-mail </label>
    <input type="text" id="email" name="email" value="<?php echo $corpEmp['Email']; ?>"  style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span><br>
  <br><hr>
  <!-- <label for="username" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Username </label>
    <input type="text" id="username" name="username" value="<?php if(!empty($_GET['username'])){echo $_GET['username'];} ?>"style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['userNameErr'])){echo $_GET['userNameErr'];}?></span><br>
  <br><hr> -->
  <label for="phone" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Phone </label>
    <input type="text" id="phone" name="phone" value="<?php echo $corpEmp['Phone']; ?>"  style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['phoneErr'])){echo $_GET['phoneErr'];}?></span><br>
  <br><hr>
  <label for="address" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Address: </label>
    <input type="text" id="address" name="address" value="<?php echo $corpEmp['CompanyAddress']; ?>"  style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['addressErr'])){echo $_GET['addressErr'];}?></span><br>
  <br><hr>
  <label for="tradelicense" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Trade License No: </label>
    <input type="text" id="tradelicense" name="tradelicense" value="<?php echo $corpEmp['TradeLicense']; ?>"  style="width: 100%;">
    <span class="error"><?php if(!empty($_GET['tradelicenseErr'])){echo $_GET['tradelicenseErr'];}?></span><br>
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