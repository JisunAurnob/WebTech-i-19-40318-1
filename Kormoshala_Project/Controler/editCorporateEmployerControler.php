<?php
require_once '../model/model.php';
$tableName = 'corporate';

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

  // if (empty($_POST["username"])) {
  //   $userNameErr = "UserName is required";
  //   $flag=0;
  // } else {
  //   $username = test_input($_POST["username"]);
  //   if (!preg_match("/^[a-zA-Z-._]*$/",$username)) {
  //     $userNameErr = "Only alpha numeric characters, period, dash or underscore allowed";
  //     $username ="";
  //     $flag=0;
  //   }
  //   else if (strlen($username)<2) {
  //     $userNameErr = "At least two charecters needed";
  //     $username ="";
  //     $flag=0;
  //   }
  // }
  
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

  if (empty($_POST["tradelicense"])) {
    $tradelicenseErr = "Trade License No. is required";
    $flag=0;
  } else {
    $dob = test_input($_POST["tradelicense"]);
  }


   if($flag==0){
    $args = array(
    'username' => $_GET['username'],
    'nameErr' => $nameErr,
    'emailErr' => $emailErr,
    'userNameErr' => $userNameErr,
    'phoneErr' => $phoneErr,
    'addressErr' => $addressErr,
    'tradelicenseErr' => $tradelicenseErr
);
      header("location:../editCorporateEmployer.php?" . http_build_query($args));
   }
// if($flag==1){
// if(isset($_POST['signup'])) {
//   $data['name'] = $name;
//   $data['email'] = $email;
//   $data['username'] = $username;
//   $data['password'] = $confirmpass;
//   $data['gender'] = $gender;
//   $data['dateofbirth'] = $dob;
//   $data['profilepicture'] = "resources/uploads/".$username.".jpg";
//   $data['userType'] = 'admin';
//   if (addUser($tableName, $data)) {
//     echo '<p>User Successfully added!!</p><br>';
//   }
//   else{
//         $dberror = '<br><label>Data Not stored in database<br>';
//            header("location:../adminSignUp.php?jsonmsg=" . $dberror);  
//   }
// }
// }
if($flag == 1) {
  $data['CompanyName'] = $_POST['name'];
  $data['Email'] = $_POST['email'];
  $data['Phone'] = $_POST['phone'];
  $data['CompanyAddress'] = $_POST['address'];
  $data['TradeLicense'] = $_POST['tradelicense'];

  if (updateCorporate($tableName, $_GET['username'], $data)) {
    header('Location: ../manageCorporateEmployer.php');
  }
  else {
  echo '<p>Error</p>';
  header('Location: ../editCorporateEmployer.php');
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