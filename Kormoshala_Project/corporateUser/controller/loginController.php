
<?php
  session_start();
  require_once '../model/model.php';
  $usernameErr=$passErr="";
  $username=$pass="";
  $check=1;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "*User Name is Required";
    $check=0;
  } else {

     $username =$_POST["username"];

    // if (!preg_match("/^[a-zA-Z-'._ ]*$/",$username)) {
    //   $usernameErr = "*Can contain a-z,A-Z,period,dash,underscrone only";
    //   $username="";

    // }

    // else if(strlen($username)<2)
    // {
    //    $usernameErr = "*username format error";
    //    $username="";
    // }
   

  }

  if(empty($_POST["password"])){
    $passErr="*Please Enter Password";
    $check=0;
  }
  else {

       $pass =$_POST["password"];
      

    }

  }

if($check==0){
    $args = array(
    'usernameErr' => $usernameErr,
    'passErr' => $passErr
);
      header("location:../view/loginpage.php?" . http_build_query($args));
   }


 if ($check==1) {

    if(loginCheck('corporate', $username, $pass)){
    $_SESSION['username'] = $username;
     header("location:../view/corporateEmployer.php");
     }

else{
    $msg="User Name Or Password Incorrect!";
    header("location:../view/loginpage.php?alert=" . $msg);
  }
 }

// $username="jahnnabi";
// $pass="admin";


// if (isset($_POST['username'])) {
//   if ($_POST['username']==$username && $_POST['password']==$pass) {
//     $_SESSION['username'] = $username;
//     header("location:../corporateEmployer.php");
//   }
//   else{
//     $msg="invalid username or password ";
//     echo "<script>alert('UserName or password incorrect!')</script>";
//   }

// }



  ?>
