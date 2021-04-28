<?php
$mysqli = new mysqli("localhost", "root", "", "kormoshala");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT Email 
FROM corporate WHERE Username = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id);
$stmt->fetch();
$stmt->close();
echo $id;
?>