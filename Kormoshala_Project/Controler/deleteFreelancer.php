<?php if(!empty($_GET['username'])){ ?>
<?php 

require_once '../model/model.php';
$tableName = 'freelancers';
if (deleteUser($tableName, $_GET['username'])) {
    header('Location: ../manageFreelanceEmployer.php');
}
else{
	header('Location: ../manageFreelanceEmployer.php?msg= User Not Deleted Some Error Occured">');
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
} ?>