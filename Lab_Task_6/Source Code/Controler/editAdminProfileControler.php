<?php 
session_start();
require_once '../model/model.php';
$tableName = 'users';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$flag=1;
$nameErr = $emailErr = $genderErr = $dobErr = $name = $email = $dob = $gender = "";
$message = '';  
$error = ''; 



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $flag=0;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$name)) {
      $nameErr = "Only letters white space, period & dash allowed";
      $flag=0;
    }
    else if (str_word_count($name)<2) {
      $nameErr = "At least two words needed";
      $flag=0;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $flag=0;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $flag=0;
    }
  }

   if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $flag=0;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["birthday"])) {
    $dobErr = "DOB is required";
    $flag=0;
  } else {
    $dob = test_input($_POST["birthday"]);
  }


   if($flag==0){
    $args = array(
    'nameErr' => $nameErr,
    'emailErr' => $emailErr,
    'genderErr' => $genderErr,
    'dobErr' => $dobErr
);
      header("location:../editAdminProfile.php?" . http_build_query($args));
   }
}

if($flag == 1) {
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['dateofbirth'] = $_POST['birthday'];
	$data['gender'] = $_POST['gender'];

  if (updateAdmin($tableName, $_SESSION['username'], $data)) {
  	header('Location: ../editAdminProfile.php');
  }
  else {
	echo '<p>Error</p>';
	header('Location: ../editAdminProfile.php');
}
}

 ?>