<!DOCTYPE html>
<html>
<head>
  <title>Uploaded</title>
</head>
<body>
  <?php 
session_start();
  echo "<div>";include 'resources/header.php';echo "</div>";
 ?>
<?php
$target_dir = "resources/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image<br>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists<br>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 4000000) {
  echo "Picture size should not be more than 4MB<br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "Sorry, only JPG, JPEG, & PNG files are allowed<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded<br>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $servername = "localhost";
$uname = "root";
$pword = "";
$dbname = "jisundb";
// Create connection
$conn = new mysqli($servername, $uname, $pword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE labtask4 SET profilepicture='".$target_file."' WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'";

if ($conn->query($sql) === TRUE) {
  $_SESSION['proPic'] = $target_file;
  echo "<p>Profile Picture Changed Successfully</p>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
  } else {
    echo "Sorry, there was a problem uploading your file<br>";
  }
}
?>
<fieldset>
<legend><B>PROFILE PICTURE</B></legend> <br>
<br><img src="<?php echo $target_file; ?>" alt="Profile Picture" width="180" height="200">
</fieldset>
<div><?php include 'resources/footer.php';?></div>
</body>
</html>