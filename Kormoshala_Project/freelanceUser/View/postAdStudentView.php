<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
    <link rel='stylesheet' type='text/css' href='stylejobpost.php'/>

  </head>
  <body>
  <header>
    <div class="wrapper">
        <div class="logo">
            <img src="files/logo.png" alt="">
        </div>
<ul class="nav-area">
<li><a href="#">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Services</a></li>
<li><a href="#">Dashboard</a></li>
<li><a href="#">Sign Up</a></li>
<li><a href="#">Log In</a></li>
</ul>
</div>

   <div class=postjobad>
    <form class="formpostjob" method="post" action="../Controller/postAdStudentController.php">
      <h2>Post Job Offer</h2>
      <div id = name>Your Name: <input type="text" placeholder= "Company Name" name="yourname">
      <span class="error">*<?php if(!empty($_GET['yournameErr'])){echo $_GET['yournameErr'];} ?></span>
      </div>
       <div id = email>E-mail: <input type="text" placeholder= "Company Email" name="email" >
      <span class="error">* <?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];} ?></span>
      </div>
    <div id = joboffer>Job you want to offer: <input type="text" placeholder= "Job Details" name="coursename">
      <span class="error">* <?php if(!empty($_GET['coursenameErr'])){echo $_GET['coursenameErr'];} ?></span>
      </div>
      <div id = salary>Salary you are willing to pay: <input type="text" placeholder= "Salary" name="salary">
      <span class="error">* <?php if(!empty($_GET['salaryErr'])){echo $_GET['salaryErr'];} ?></span>
      </div>

      <!--Comment: <input type="text" name="comment" size="75">
      <span class="error">* <?php if(!empty($_GET['commentErr'])){echo $_GET['commentErr'];} ?></span>
      <br><br>-->





<div id = button>
      <input type="submit" name="submit" value="Submit">
      </div>
    </form>
    </div>
    </header>
  </body>
  <?php require_once '../front/includes/footer.php';?>

</html>

