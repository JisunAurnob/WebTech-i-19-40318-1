<?php
session_start();

  $target_dir = "C:/xampp/htdocs/WT Lab Task/Lab task 6/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  $message = "Choose A File or Selected File Format is not allowed<br>";
  $uploadOk = 0;
  header("location:../viewprofile.php?msg=" . $message);
}
else {
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image<br>";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  echo "Sorry, file already exists<br>";
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 4000000) {
  echo "Picture size should not be more than 4MB<br>";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded<br>";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . basename($_SESSION['username'].".jpg"))) {
    $message = "Profile Picture Uploaded Succesfully<br>";
    header("location:../viewprofile.php?successMsg=" . $message);
  } else {
    $message = "Sorry, there was a problem uploading your file<br>";
    header("location:../viewprofile.php?msg=" . $message);
  }
}
}
?>