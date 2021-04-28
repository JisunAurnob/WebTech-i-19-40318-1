<?php 
session_start();
if(isset($_SESSION['username'])){ 
  require_once ('model/model.php');
  $tableName = 'jobs';
  $id = $_GET['id'];
  $job = showJob($tableName, $id);
?>
<!DOCTYPE html>
<html>
<head>
	 <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Profile</title>
</head>
<body>
<?php 
	include 'controler/header.php';
 ?>

<fieldset>
<legend><B>USER PROFILE</B></legend>
	<div style= 'margin-right: 750px;float: left; text-align: left;color: green;'> Job Id:<?php echo $id; ?><hr>
	<br>Job Title: <?php echo  $job['JobTitle'] ?><hr>
	<br>Company Name: <?php echo  $job['cname']; ?><hr>
	<br>Job Details: <?php echo $job['JobDetail']; ?><hr>
	<br>Salary: <?php echo $job['Salary']; ?></hr>
	<br>Employee Requirement: <?php echo $job['EmployeeRequirement']; ?><hr>
	<br>Vacancy: <?php echo $job['Vacancy']; ?><hr>
	<br>Location: <?php echo $job['Location']; ?><hr>
	<br>Workplace: <?php echo $job['Workplace']; ?><hr>
	<br>Job Type: <?php echo $job['JobType']; ?><hr>
	<br>Posted By: <?php echo $job['PostedBy']; ?><hr>
	<br>Job Status: <?php echo $job['JobStatus']; ?><hr>
	<br><a class='button' href="jobApplication.php">Apply!</a><br>
	</div>
	<div style= 'float: right;position: absolute;left:500px; top: 180px;color: green;'>
	<fieldset>
<img src="<?php echo 'resources/uploads/'.$_GET['jobId'].'.jpg' ?>" alt='Logo' width='180' height='200'><br>
  <br><hr>
</fieldset>
	</div></fieldset>
 <div><?php include 'controler/footer.php';?></div>
</body>
</html>
<?php }
else{
$msg="<script>alert('You Have To Login First To Access This Page!')</script>";
    header("location:login.php?alert=" . $msg);
}
 ?>