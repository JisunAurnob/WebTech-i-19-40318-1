<?php
session_start();
require_once '../controller/showJobController.php';
$tableName='jobs';
$jobs = fetchAllJobs($tableName);
if (isset($_SESSION['username'])) { ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style.css">
<title>Edit Posted Job</title>
</head>
<body>

<header>

	<?php include '../model/header.php'; ?></header>



<section>

  <article>

   <fieldset>
<legend style='color: DarkGreen;'><B>EDIT JOB</B></legend><br>
<div align="center">
<table border='1'>
      

      <thead>
        <tr>
        <th>Job Id</th>
        <th>Job Title</th>
        <th>Company Name</th>
        <th>Job Details</th>
        <th>Salary</th>
        <th>Employee Requirement</th>
        <th>Vacancy</th>
        <th>Location</th>
        <th>Workplace</th>
        <th>Job Type</th>
        <th>Job Status</th>
        <th></th>
      </tr>
      </thead>

      <tbody>
        <?php foreach ($jobs as $i => $job): 

           if ($job['PostedBy']== $_SESSION['username'] )
          {

          ?>
        <tr>
        <td><?php echo $job['Job_id'] ?></td>
        <td><?php echo $job['JobTitle'] ?></td>
        <td><?php echo $job['cname'] ?></td>
        <td><?php echo $job['JobDetail'] ?></td>
        <td><?php echo $job['Salary'] ?></td>
        <td><?php echo $job['EmployeeRequirement'] ?></td>
        <td><?php echo $job['Vacancy'] ?></td>
        <td><?php echo $job['Location'] ?></td>
        <td><?php echo $job['Workplace'] ?></td>
        <td><?php echo $job['JobType'] ?></td>
        <td><?php echo $job['JobStatus'] ?></td>
        <td><a href='editJob2.php?Job_id=<?php echo $job['Job_id'] ?>'>Edit</a></td>
      </tr>
      <?php } endforeach; ?>
      </tbody>

      

      

     </table>
   </div>
     <br>

  </fieldset>



   
  </article>
</section>

<footer>
  <?php include '../model/footer.php';?>
</footer>

</body>
</html>

<?php }

else{
    $msg="error";
   header("location:loginpage.php?msg=" . "You Must Log in First !!");
    // echo "<script>location.href='login.php'</script>";
  }

?>
