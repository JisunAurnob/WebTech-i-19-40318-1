<?php 
session_start();
if(isset($_SESSION['username'])){

require_once 'controler/manageCorporateEmployerControler.php';
$tableName = 'corporate';
$corpEmps = fetchAllCorporateEmp($tableName);

?>
<!DOCTYPE html>
<html>
<head>
	 <link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>Manage Corporate Employer</title>
	<style>
	table, th, td {
  	border: 1px solid black;
	}
	th, td {
  	padding: 15px;
	}
</style>
<script>
	function deleteConfirm(str) {
  	var txt;
  	if (confirm("Are You Sure? Delete This User?")) {
    txt = "controler/deleteCorpUser.php?username=";
    document.getElementById("del").href = txt.concat(str);
  	} 
  	else {
    document.getElementById("del").href = "manageCorporateEmployer.php";
  	}
	}
</script>
</head>
<body>
<?php 
	include 'controler/header.php';
 ?>
<h3 style="color: red;"><?php if(!empty($_GET['username'])){echo $_GET['username'];} ?></h3>
<h1 style="font-family: cursive; font-size: 30px; color: #008fb3"><center>Corporate Employers</center></h1>
 <table style="width:100%">
	<thead>
		<tr>
			<th>Company Name</th>
			<th>Userame</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Trade License No.</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
				<?php foreach ($corpEmps as $i => $corpEmp): ?>
			<tr>
				<td><?php echo $corpEmp['CompanyName']; ?></td>
				<?php
    			$args = array(
    			'username' => $corpEmp['Username'],
    			'tableName' => 'corporate'
				);
   				?>
				<td><a class='headerButton' href=<?php echo "userProfile.php?". http_build_query($args) ?>><?php echo $corpEmp['Username']; ?></a></td>
				<td><?php echo $corpEmp['Email']; ?></td>
				<td><?php echo $corpEmp['Phone']; ?></td>
				<td><?php echo $corpEmp['CompanyAddress']; ?></td>
				<td><?php echo $corpEmp['TradeLicense']; ?></td>
				<td><a href="editCorporateEmployer.php?username=<?php echo $corpEmp['Username']; ?>">Edit</a>&nbsp&nbsp<!-- <a href="" id="del" onclick="deleteConfirm('<?php echo $corpEmp['Username']; ?>')">Delete</a> --><a href="controler/deleteCorpUser.php?username=<?php echo $corpEmp['Username']; ?>">Delete</a></td>
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