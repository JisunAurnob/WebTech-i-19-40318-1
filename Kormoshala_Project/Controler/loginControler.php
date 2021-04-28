<?php
require_once ('../model/model.php');
$userNameErr = $passErr = "";
$username = $password = "";
$flag=1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $userNameErr = "UserName is required";
    $flag=0;
  } else {
    $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["Password"])) {
    $passErr = "Password is required";
    $flag=0;
  } else {
    $password = test_input($_POST["Password"]);
  }
  
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($flag==0){
    $args = array(
    'userNameErr' => $userNameErr,
    'passErr' => $passErr
);
      header("location:../login.php?" . http_build_query($args));
   }


session_start();

if ($flag==1) {

  if(loginCheck('users', $username, $password)){
    $_SESSION['username'] = $username; 
    if(isset($_POST['rememberMe'])){
    setcookie('admin' , $username, time() + (86400 * 30), "/");
    }
    header("location:../admin.php");
  }
  else if (loginCheck('seekers', $username, $password)) {
    $_SESSION['username'] = $username;
  if(isset($_POST['rememberMe'])){
    setcookie('seeker' , $username, time() + (86400 * 30), "/");
  }
    header("location:../seekerUser/JOBSEEKERprofile.php");
  }
  else if (loginCheck('freelancers', $username, $password)) {
    $_SESSION['username'] = $username;
  if(isset($_POST['rememberMe'])){
    setcookie('pemp' , $username, time() + (86400 * 30), "/");
  }
    header("location:../freelanceUser/View/dashboardStudentView.php");
  }
  else if (loginCheck('corporate', $username, $password)) {
    $_SESSION['username'] = $username;
  if(isset($_POST['rememberMe'])){
    setcookie('cemp' , $username, time() + (86400 * 30), "/");
  }
    header("location:../corporateUser/view/corporateEmployer.php");
  }
	else{
		$msg="<script>alert('User Name Or Password Incorrect!')</script>";
    header("location:../login.php?alert=" . $msg);
	}

}

 ?>