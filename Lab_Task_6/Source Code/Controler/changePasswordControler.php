<?php 
session_start();
require_once ('../model/model.php');
$tableName = 'users';
$userData = showUser($tableName, $_SESSION['username']);

$cpassErr = $npassErr = $rtnpassErr = $dbErr = "";
$cpass = $npass = $rtnpass = "";
$flag = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cpass"])) {
    $cpassErr = "Current Password is required";
    $flag = 0;
  }
  else if (!strcmp($userData['password'], $_POST["cpass"])==0) {
      $cpassErr = "Current Password is incorrect";
      $flag = 0;
      $cpass ="";
    } 
  else {
    $cpass = $_POST["cpass"];
      if (empty($_POST["npass"])) {
    $npassErr = "Enter The New Password";
    $flag = 0;
  } else {
    $npass = test_input($_POST["npass"]);
    if (strlen($npass)<8) {
      $npassErr = "Password must be 8 charecters";
      $flag = 0;
       $npass ="";
    }
    else if (!preg_match("/[@,#,$,%]/",$npass)) {
      $npassErr = "Password must contain at least one of the special characters (@, #, $,%)";
      $flag = 0;
       $npass ="";
    }
    else if (strcmp($cpass, $npass)==0) {
      $npassErr = "New Password should not be same as the Current Password";
      $flag = 0;
       $npass ="";
    }
  }

  if (empty($_POST["rtnpass"])) {
    $rtnpassErr = "Retype The New Password";
    $flag = 0;
  } else {
    $rtnpass = test_input($_POST["rtnpass"]);
    if (!strcmp($npass, $rtnpass)==0) {
      $rtnpassErr = "New Password & Retyped Password Dosen't Match";
      $flag = 0;
      $rtnpass ="";
    }
  }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($flag==1){
	if(isset($_POST['submit'])) {
	$data['password'] = $_POST['rtnpass'];

  if (updatePassword($tableName, $_SESSION['username'], $data)) {
  	header('Location: ../adminProfile.php?successMsg=' . 'Password Changed Successfully');
  }
  else{
  	$dbErr = "Password Not Changed";
  	$flag = 0;
  }
}
}
if($flag==0){
    $args = array(
    'cpassErr' => $cpassErr,
    'npassErr' => $npassErr,
    'rtnpassErr' => $rtnpassErr,
    'dbErr' => $dbErr
);
      header("location:../changePassword.php?" . http_build_query($args));
   }

?>