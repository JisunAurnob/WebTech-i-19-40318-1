<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="design.css">
    <script type="text/javascript" src="scripts/searchJobs.js"></script>
    <style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
	<title>Search Jobs</title>
</head>
<body onload="search(document.getElementById('search').value)">
<?php include 'controler/header.php';?>
<center>
    <div style="width:500px;" class="searchBG"><br>
        <input style="width:350px; margin-right: 10px;" type="text" id="search" name="search" placeholder="Search Jobs By Keyword" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {if(!empty($_POST["search"])){echo $_POST["search"];}}?>" onkeyup="search(this.value)" onblur="search(this.value)">
    <br><br>
    </div></center>
    <div id="searchResults">
    
    </div>
<br><br><br>
<?php include 'controler/footer.php';?>
</body>
</html>