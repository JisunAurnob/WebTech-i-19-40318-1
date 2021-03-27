<?php 
session_start();
if(isset($_SESSION['username'])){ ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="design.css">
	<title>Admin</title>
</head>
<body>
<?php 
	echo "<div>";include 'controler/header.php';echo "</div>";
 ?>
  <h1 style="font-family: cursive; font-size: 30px; color: #008fb3"><center>Hello Admin!</center></h1>
 <center>
<div>
	<a class='headerButton'href='manageSeeker.php'>Manage Seeker</a><br><br>
	<a class='headerButton'href='manageCorporateEmployer.php'>Manage Corporate Employer</a><br><br>
	<a class='headerButton'href='manageFreelanceEmployer.php'>Manage Freelance Employer</a><br><br>
	<a class='headerButton'href='managePosts.php'>Manage Posts</a><br><br>
</div>
</center><br><br><br><br><br><br><br><br>
 <div><?php include 'controler/footer.php';?></div>
</body>
</html>
<?php }
else{
$msg="<script>alert('You Have To Login First To Access This Page!')</script>";
    header("location:login.php?alert=" . $msg);
}
 ?>
