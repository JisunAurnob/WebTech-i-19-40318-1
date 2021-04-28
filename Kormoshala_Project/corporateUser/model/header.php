
<header>
  <div align='left'><a href='welcome.php'><img src='../docs/companyLogo.png' width='300' height='100'></a></div>

          <?php 


if (empty($_SESSION['username'])) {

   echo "  <ul>
  <li><a  href='signUp.php'>Sign Up</a></li>
  <li><a href='loginpage.php'>Log In</a></li>
  <li><a href='welcome.php'>Home</a></li>
  <li></li>
</ul>";

}
else{
    $msg="error";

     echo "<ul>
    <li style='align:left;'><a href='corporateEmployer.php'>Back</a></li>
   <li><a href='../controller/logout.php'>Log Out</a></li>
   <li><a href='viewprofile.php'>".$_SESSION['username']."</a></li>

  
</ul>";
  }

 ?>


  
</header>