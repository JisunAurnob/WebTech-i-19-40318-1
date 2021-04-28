<?php 
session_start();
if(isset($_SESSION['username'])){ 
	require_once 'controler/managePostsControler.php';
	$tableName = 'jobs';
	$jobs = fetchAllPosts($tableName);
	?>
<!DOCTYPE html>
<html>
<head>
	 <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Manage Posts</title>
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
	include 'controler/header.php';
	//require 'controler/managePostsControler.php';
 ?>
 <h1 style="font-family: cursive; font-size: 30px; color: #008fb3"><center>Posted Jobs</center></h1>
 <table style="width:100%">
	<thead>
		<tr>
			<th>Job ID</th>
			<th>Job Title</th>
			<th>Company Name</th>
			<th>Job Details</th>
			<th>Salary</th>
			<th>Employee Requirement</th>
			<th>Vacancy</th>
			<th>Location</th>
			<th>Workplace</th>
			<th>Job Type</th>
			<th>Posted By</th>
			<th>Job Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($jobs as $i => $job): ?>
			<tr>
				<td><a class='headerButton' href="jobProfile.php?id=<?php echo $job['Job_id']; ?>"><?php echo $job['Job_id']; ?></a></td>
				<td><?php echo $job['JobTitle']; ?></td>
				<td><?php echo $job['cname']; ?></td>
				<td><?php echo $job['JobDetail']; ?></td>
				<td><?php echo $job['Salary']; ?></td>
				<td><?php echo $job['EmployeeRequirement']; ?></td>
				<td><?php echo $job['Vacancy']; ?></td>
				<td><?php echo $job['Location']; ?></td>
				<td><?php echo $job['Workplace']; ?></td>
				<td><?php echo $job['JobType']; ?></td>
				<td><!-- <a class='headerButton' href="userProfile.php?username=<?php echo $job['PostedBy']; ?>"> --><?php echo $job['PostedBy']; ?><!-- </a> --></td>
				<td><?php echo $job['JobStatus']; ?></td>
				<td><a href="postUpdates.php?jobId=<?php echo $job['Job_id']; ?>">Update Status</a>&nbsp&nbsp<a href="controler/deletePost.php?id=<?php echo $job['Job_id']; ?>">Delete</a></td>
			</tr>
			<?php endforeach; ?>
	</tbody>
</table>
 <div><?php include 'controler/footer.php';?></div>
</body>
</html>
<?php }
else{
$msg="<script>alert('You Have To Login First To Access This Page!')</script>";
    header("location:login.php?alert=" . $msg);
}
 ?>