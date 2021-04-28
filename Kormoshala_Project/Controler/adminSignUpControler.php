<?php
require_once ('../model/model.php');
$tableName = 'users';

$flag=1;
$nameErr = $emailErr = $genderErr = $dobErr = $name = $email = $dob = $gender = "";
$username = $password = "";
$userNameErr = $passErr = $confirmpassErr = $confirmpass = "";
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
    else if(checkUsername($tableName, $username)){
      $userNameErr = "Username Already Existed! Please Use Different Username";
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
    'userNameErr' => $userNameErr,
    'passErr' => $passErr,
    'confirmpassErr' => $confirmpassErr,
    'genderErr' => $genderErr,
    'dobErr' => $dobErr
);
      header("location:../adminSignUp.php?" . http_build_query($args));
   }
if($flag==1){
if(isset($_POST['signup'])) {
  $data['name'] = $name;
  $data['email'] = $email;
  $data['username'] = $username;
  $data['password'] = $confirmpass;
  $data['gender'] = $gender;
  $data['dateofbirth'] = $dob;
  $data['profilepicture'] = "resources/uploads/".$username.".jpg";
  $data['userType'] = 'admin';
  if (addUser($tableName, $data)) {
    echo '<p>User Successfully added!!</p><br>';
  }
  else{
        $dberror = '<br><label>Data Not stored in database<br>';
           header("location:../adminSignUp.php?jsonmsg=" . $dberror);  
  }
}
}

 if ($flag==1) {
  if(isset($_POST["signup"]))  
    {
  if(file_exists('C:/xampp/htdocs/Web Technologies/Project/resources/data.json'))
    {
      $current_data = file_get_contents('C:/xampp/htdocs/Web Technologies/Project/resources/data.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array(  
                 'name'               =>     $_POST['name'],
                 'email'          =>     $_POST["email"],
                 'username'          =>     $_POST["username"],
                 'password'          =>     $_POST["confirmpass"],  
                 'gender'          =>     $_POST["gender"],  
                 'dateOfBirth'     =>     $_POST["birthday"]  
                );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('C:/xampp/htdocs/Web Technologies/Project/resources/data.json', $final_data))  
            {  
                 $message = "<label>Data Recorded Successfully<br>";
                 header("location:../login.php?jsonmsg=" . $message);  
            }  
        }  
        else  
        {  
           $jsonerror = '<br><label>JSON File not exits<br>';
           header("location:../adminSignUp.php?jsonmsg=" . $jsonerror);  
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
?>