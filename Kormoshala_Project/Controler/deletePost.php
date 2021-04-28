<?php if(!empty($_GET['id'])){ ?>
<?php 

require_once '../model/model.php';
$tableName = 'jobs';
if (deletePost($tableName, $_GET['id'])) {
    header('Location: ../managePosts.php');
}
else{
	header('Location: ../managePosts.php?msg= User Not Deleted Some Error Occured">');
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
} ?>