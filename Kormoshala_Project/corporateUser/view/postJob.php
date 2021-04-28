<?php
session_start();
if (isset($_SESSION['username'])) { ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../style.css">
  <script type="text/javascript" src="../script/postjob.js" ></script>
	<style>
.error {color: #FF0000;}
</style>
	<title>Post Jobs</title>
</head>
<body>
<header>
    <?php include '../model/header.php';?>
  
</header>
  
<section>
  <article>
    <form method="post" action="../controller/postJobController.php">
  <fieldset>
<legend><b>POST JOB</b></legend><!-- <div style="float: left; text-align: right;"> -->

<div class="row">
    <div class="col-25">
      <label for="jtitle"><b>Job Title</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="jtitle" name="jtitle" placeholder="Job title.."  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="jtitleErr"><?php if(!empty($_GET['jtitleErr'])){echo $_GET['jtitleErr'];}?></span>
  <br><hr>

  <div class="row">
    <div class="col-25">
      <label for="jobdetail"><b>Job Details</b></label>
    </div>
    <div class="col-75">
      <textarea id="jobdetail" name="jobdetail" placeholder="Write something.." rows="4"   onkeyup="change(this)" onblur="change(this)"></textarea>
    </div>
  </div>
  <span class="error" id="jobdetailErr"><?php if(!empty($_GET['jobdetailErr'])){echo $_GET['jobdetailErr'];}?></span>
  <br><hr>

<div class="row">
    <div class="col-25">
      <label for="salary"><b>Salary</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="salary" name="salary" placeholder="salary.."   onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="salaryErr" ><?php if(!empty($_GET['salaryErr'])){echo $_GET['salaryErr'];}?></span>
  <br><hr>

  <div class="row">
    <div class="col-25">
      <label for="emprequire"><b>Employee Requirement</b></label>
    </div>
    <div class="col-75">
      <textarea id="emprequire" name="emprequire" placeholder="Write something.." rows="4"   onkeyup="change(this)" onblur="change(this)"></textarea>
    </div>
  </div>
  <span class="error" id="emprequireErr"><?php if(!empty($_GET['emprequireErr'])){echo $_GET['emprequireErr'];}?></span>
  <br><hr>

  <div class="row">
    <div class="col-25">
      <label for="vacancy"><b>Vacancy</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="vacancy" name="vacancy" placeholder="vacancy.."   onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="vacancyErr" ><?php if(!empty($_GET['vacancyErr'])){echo $_GET['vacancyErr'];}?></span>
  <br><hr>

  <div class="row">
    <div class="col-25">
      <label for="location"><b>Location</b></label>
    </div>
    <div class="col-75">
      <textarea id="location" name="location" placeholder="Write something.." rows="4"   onkeyup="change(this)" onblur="change(this)"></textarea>
    </div>
  </div>
  <span class="error" id="locationErr" ><?php if(!empty($_GET['locationErr'])){echo $_GET['locationErr'];}?></span>
  <br><hr>

  <div class="row">
      <div class="col-25">
        <label for="workplace"><b>Workplace</b></label>
      </div>
      <div class="col-75">
        <select id="workplace" name="workplace"  onblur="change(this)" onclick="change(this)">
          <option id="workplace" name="workplace" value="" disabled selected>Select a Workplace</option>
          <option id="workplace" name="workplace" value="Office">Office</option>
          <option id="workplace" name="workplace" value="Home">Home</option>
          <option id="workplace" name="workplace" value="Others">Others</option>
        </select>
      </div>
    </div>
  <span class="error" id="workplaceErr"><?php if(!empty($_GET['workplaceErr'])){echo $_GET['workplaceErr'];}?></span>
  <br><hr>

<div class="row">
      <div class="col-25">
        <label for="jobtype"><b>Job Type</b></label>
      </div>
      <div class="col-75">
        <select id="jobtype" name="jobtype" onblur="change(this)" onclick="change(this)">
          <option value="" disabled selected >Select A Job Type</option>
          <option value="Government" >Government</option>
          <option value="Semi Government" >Semi Government</option>
          <option value="Private Company" >Private Company</option>
          <option value="Private" >Private</option>
          <option value="NGO" >NGO</option>
          <option value="International Agencies" >International Agencies</option>
          <option value="Others">Others</option>
        </select>
      </div>
    </div>
  <span class="error" id="jobtypeErr"><?php if(!empty($_GET['jobtypeErr'])){echo $_GET['jobtypeErr'];}?></span>
  <br><br>
  <hr>
 
  <input type="submit" class="registerbtn" name="submit" value="Submit"> <input type="reset" class="registerbtn" value="Reset"><!-- </div> -->
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