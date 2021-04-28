<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
	<title>About</title>
</head>
<body>
<?php include 'controler/header.php';?>
  <center><p style="font-size: 40px;">Our Official Email Link: <a style="color: red;">support@kormoshala.com</a> <br>
    Our Developers And There Details Are Below:<br> </p> </center>
  <?php   
  $data = file_get_contents("C:/xampp/htdocs/Web Technologies/Project/resources/about.json");  
  $data = json_decode($data, true);  
  foreach($data as $row)  
  {  
  echo "<center><hr><p class='zoom'>
  Name: ".$row['name']."<br>
  Email: ".$row['email']."<br>
  Phone: ".$row['phone']."<br>
  <a href='".$row['linkedin']."'>Linkedin</a></p><hr></center>";  
  }  
  ?>
<br><br><br>
<?php include 'controler/footer.php';?>
</body>
</html>