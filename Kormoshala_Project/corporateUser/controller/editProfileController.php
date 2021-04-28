<?php 
session_start();
require_once '../model/model.php';
$tableName = 'corporate';



$check=1;
$emailErr = $email = $phn = $phnErr = "";
$message = '';  
$error = ''; 

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
    $check=0;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $check=0;
    }
  }

  
if(empty($_POST["phone"])){

  $phnErr="*Phone Number is Required";
  $check=0;
}

else
{
  $phn = test_input($_POST["phone"]);
  //$check=1;

 if(!preg_match("/^[0-9]{11}$/", $phn))
  {
    $phnErr="Please Enter 11 Numeric Value Only";
    $phn=0;
    $check=0;
  }

}


   if($check==0){
    $args = array(
    'emailErr' => $emailErr,
    'phnErr' => $phnErr
);
      header("location:../view/editprofile.php?" . http_build_query($args));
   }
 }

if($check == 1) {
	$data['Email'] = $_POST['email'];
	$data['Phone'] = $_POST['phone'];
  $data['Image'] =$target_file;

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))  {
    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }



  if (updateEmployee($tableName, $_SESSION['username'],$data)) {
  	header("Location: ../view/viewprofile.php?successMsg=" . "Profile Updated Successfully!!");
  }
  else {
	echo '<p>Error</p>';
	header('Location: ../view/editprofile.php');
}
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



 ?>