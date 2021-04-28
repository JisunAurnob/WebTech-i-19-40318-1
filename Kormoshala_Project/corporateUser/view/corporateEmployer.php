<?php
session_start();
if (isset($_SESSION['username'])) { ?>
  
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
<title>Dashboard</title>
</head>
<body>



<header>

  <?php
  
   include '../model/header.php';?></header>
   <?php //require 'controller\loginController.php';?>


<section>  
  <article>
    <div style="color: blue;"><?php if(!empty($_GET['successMsg'])){echo $_GET['successMsg'];} ?></div><br>
  
<fieldset>






    <legend><h1><center> Welcome <?php echo $_SESSION['username']?></center></h1></legend>
                    <a class="button1 button2" href='postJob.php'>Post Job</a><br><br><br>
                    <a class="button1 button2" href='postedJobStatus.php'>Job Status</a><br><br><br>
                    <a class="button1 button2" href='editPostedJob.php'>Edit Job</a><br><br><br>
                    <a class="button1 button2" href='deletePostedJob.php'>Delete Job</a>






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
