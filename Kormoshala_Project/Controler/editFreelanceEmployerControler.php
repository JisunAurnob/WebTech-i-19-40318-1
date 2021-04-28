<?php
require_once '../model/model.php';
$tableName = 'freelancers';
$freeUsername = $_GET['username'];

$flag=1;
$nameErr = $emailErr = $addressErr = $tradelicenseErr = $name = $email = $dob = $address = "";
$username = $password = "";
$userNameErr = $phoneErr = "";
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
  
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone is required";
    $flag=0;
  } else {
    $phone = test_input($_POST["phone"]);
    if (strlen($phone)>14) {
      $phoneErr = "Phone number must not exceed 14 charecters";
      $phone ="";
      $flag=0;
    }
    else if (preg_match("/[@,#,$,%]/",$phone)) {
      $phoneErr = "Phone number must not contain any of the special characters (@, #, $,%)";
      $phone ="";
      $flag=0;
    }
  }

   if (empty($_POST["address"])) {
    $addressErr = "Address is required";
    $flag=0;
  } else {
    $gender = test_input($_POST["address"]);
  }


   if($flag==0){
    $args = array(
    'nameErr' => $nameErr,
    'emailErr' => $emailErr,
    'phoneErr' => $phoneErr,
    'addressErr' => $addressErr,
    'username' => $freeUsername
);
      header("location:../editFreelanceEmployer.php?" . http_build_query($args));
   }

if($flag == 1) {
  $data['name'] = $_POST['name'];
  $data['email'] = $_POST['email'];
  $data['phone'] = $_POST['phone'];
  $data['address'] = $_POST['address'];

  if (updateFreelancer($tableName, $freeUsername, $data)) {
    header('Location: ../manageFreelanceEmployer.php');
  }
  else {
  echo '<p>Error</p>';
  header('Location: ../editFreelanceEmployer.php?username=<?php echo $freeUsername; ?>');
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