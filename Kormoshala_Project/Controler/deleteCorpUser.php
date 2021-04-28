<?php if(!empty($_GET['username'])){ ?>
<?php 

require_once '../model/model.php';
$tableName = 'corporate';
if (deleteUser($tableName, $_GET['username'])) {
    header('Location: ../manageCorporateEmployer.php');
}
else{
	header('Location: ../manageCorporateEmployer.php?msg= User Not Deleted Some Error Occured">');
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
} ?>