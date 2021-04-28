<?php if(!empty($_GET['username'])){ ?>
<?php 

require_once '../model/model.php';
$tableName = 'seekers';
if (deleteUser($tableName, $_GET['username'])) {
    header('Location: ../manageSeeker.php');
}
else{
	header('Location: ../manageSeeker.php?msg= User Not Deleted Some Error Occured">');
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
} ?>