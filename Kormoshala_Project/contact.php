<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Contact</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php include 'controler/header.php';?>
<div class="container">
	<div>
		<div style="color: green;"><b><?php if(!empty($_GET['jsonmsg'])){echo $_GET['jsonmsg'];} ?></b></div>
	<fieldset>
		<legend style="font-family: Raleway; font-size: 20px; color: #4d0000;">Contact</legend>
	<form method="post" action="<?php echo htmlspecialchars('controler/contactControler.php');?>">
		<label for="name" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Name </label>
    <input type="text" id="name" name="name" placeholder="Your Full Name" style="width: 40%;">
    <span class="error"><?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];}?></span><br>

    <label for="email" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Email </label>
    <input type="text" id="email" name="email" placeholder="Your Active Email"  style="width: 40%;">
    <span class="error"><?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span><br>

    <label for="phone" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Phone </label>
    <input type="text" id="phone" name="phone" placeholder="Your Active Phone Number"  style="width: 40%;">
    <span class="error"><?php if(!empty($_GET['phoneErr'])){echo $_GET['phoneErr'];}?></span><br>

	<label for="message" style="font-family: Raleway; font-size: 20px; color: #4d0000;"> Message </label><br>
	<textarea rows="6" cols="100" name="message" id="message" placeholder="Your Query"></textarea><br>
	<span class="error"><?php if(!empty($_GET['messageErr'])){echo $_GET['messageErr'];}?></span><br>
	<input type="submit" name="send" value="Send" style="width: 150px; margin: 20px;"><input type="reset" value="Reset" style="width: 150px;">
	</form>
	</fieldset>
	</div>
</div>


<?php include 'controler/footer.php';?>
</body>
</html>