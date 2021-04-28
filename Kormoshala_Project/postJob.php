<!DOCTYPE html>
<html>
<head>
	 <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<style>
.error {color: #FF0000;}
</style>
	<title>Post Jobs</title>
</head>
<body>
<?php 
	echo "<div>";include 'controler/header.php';echo "</div>";
 ?>
  <?php require 'controler/postJobControler.php';
  ?>
<form method="post" action="<?php echo htmlspecialchars('Controler/postJobControler.php');?>">
  <fieldset>
<legend>Post Job:</legend><div style="float: left; text-align: right;">  
  JOB TITLE: <input type="text" name="jtitle">
  <span class="error">* <?php echo $jtitleErr;?></span>
  <br><hr>
  JOB DETAILS: <input type="text" name="username">
  <span class="error">* <?php echo $userNameErr;?></span>
  <br><hr>
  SALARY <input type="text" name="confirmpass">
  <span class="error">* <?php echo $confirmpassErr;?></span>
  <br><hr>
  EMPLOYEE REQUIRMENT <input type="text" name="confirmpass">
  <span class="error">* <?php echo $confirmpassErr;?></span>
  <br><hr>
  VACANCY <input type="text" name="confirmpass">
  <span class="error">* <?php echo $confirmpassErr;?></span>
  <br><hr>
  LOCATION <input type="text" name="confirmpass">
  <span class="error">* <?php echo $confirmpassErr;?></span>
  <br><hr>
  WORKPLACE <input type="text" name="confirmpass">
  <span class="error">* <?php echo $confirmpassErr;?></span>
  <br><hr>JOB TYPE:
  <select name="jobtype">
  <option name="jobtype" value="">Select A Job Type</option>
  <option name="jobtype" value="Government">Government</option>
  <option name="jobtype" value="Semi Government">Semi Government</option>
  <option name="jobtype" value="Private Company">Private Company</option>
  <option name="jobtype" value="Private">Private</option>
  <option name="jobtype" value="NGO">NGO</option>
  <option name="jobtype" value="International Agencies">International Agencies</option>
  <option name="jobtype" value="Others">Others</option>
  </select>
  <span class="error">* <?php //echo $bgErr;?></span>
  <br><br>
  <hr>
 
  <input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"></div>
</fieldset>
</form>

 <div><?php include 'controler/footer.php';?></div>
</body>
</html>