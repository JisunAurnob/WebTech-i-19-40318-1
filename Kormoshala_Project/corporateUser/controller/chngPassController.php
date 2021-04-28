<?php 
session_start();
require_once ('../model/model.php');
$tableName = 'corporate';
$corpEmployee = showEmployee($tableName, $_SESSION['username']);

$cpassErr = $npassErr = $rpassErr = $dbErr = "";
$cpass = $npass = $rpass = "";
$check = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cpassword"])) {
    $cpassErr = "Current Password is required";
    $check = 0;
  }
  else if (!strcmp($corpEmployee['Password'], $_POST["cpassword"])==0) {
      $cpassErr = " Password is incorrect.Please Enter Your Current Password";
     $check = 0;
      $cpass ="";
    } 
  else {
    $cpass = $_POST["cpassword"];
      if (empty($_POST["npassword"])) {
    $npassErr = "Enter The New Password";
   $check = 0;
  } else {
    $npass = test_input($_POST["npassword"]);
    if (strlen($npass)<8) {
      $npassErr = "Password must be contain at least 8 charecters";
     $check = 0;
       $npass ="";
    }
    else if (!preg_match('@[^\w]@',$npass)) {
      $npassErr = "Password must contain at least one of the special characters (@, #, $,%,*)";
      $check = 0;
       $npass ="";
    }
    else if (strcmp($cpass, $npass)==0) {
      $npassErr = "New Password should not be same as the Current Password";
      $check = 0;
       $npass ="";
    }
  }

  if (empty($_POST["rpassword"])) {
    $rpassErr = "Retype new Password";
    $check = 0;
  } else {
    $rpass = test_input($_POST["rpassword"]);
    if (!strcmp($npass, $rpass)==0) {
      $rpassErr = "New Password & Retyped Password Dosen't Match";
     $check = 0;
      $rpass ="";
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
if($check==1){
  if(isset($_POST['submit'])) {
  $data['Password'] = $_POST['rpassword'];

  if (changePassword($tableName, $_SESSION['username'], $data)) {
    header('Location: ../view/viewprofile.php?successMsg=' . 'Password Changed Successfully');
  }
  else{
    $dbErr = "Password isn't Not Changed";
    $check = 0;
  }
}
}
if($check==0){
    $args = array(
    'cpassErr' => $cpassErr,
    'npassErr' => $npassErr,
    'rpassErr' => $rpassErr,
    'dbErr' => $dbErr
);
      header("location:../view/changepassword.php?" . http_build_query($args));
   }

?>