<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style.css">
  <style>
.error {color: #FF0000;}
</style>
<script type="text/javascript" src="../script/cEmployerReg.js" ></script>
<title>Registration</title>
</head>
<body>

<header>
    <?php include '../model/header.php';?>
  
</header>


<section>  
<!-- <nav></nav> -->
  <article>
   <form method="post" action="../controller/CEmployerController.php">
    <!-- <div class="container"> -->
  <fieldset>
    <legend><b>REGISTRATION</b></legend><br><!-- <div style="float: left; text-align: right;"> -->

<div class="row">
    <div class="col-25">
      <label for="username"><b>User Name</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="username" name="username" placeholder="Your name.." onkeyup="checkUsername(this.value)">
    </div>
  </div>
  <span class="error" id="usernameErr"><?php if(!empty($_GET['userNameErr'])){echo $_GET['userNameErr'];}?></span><br><hr>

<div class="row">
    <div class="col-25">
      <label for="email"><b>Email</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="email" name="email" placeholder="Your email.."  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="emailErr"><?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span><br><hr>

 <div class="row">
    <div class="col-25">
      <label for="phone"><b>Phone</b></label>
    </div>
    <div class="col-75">
      <input type="tel" id="phone" name="phone" placeholder="01234567891" onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="phoneErr"><?php if(!empty($_GET['phnErr'])){echo $_GET['phnErr'];}?></span><br><hr>

   <div class="row">
    <div class="col-25">
      <label for="password"><b>Password</b></label>
    </div>
    <div class="col-75">
      <input type="password" id="password" name="password" placeholder="Password"  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="PasswordErr"><?php if(!empty($_GET['passErr'])){echo $_GET['passErr'];}?></span><br><hr>

   <div class="row">
    <div class="col-25">
      <label for="cpassword"><b>Confirm Password</b></label>
    </div>
    <div class="col-75">
      <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Your Password"  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="confirmpassErr"><?php if(!empty($_GET['cpassErr'])){echo $_GET['cpassErr'];}?></span><br><hr>

 <div class="row">
    <div class="col-25">
      <label for="compname"><b>Company Name</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="compname" name="compname" placeholder="company name.."  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="compnameErr"><?php if(!empty($_GET['compnameErr'])){echo $_GET['compnameErr'];}?></span><br><hr>

 <div class="row">
    <div class="col-25">
      <label for="compaddress"><b>Company Address</b></label>
    </div>
    <div class="col-75">
      <textarea id="compaddress" name="compaddress" placeholder="Write something.." rows="4"  onkeyup="change(this)" onblur="change(this)"></textarea>
    </div>
  </div>
  <span class="error" id="compadrsErr"><?php if(!empty($_GET['compadrsErr'])){echo $_GET['compadrsErr'];}?></span><br><hr>

   <div class="row">
    <div class="col-25">
      <label for="license"><b>Trade License</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="license" name="license" placeholder="License number.."  onkeyup="change(this)" onblur="change(this)">
    </div>
  </div>
  <span class="error" id="licenseErr"><?php if(!empty($_GET['licenseErr'])){echo $_GET['licenseErr'];}?></span><br><hr>


<!-- 
 Job Type:
  <select name="jobtype">
   <option value="" disabled selected>Select a type </option>
    <option value="Agriculture">Agriculture, Food and Natural Resources</option>
    <option value="Architecture">Architecture and Construction</option>
    <option value="Arts">Arts, Audio/Video Technology and Communications</option>
    <option value="Government">Government and Public Administration</option>
     <option value="Tourism">Hospitality and Tourism</option>
    <option value="IT">Information Technology</option>
    <option value="Science">Science, Technology</option>
    <option value="Engineering & Mathematics">Engineering and Mathematics</option>
  </select>
  <span class="error"><?php //echo $jobtypeErr;?></span>

<hr> -->
<!--  <div style= 'float: right;position: absolute;right:150px; top: 205px;color: blue;'>
  <fieldset>
    <legend><b>PROFLE PICTURE</b></legend>
<img src='docs\dp.png' alt='Profile Picture' width='150' height='180'><br>
<a href='chngprofilepic.php'>choose</a>
</fieldset>
  </div> -->


<div class="row">
	
<input type="submit" class="registerbtn" name="submit" value="Submit">
<input type="reset" class="registerbtn"> 
     
</div>


    
<!-- </div> -->
     </fieldset>
   <!-- </div> -->
</form>
   
  </article>
</section>

<footer>
    <?php include '../model/footer.php';?>
</footer>

</body>
</html>