<?php 
session_start();
if(isset($_SESSION['username'])){ ?>
<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
  <style>
	table, th, td {
  	border: 1px solid black;
	}
	th, td {
  	padding: 15px;
	}
</style>
	<title>Manage Queries</title>
</head>
<body>
<?php include 'controler/header.php';?> <center>             
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Name</th> 
                               <th>Email</th>  
                               <th>Phone</th>
                               <th>Message</th>   
                          </tr>  
                          <?php   
                          $data = file_get_contents("C:/xampp/htdocs/Web Technologies/Project/resources/contacts.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {  
                               echo '<tr>
                               <td>'.$row["name"].'</td>
                               <td>'.$row["email"].'</td>
                               <td>'.$row["phone"].'</td>
                               <td>'.$row["message"].'</td>
                               </tr>';  
                          }  
                          ?>  
                     </table>  
                   </div></center>
<?php include 'controler/footer.php';?>
</body>
</html>
<?php }
else{
$msg="<script>alert('You Have To Login First To Access This Page!')</script>";
    header("location:login.php?alert=" . $msg);
}
 ?>