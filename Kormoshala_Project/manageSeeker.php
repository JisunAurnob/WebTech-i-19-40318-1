<?php 
session_start();
if(isset($_SESSION['username'])){ 
	require_once 'controler/manageSeekerControler.php';
	$tableName = 'seekers';
	$seekers = fetchAllSeekers($tableName);
	?>
<!DOCTYPE html>
<html>
<head>
	 <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Manage Seeker</title>
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

 <h1 style="font-family: cursive; font-size: 30px; color: #008fb3"><center>Seekers</center></h1>
 <table style="width:100%">
	<thead>
		<tr>
			<th>Name</th>
			<th>Userame</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Gender</th>
			<th>Date Of Birth</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($seekers as $i => $seeker): ?>
			<tr>
				<td><?php echo $seeker['name']; ?></td>
				<?php
    			$args = array(
    			'username' => $seeker['username'],
    			'tableName' => 'seekers'
				);
   				?>
				<td><a class='headerButton' href=<?php echo "userProfile.php?". http_build_query($args) ?>><?php echo $seeker['username']; ?></a></td>
				<td><?php echo $seeker['email']; ?></td>
				<td><?php echo $seeker['phone']; ?></td>
				<td><?php echo $seeker['gender']; ?></td>
				<td><?php echo $seeker['dob']; ?></td>
				<td><a href="editSeeker.php?username=<?php echo $seeker['username']; ?>">Edit</a>&nbsp&nbsp<a href="controler/deleteSeeker.php?username=<?php echo $seeker['username']; ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <?php include 'controler/footer.php';?>
</body>
</html>
<?php }
else{
$msg="<script>alert('You Have To Login First To Access This Page!')</script>";
    header("location:login.php?alert=" . $msg);
}
 ?>