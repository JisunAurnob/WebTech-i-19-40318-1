<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<header>
	<div style="float: left;"><a href='home.php'><img src="controler/Logo.png"></a></div><br><br>
<?php

if (empty($_SESSION['username'])) {
	echo "<div style='float: right';><a class='headerButton'href='home.php'>Home</a>";
	echo "<a class='headerButton' href='login.php'>Login</a>";
	echo "<a class='headerButton' href='Sign Up.php'>Sign Up</a> </div><br><br><br><br><hr>";
	
}

else if(!empty($_SESSION['username'])){
	echo "<div style='float: right';>"." Logged in as <a style='text-decoration: none;color: #0066ff;' href='adminProfile.php'>".$_SESSION['username']."</a> | ";
	echo "<a class='headerButton' href='admin.php'>Manage</a> | ";
	echo "<a class='headerButton' href='controler/logout.php'>Logout</a><br>";
	echo "</div><br><br><br><br><hr>";
}
?>
	
</header>
</body>
</html>