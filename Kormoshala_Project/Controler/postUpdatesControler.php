<?php
require_once '../model/model.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $data['JobStatus'] = $_POST['JobStatus'];

  if (updateJobStatus('jobs', $_GET['jobid'], $data)) {
    header('Location: ../managePosts.php');
  }
  else {
  echo '<p>Error</p>';
  header('Location: ../managePosts.php');
}

}
?>