<?php if(!empty($_GET['Job_id'])){ ?>
<?php 

require_once '../model/model.php';
$tableName = 'jobs';
//echo $_GET['id'];
if (deleteJob($tableName, $_GET['Job_id'])) {
    	
  	header('Location: ../view/corporateEmployer.php?successMsg=Job deleted Successfully !!!');
}
else{
	echo '<p>Job Not Deleted!!</p>';
}
 ?>
<?php }
else{
	echo "Error accessing the page !!!";
} ?>