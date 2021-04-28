
<!DOCTYPE HTML>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Kormoshala</title>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">    
  <script type="text/javascript">
  
  function validation()
  {
    var name= document.getElementById("name");
    var email= document.getElementById("email");
    var password= document.getElementById("password");
    var username= document.getElementById("username");
    var confirmpassword=document.getElementById("confirmpassword");
    var birth=document.getElementById("birth");
    var gender= document.getElementsByName("gender");

    //alert("hello");

    if(name.value.trim()=="" )
    {
       document.getElementById("nameErr").innerHTML= "*Name is requied";
       return false;
    }
    else {

    if(name.value.split(" ").length<2)
         {
          document.getElementById("nameErr").innerHTML= "*Name must contains at least two words ";
          return false;
         }
         document.getElementById("nameErr").innerHTML= "";

    }

    if(email.value.trim()=="")
    {
      document.getElementById("emailErr").innerHTML= "*email is requied";
      return false;
    }
    else {
      var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
     if(!email.value.match(mailformat))
      {
        document.getElementById("emailErr").innerHTML= "*Invalid email format";
        return false;
      }
      else {
        document.getElementById("emailErr").innerHTML= "";
      }
    }

    if (username.value.trim()=="") {
      document.getElementById("usernameErr").innerHTML=  "* User Name is required";
      return false;
    }
    else {
      document.getElementById("usernameErr").innerHTML=  "";
    }


    if(password.value.trim()=="")
    {
      document.getElementById("passwordErr").innerHTML= "*Password is requied";
      return false;
    }
    else {
      if(password.value.length<8)
      {
      document.getElementById("passwordErr").innerHTML= "*Password must not be less than eight (8) characters";
        return false;
      }
      else {
        document.getElementById("passwordErr").innerHTML= "";
      }
  }

   if(confirmpassword.value.trim()=="")
   {
   document.getElementById("confirmpasswordErr").innerHTML= "*Confirm Password is required";
     return false;
   }
   else {
      if(!(password.value==confirmpassword.value))
      {
        document.getElementById("confirmpasswordErr").innerHTML= "*Password and confirm password have to be same";
      return false;
      }
      else {
        document.getElementById("confirmpasswordErr").innerHTML= "";
      }

  }

if(birth.value=="")
{
  document.getElementById("birthErr").innerHTML= "*Birthday is requied";
return false;
}
else {
  document.getElementById("birthErr").innerHTML= "";
}



if(!(gender[0].checked || gender[1].checked || gender[2].checked))
{
  document.getElementById("genderErr").innerHTML= "*Gender is requied";
  return false;
}
else {
  document.getElementById("genderErr").innerHTML= "";
}

return true;


}
  </script>
<link rel="stylesheet" href="../Css/Signup/signupStudentCss.css">
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
<li><a href="loginStudentView.php">Log In</a></li>
</ul>
</div>
</header>







<form class="loginbox" onkeyup="return validation();" method="post" action="../Controller/signupStudentController.php">
  <h2>Sign Up</h2>

  Name: <input type="text" name="name" id="name" placeholder="Enter Name">
  <br><br>
  <span class="error" id="nameErr">* <?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];} ?></span>
  <br>
   E-mail: <input type="text" name="email" id="email" placeholder="Enter Email">
  <br><br>
  <span class="error" id="emailErr">* <?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];} ?></span>
  <br>
  Username: <input type="text" name="username" id="username" placeholder="Enter Username">
  <br><br>
  <span class="error" id="usernameErr">* <?php if(!empty($_GET['usernameErr'])){echo $_GET['usernameErr'];} ?></span>
  <br>
  Password: <input type="password" name="password" id="password" placeholder="Enter Password" >
  <br><br>
  <span class="error" id="passwordErr">* <?php if(!empty($_GET['passwordErr'])){echo $_GET['passwordErr'];} ?></span>
  <br>

  Comfirm Password: <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Enter Password">
  <br><br>
  <span class="error" id="confirmpasswordErr">* <?php if(!empty($_GET['$confirmpasswordErr'])){echo $_GET['confirmpasswordErr'];} ?></span>
  <br>

  Date of Birth: <input type="date" size="1"  name="birth" id="birth" >

  <br><br>
  <span class="error" id="birthErr">* <?php if(!empty($_GET['birthErr'])){echo $_GET['birthErr'];} ?></span>
  <br>
  Gender:

  <div id="radio">
  <br>
  <input type="radio" name="gender" id="female" value="female">
  <label for="female">Female</label>
  <input type="radio" name="gender" id="male" value="male">
  <label for="male">Male</label>
  <input type="radio" name="gender" id="other"  value="other">
  <label for="other">Other</label>
  </div>
  <br><br>
  <span class="error" id="genderErr">* <?php if(!empty($_GET['genderErr'])){echo $_GET['genderErr'];} ?></span>
  <br>

  <input type="submit" name="submit" value="Submit">
</form>


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
