<!DOCTYPE HTML>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn Kormoshala</title>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../Css/login/loginStudentCss.css">
 
    <script type="text/javascript">
      function validation()
      {
        var username= document.getElementById("username");
        var password= document.getElementById("password");

        //alert("hello");

        if(username.value.trim()=="" )
        {
           document.getElementById("nameErr").innerHTML= "*Username is requied(JS)";
           return false;
        }

        else if(password.value.trim()=="" )
        {
           document.getElementById("passwordErr").innerHTML= "*Password is requied(JS)";
           return false;
        }
        else {

          return true;
        }
      }
    </script>
    <style >


    </style>
    <meta charset="utf-8">
    
  </head>
  <body>
  <header>
    <div class="wrapper">
        <div class="logo">
            <img src="files/logo.png" alt="">
        </div>
<ul class="nav-area">
<li><a href="../front/index.php">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="signupStudentView.php">Sign Up</a></li>
</ul>
</div>
</header>


<div class="loginform">

    <form class="loginbox" onsubmit="return validation();" method="post" action="../Controller/loginStudentController.php" >

    <h2>Log In</h2>


        Username: <input type="text" placeholder="Enter Username" name="username" id="username">
        <span class="error" id="nameErr">* <?php if(!empty($_GET['usernameErr'])){echo $_GET['usernameErr'];} ?></span>


        <br>
        Password: <input type="password" placeholder="Enter Password" name="password" id="password">
        <span class="error" id="passwordErr">* <?php if(!empty($_GET['passwordErr'])){echo $_GET['passwordErr'];} ?></span>
        <br>
        <input type="checkbox"  name="remember" value="remembered">
         <label for="remember">Remember Me</label>

         <input type="submit" name="submit" value="Submit">
          <meta ><a href ="forget password.php">Forget Password? </a></meta>

    </form>
    </div>
    <footer>
<div class="container">
  <div class="main"></div>
  <div class="footer">
    <center>Copyright &copy; Kormoshala 2000-<?=date("Y");?></center>
  </div>
</div>
</footer>
  </body>
</html>
