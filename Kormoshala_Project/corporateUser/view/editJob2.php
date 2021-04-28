<?php
session_start();
require_once '../controller/showJobController.php';
$tableName='jobs';
$job = fetchJob($tableName, $_GET['Job_id']);
$checkm=$checkf=$checko="";
$govt=$sgovt=$pc=$p=$ngo=$ia=$other="";


   if ($job['Workplace']=="Office")
   {

    $checkf="selected";

   }
   else if($job['Workplace']=="Home")
   {

     $checkm="selected";

   }
   else
   {
    $checko="selected";
   }

   if ($job['JobType']=="Government")
   {

    $govt="selected";

   }
   else if($job['JobType']=="Semi Government")
   {

     $sgovt="selected";

   }
   else if($job['JobType']=="Private Company")
   {
    $pc="selected";
   }
   else if($job['JobType']=="Private")
   {
    $p="selected";
   }
   else if($job['JobType']=="NGO")
   {
    $ngo="selected";
   }
   else if($job['JobType']=="International Agencies")
   {
    $ia="selected";
   }
   else
   {
    $other="selected";
   }

if (isset($_SESSION['username'])) { ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style.css">
  <script type="text/javascript" src="../script/postjob.js" ></script>
    <style>
.error {color: #FF0000;}
</style>
<title>Edit Job</title>
</head>
<body>




<header>

	<?php include '../model/header.php'; ?></header>



<section>
   
  <article>
<form action="../controller/editJobController.php?Job_id=<?php echo $_GET['Job_id'] ?>" method="post" enctype="multipart/form-data">

<fieldset>
<legend><B>EDIT JOB</B></legend>


<div class="row">
    <div class="col-25">
      <label for="jtitle"><b>Job Title</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="jtitle" name="jtitle" value="<?php echo $job['JobTitle'] ?>"   onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
   <span class="error" id="jtitleErr"><?php if(!empty($_GET['jtitleErr'])){echo $_GET['jtitleErr'];}?></span>
  <br><hr> 


<div class="row">
    <div class="col-25">
      <label for="jobdetail"><b>Job Details</b></label>
    </div>
    <div class="col-75">
      <textarea id="jobdetail" name="jobdetail" rows="4" onkeyup="change(this)" onblur="change(this)"><?php echo $job['JobDetail'] ?></textarea>
    </div>
  </div>
  <span class="error"  id="jobdetailErr"><?php if(!empty($_GET['jobdetailErr'])){echo $_GET['jobdetailErr'];}?></span>
  <br><hr>

  <div class="row">
    <div class="col-25">
      <label for="salary"><b>Salary</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="salary" name="salary"  value="<?php echo $job['Salary'] ?>"   onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error"  id="salaryErr"><?php if(!empty($_GET['salaryErr'])){echo $_GET['salaryErr'];}?></span>
  <br><hr>

  
   <div class="row">
    <div class="col-25">
      <label for="emprequire"><b>Employee Requirement</b></label>
    </div>
    <div class="col-75">
      <textarea id="emprequire" name="emprequire" rows="4" onkeyup="change(this)" onblur="change(this)"><?php echo $job['EmployeeRequirement'] ?></textarea>
    </div>
  </div>
  <span class="error" id="emprequireErr"><?php if(!empty($_GET['emprequireErr'])){echo $_GET['emprequireErr'];}?></span>
  <br><hr>


  <div class="row">
    <div class="col-25">
      <label for="vacancy"><b>Vacancy</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="vacancy" name="vacancy"  value="<?php echo $job['Vacancy'] ?>"   onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
   <span class="error" id="vacancyErr"><?php if(!empty($_GET['vacancyErr'])){echo $_GET['vacancyErr'];}?></span>
  <br><hr>

  <div class="row">
    <div class="col-25">
      <label for="location"><b>Location</b></label>
    </div>
    <div class="col-75">
      <textarea id="location" name="location"  rows="4" onkeyup="change(this)" onblur="change(this)"><?php echo $job['Location'] ?></textarea>
    </div>
  </div>
  <span class="error"  id="locationErr"><?php if(!empty($_GET['locationErr'])){echo $_GET['locationErr'];}?></span>
  <br><hr>

 
 <div class="row">
      <div class="col-25">
        <label for="workplace"><b>Workplace</b></label>
      </div>
      <div class="col-75">
        <select id="workplace" name="workplace" ?> onblur="change(this)" onclick="change(this)">
          <option  name="workplace" value="" disabled selected>Select a Workplace</option>
          <option  name="workplace" value="Office"<?php echo "$checkf"?>>Office</option>
          <option  name="workplace" value="Home"<?php echo "$checkm"?>>Home</option>
          <option  name="workplace" value="Others" <?php echo "$checko"?>>Others</option>
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
        <select id="jobtype" name="jobtype"  onblur="change(this)" onclick="change(this)">
          <option value="" disabled selected>Select A Job Type</option>
          <option value="Government" <?php echo "$govt"?>>Government</option>
          <option value="Semi Government" <?php echo "$sgovt"?>>Semi Government</option>
          <option value="Private Company" <?php echo "$pc"?>>Private Company</option>
          <option value="Private" <?php echo "$p"?>>Private</option>
          <option value="NGO" <?php echo "$ngo"?>>NGO</option>
          <option value="International Agencies" <?php echo "$ia"?>>International Agencies</option>
          <option value="Others" <?php echo "$other"?>>Others</option>
        </select>
      </div>
    </div>
  <span class="error"  id="jobtypeErr"><?php if(!empty($_GET['jobtypeErr'])){echo $_GET['jobtypeErr'];}?></span>
  <br><br>
  <hr>

  <input type='submit'  class="registerbtn" name='Save' value='Save'>  <input type="reset" class="registerbtn" value="Reset">
  


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

