<?php 
session_start();
if(isset($_SESSION['username'])){ 
	require_once ('model/model.php');
	$tableName = 'jobs';
	$jobid = $_GET['jobId'];
	$job = showJob($tableName, $jobid);?>
	?>
<!DOCTYPE html>
<html>
<head>
	 <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Post Updates</title>
	<style>
	table, th, td {
  	border: 1px solid black;
	}
	th, td {
  	padding: 15px;
	}
</style>
</head>
<body>
<?php 
	echo "<div>";include 'controler/header.php';echo "</div>";
	require_once 'controler/managePostsControler.php';
 ?>

<fieldset>
<legend><B>Update Post</B></legend>
<div style= 'margin-right: 750px;float: left; text-align: left;color: green; font-size: 20px;'><b style="color: #668cff">Job Id:</b> <a class='headerButton' href="jobProfile.php?id=<?php echo $_GET['jobId']; ?>"><?php echo $_GET['jobId']; ?></a><hr>
	<br><b style="color: #668cff">Job Title:</b> <?php echo  $job['JobTitle']; ?><hr>
	<br><b style="color: #668cff">Company Name:</b> <?php echo  $job['cname'] ?><hr>
	<br><b style="color: #668cff">Job Title:</b> <?php echo  $job['JobDetail']; ?><hr>
	<br><b style="color: #668cff">Salary:</b> <?php echo  $job['Salary']; ?><hr>
	<br><b style="color: #668cff">Employee Requirements:</b> <?php echo  $job['EmployeeRequirement']; ?><hr>
	<br><b style="color: #668cff">Vacancy:</b> <?php echo  $job['Vacancy'] ?><hr>
	<br><b style="color: #668cff">Location:</b> <?php echo  $job['Location'] ?><hr>
	<br><b style="color: #668cff">Job Type:</b> <?php echo  $job['JobType'] ?><hr>
	<br><b style="color: #668cff">Posted By:</b> <?php echo  $job['PostedBy'] ?><hr>
	<form method="post" action="<?php echo htmlspecialchars('Controler/postUpdatesControler.php?jobid='.$jobid);?>"
	<hr><br><b style="color: #668cff">JOB STATUS:</b>
  	<select name="JobStatus">
  	<option value="approved" <?php if($job['JobStatus']=="approved"){echo "selected";} ?>>Approve</option>
  	<option value="rejected" <?php if($job['JobStatus']=="rejected"){echo "selected";} ?>>Reject</option>
  	<option value="pending" <?php if($job['JobStatus']=="pending"){echo "selected";} ?>>Pending</option>
  	</select><hr><br>
  <input type="submit" name="submit" value="Update"> <input type="reset" value="Reset">
</form>
	</div>
	<div style= 'float: right;position: absolute;left:500px; top: 180px;color: green;'>
	<fieldset>
<img src='resources/propiclogo.png' alt='Profile Picture' width='180' height='200'>
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