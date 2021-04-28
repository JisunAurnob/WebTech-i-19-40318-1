<?php 
session_start();
if(isset($_SESSION['username'])){ 
	require_once 'controler/manageFreelanceEmployerControler.php';
	$tableName = 'freelancers';
	$freelancers = fetchAllfreelancers($tableName);
	?>
<!DOCTYPE html>
<html>
<head>
	 <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Manage Freelance Employer</title>
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
 ?>

<h1 style="font-family: cursive; font-size: 30px; color: #008fb3"><center>Freelance Employers</center></h1>
 <table style="width:100%">
	<thead>
		<tr>
			<th>Name</th>
			<th>Userame</th>
			<th>Email</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($freelancers as $i => $freelancer): ?>
			<tr>
				<td><?php echo $freelancer['name'];; ?></td>
				<?php
    			$args = array(
    			'username' => $freelancer['username'],
    			'tableName' => 'freelancers'
				);
   				?>
				<td><a class='headerButton' href=<?php echo "userProfile.php?". http_build_query($args) ?>><?php echo $freelancer['username']; ?></a></td>
				<td><?php echo $freelancer['email']; ?></td>
				<td><?php echo $freelancer['address'];; ?></td>
				<td><?php echo $freelancer['phone'];; ?></td>
				<td><a href="editFreelanceEmployer.php?username=<?php echo $freelancer['username']; ?>">Edit</a>&nbsp&nbsp<a href="controler/deleteFreelancer.php?username=<?php echo $freelancer['username']; ?>">Delete</a></td>
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