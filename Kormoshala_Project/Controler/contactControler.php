<?php

$flag=1;
$nameErr = $emailErr = $phoneErr = $messageErr = $name = $email = $phone = $message = "";
$alert = '';  
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


   if (empty($_POST["message"])) {
    $messageErr = "Message is required";
    $flag=0;
  } else {
    $message = test_input($_POST["message"]);
  }


   if($flag==0){
    $args = array(
    'nameErr' => $nameErr,
    'emailErr' => $emailErr,
    'phoneErr' => $phoneErr,
    'messageErr' => $messageErr
    );
      header("location:../contact.php?" . http_build_query($args));
   }


 if ($flag==1) {
  if(isset($_POST["send"]))  
    {
  if(file_exists('C:/xampp/htdocs/Web Technologies/Project/resources/contacts.json'))
    {
      $current_data = file_get_contents('C:/xampp/htdocs/Web Technologies/Project/resources/contacts.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array(  
                 'name'               =>     $name,
                 'email'          =>     $email,
                 'phone'          =>     $phone,
                 'message'     =>     $message  
                );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('C:/xampp/htdocs/Web Technologies/Project/resources/contacts.json', $final_data))  
            {  
                 $alert = "<label>Query Recorded Successfully Will Contact Soon<br>";
                 header("location:../contact.php?jsonmsg=" . $alert);  
            }  
        }  
        else  
        {  
           $jsonerror = '<br><label>Some Error Occured<br>';
           header("location:../contact.php?jsonmsg=" . $jsonerror);  
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