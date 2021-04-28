<?php
session_start();
require_once '../controller/showJobController.php';
$tableName='jobs';
$job = fetchJob($tableName, $_GET['Job_id']);

if (isset($_SESSION['username'])) { ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style.css">
<title>Delete Job</title>
</head>
<body>




<header>

	<?php include '../model/header.php'; ?></header>



<section>
   
  <article>

<fieldset>
<legend><B>DELETE JOB</B></legend><div align="left" style="color: red;"> 
  <form action="../controller/deleteController.php?Job_id=<?php echo $_GET['Job_id'] ?>" method="post" enctype="multipart/form-data">
  Job Title: <?php echo $job['JobTitle']; ?><hr>
  <br>
  Job Details: <?php echo $job['JobDetail']; ?><hr>
  <br>
  Company Name: <?php echo $job['cname']; ?><hr>
  <br>
  Salary: <?php echo $job['Salary']; ?> <hr>
  <br>
  Employee Requirement: <?php echo $job['EmployeeRequirement']; ?><hr>
  <br>
  Vacancy: <?php echo $job['Vacancy']; ?><hr>
  <br>
  Location: <?php echo $job['Location']; ?><hr>
  <br>
  Workplace:<?php echo $job['Workplace']; ?><hr>
  <br>
  Job Type:<?php echo $job['JobType']; ?><hr>
  
  <input type='submit' class='registerbtn' name='submit' value='Delete'>
</form>
  
  </div></fieldset>

   
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
