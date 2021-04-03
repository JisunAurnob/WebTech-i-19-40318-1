<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<header>
	<div style=""><a href='home.php'><img src="controler/Logo1.png"></a></div><center></center>
<?php

if (empty($_SESSION['username'])) { ?>
	<!-- <div style='float: right';><a class='headerButton'href='home.php'>Home</a>
	<a class='headerButton' href='login.php'>Login</a>
	<a class='headerButton' href='Sign Up.php'>Sign Up</a> </div><br><br><br><br><hr> -->

	<nav class="navbar navbar-expand-sm bg-dark navbar-light">
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav"  style="background-color: #002233;">
      <li class="nav-item">
        <a class="nav-link" href='home.php'>Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href='home.php'>About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href='home.php'>Contact</a>
      </li>
      <li style="float: right;" class="nav-item">
        <a class="nav-link" href='Sign Up.php'>Sign Up</a>
      </li>
      <li style="float: right;" class="nav-item">
        <a class="nav-link" href='login.php'>Login</a>
      </li>    
    </ul>
  </div>  
</nav>
	
<?php }

else if(!empty($_SESSION['username'])){ ?>
	<!-- <div style='float: right';> Logged in as <a style='text-decoration: none;color: #0066ff;' href='adminProfile.php'><?php echo $_SESSION['username']; ?></a> | 
	<a class='headerButton' href='admin.php'>Manage</a> | 
	<a class='headerButton' href='controler/logout.php'>Logout</a><br>
	</div><br><br><br><br><hr> -->

<nav class="navbar bg-light navbar-light">
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav" style="background-color: #002233;">
      <li class="nav-item">
        <a class="nav-link" href='home.php'>Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href='home.php'>About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href='home.php'>Contact</a>
      </li>
      <li style="float: right;" class="nav-item">
        <a class="nav-link dangerbtn" href='controler/logout.php'>Logout</a>
      </li>
      <li style="float: right;" class="nav-item">
        <a class="nav-link" href='admin.php'>Manage</a>
      </li>
      <li style="float: right;" class="nav-item">
        <a class="nav-link" href='adminProfile.php'><?php echo $_SESSION['username']; ?></a>
      </li>    
    </ul>
  </div>  
</nav>

<?php }
?>
	
</header>
</body>
</html>