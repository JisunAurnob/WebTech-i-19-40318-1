<?php 

session_start();

if (isset($_SESSION['username'])) {
	session_destroy();
	if(isset($_COOKIE['admin'])){
	unset($_COOKIE['admin']); 
    setcookie('admin', null, -1, '/');
	}
	else if(isset($_COOKIE['seeker'])){
	unset($_COOKIE['seeker']); 
    setcookie('seeker', null, -1, '/');
	}
	else if(isset($_COOKIE['pemp'])){
	unset($_COOKIE['pemp']); 
    setcookie('pemp', null, -1, '/');
	}
	else if(isset($_COOKIE['cemp'])){
	unset($_COOKIE['cemp']); 
    setcookie('cemp', null, -1, '/');
	}
	header("location:../home.php");
	
}

else{
	header("location:../home.php");
}

 ?>