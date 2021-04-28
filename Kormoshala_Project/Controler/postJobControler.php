<?php
$flag=1;
$jtitleErr = $emailErr = $genderErr = $dobErr = $jtitle = $email = $dob = $gender = "";
$username = $password = "";
$userNameErr = $passErr = $confirmpassErr = $confirmpass = "";
$message = '';  
$error = ''; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["jtitle"])) {
    $jtitleErr = "Job Title is required";
    $flag=0;
    header("location:../postJob.php");
  } else {
    $jtitle = test_input($_POST["jtitle"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$jtitle)) {
      $jtitleErr = "Only letters white space, period & dash allowed";
      $jtitle ="";
      $flag=0;
    }
    else if (str_word_count($jtitle)<2) {
      $jtitleErr = "At least two words needed";
      $jtitle ="";
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
      $email ="";
      $flag=0;
    }
  }

  if (empty($_POST["birthday"])) {
    $dobErr = "DOB is required";
    $flag=0;
  } else {
    $dob = test_input($_POST["birthday"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $flag=0;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["username"])) {
    $userNameErr = "UserName is required";
    $flag=0;
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-._]*$/",$username)) {
      $userNameErr = "Only alpha numeric characters, period, dash or underscore allowed";
      $username ="";
      $flag=0;
    }
    else if (strlen($username)<2) {
      $userNameErr = "At least two charecters needed";
      $username ="";
      $flag=0;
    }
  }
  
  if (empty($_POST["Password"])) {
    $passErr = "Password is required";
    $flag=0;
  } else {
    $password = test_input($_POST["Password"]);
    if (strlen($password)<8) {
      $passErr = "Password must be 8 charecters";
      $password ="";
      $flag=0;
    }
    else if (!preg_match("/[@,#,$,%]/",$password)) {
      $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
      $password ="";
      $flag=0;
    }
  }
  if (empty($_POST["confirmpass"])) {
    $confirmpassErr = "Retype The Current Password";
    $flag=0;
  } else {
    $confirmpass = test_input($_POST["confirmpass"]);
    if (strcmp($password, $confirmpass)==1) {
      $confirmpassErr = "Password & Retyped Password Dosen't Match";
      $confirmpass ="";
      $flag=0;
    }
  } 

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
echo $jtitle."<br>";
?>