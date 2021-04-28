<?php

require_once '../model/model.php';
$tableName = 'corporate';

$compnameErr = $emailErr = $phn =$compadrsErr =$usernameErr=$passErr= $cpassErr=$jobtypeErr=$licenseErr="";
$compname = $email = $phnErr = $compadrs  =$username=$pass=$cpass=$jobtype =$license="";
$check=1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    //username
  if (empty($_POST["username"])) {
    $usernameErr = "*User Name cannot be Empty";
   
     $check=0;
  } else {

     $username =test_input($_POST["username"]);
     //$check=1;

    if(strlen($username)<2)
    {
       $usernameErr = "*must contain 2 characters";
      
       $username="";
        $check=0;
    }

     else if(checkUsername($tableName, $username)){
      $usernameErr = "Username Already Existed! Please Try Another Username";
      $username ="";
      $check=0;
    }
   
  }



//email



  if (empty($_POST["email"])) {
    $emailErr = "*Email cannot be Empty";
     $check=0;
  } else {
    $email = test_input($_POST["email"]);
    //$check=1;
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "*Invalid format. Format would be anything@example.com";
      $email="";
       $check=0;
    }
  }



//phone


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

//password

     if(empty($_POST["password"])){
    $passErr="*Password can't be empty";
    $check=0;
  }
  else {

       $pass =$_POST["password"];
       //$check=1;
     
       if(strlen($pass)<8)
       {
        $passErr="*must contain at least 8 charaters";
        $pass="";
        $check=0;
       }
       
      else if (!preg_match('@[^\w]@', $pass)) {
      $passErr = "*must contain one special character";
      $pass="";
      $check=0;

    }

  }
    
       if(empty($_POST["cpassword"]))
       {
        $cpassErr="*Please Confirm your password";
        $cpass="";
        $check=0;
       }
       else
       {
        $cpass =$_POST["cpassword"];
        //$check=1;
        if(!strcmp($pass, $cpass)==0)
        {
          $cpassErr="*Password must match";
          $cpass="";
          $check=0;
        }
       }


//company name

       if (empty($_POST["compname"])) {
    $compnameErr = "*Company Name cannot be Empty";
     $check=0;
  } else {

     $compname =test_input($_POST["compname"]);
    // $check=1;

    if (!preg_match("/^[a-zA-Z-'._ ]*$/",$compname)) {
      $compnameErr = "*Can contain a-z,A-Z,period,dash,underscrone only";
      $compname="";
      $check=0;

    }

    else if(str_word_count($compname)<1)
    {
       $compnameErr = "*must contain 1 word";
       $compname="";
        $check=0;
    }
   
  }

  //company address

            if (empty($_POST["compaddress"])) {
   $compadrsErr = "*Company Address cannot be Empty";
     $check=0;
  } else {

     $compadrs =test_input($_POST["compname"]);
     //$check=1;

    // if (!preg_match("/^[a-zA-Z-'._ ]*$/",$compadrs)) {
    //  $compadrsErr= "*Can contain a-z,A-Z,period,dash,underscrone only";
    //   $compadrs="";
    //   $check=0;

    // }

    if(strlen($compadrs)<2)
    {
       $compadrsErr = "*must contain 5 characters";
       $compadrs="";
        $check=0;
    }
   
  }
  

//jobtype

//   if(empty($_POST['jobtype'])){
// $jobtypeErr = "You must select a Job Type";
// $check=0;
// }
// else{
//  $jobtype= test_input($_POST["jobtype"]);
//  //$check=1;
// }


//tradelicense

  
 
if(empty($_POST["license"])){

  $licenseErr="*Trade Number is Required";
  $check=0;
}

else
{
  $license= test_input($_POST["license"]);
  //$check=1;

   if(!preg_match("/^[0-9]{10}$/", $license)){
    $licenseErr="*Please Enter At least 10 Numeric value.";
    $license="";
    $check=0;
  }

}




if($check==0){
    $value = array(
    'userNameErr' => $usernameErr,
    'passErr' => $passErr,
    'emailErr' => $emailErr,
    'compnameErr' => $compnameErr,
    'cpassErr' => $cpassErr,
    'licenseErr' => $licenseErr,
    'phnErr' => $phnErr,
    'compadrsErr' => $compadrsErr

);
      header("location:../view/corporateEmployerReg.php?" . http_build_query($value));
   }



 if($check == 1 )
 {




   if(isset($_POST["submit"])){

  $data['Username'] = $_POST['username'];
  $data['Email'] = $_POST['email'];
  $data['Phone'] = $_POST['phone'];
  $data['CompanyName'] = $_POST['compname'];
  $data['CompanyAddress'] = $_POST['compaddress'];
  $data['TradeLicense'] = $_POST['license'];
  $data['Password'] = $_POST['cpassword'];
  $data['Image'] = "uploads/".$username.".jpg";

  // $target_dir = "../uploads/";
  // $target_file = $target_dir . basename($_FILES["image"]["name"]);

  // if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
  //   echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
  // } else {
  //   echo "Sorry, there was an error uploading your file.";
  // }

  if (addCorporateEmployee($tableName,$data)) {
    header('Location: ../view/welcome.php?successMsg=' . 'Sign Up Successfully');
  }
   else{
        $dberror = '<br><label>Data Not stored in database<br>';
           header("location:../view/corporateEmployerReg.php?jsonmsg=" . $dberror);  
  }


   }

    else {
  echo 'You are not allowed to access this page.';
}
   // {
   //  if(file_exists('C:/xampp/htdocs/WT Lab Task/mid project/data/data.json'))  
    
   //         {  
   //              $current_data = file_get_contents('C:/xampp/htdocs/WT Lab Task/mid project/data/data.json');  
   //              $array_data = json_decode($current_data, true);  
   //              $extra = array(  
   //                   'User Name'         =>        $_POST['username'],
   //                   'Email'             =>        $_POST['email'],
   //                   'Phone'             =>        $_POST['phone'],
   //                   'Password'          =>        $_POST['cpassword'],
   //                   'Company Name'      =>        $_POST['compname'],
   //                   'Company Address'   =>        $_POST['compaddress'],
   //                   'Job type'          =>        $_POST['jobtype'],     
   //                   'Trade License'     =>        $_POST['license'] 
   //              );  
   //              $array_data[] = $extra;  
   //              $final_data = json_encode($array_data);  
   //              if(file_put_contents('C:/xampp/htdocs/WT Lab Task/mid project/data/data.json', $final_data))  
   //              {  
   //                   $message = "<label class='text-success'>File Appended Success fully</p>";  
   //                   header("location:loginpage.php");
   //              }  
   //         }  
   //         else  
   //         {  
   //              $error = 'JSON File not exits';  
   //         } 
   // }
 }
            




}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>