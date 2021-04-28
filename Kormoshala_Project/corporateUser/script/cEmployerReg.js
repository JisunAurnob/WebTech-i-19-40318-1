var flag = 0;

function change(x) 
{
    var format = /[@,#,$,%,!,&,*]/;
    var format1 = /^\d{10}$/;
    var format2 = /^\d{11}$/;
    var format3 = /\S+@\S+\.\S+/;
    var a = x.value;
    

    if(a=="")
    {
        if(x.name=="username"){
            document.getElementById("usernameErr").innerHTML = "Username cannot be empty";
            document.getElementById("usernameErr").style.color = "red";
            document.getElementById("username").style.borderColor = "red";
        }
       
        else if(x.name=="email"){
            document.getElementById("emailErr").innerHTML = "Email is required";
            document.getElementById("emailErr").style.color = "red";
            document.getElementById("email").style.borderColor = "red";
        }   
        else if(x.name=="phone"){
            document.getElementById("phoneErr").innerHTML = "Phone Cannot Be Empty";
            document.getElementById("phoneErr").style.color = "red";
            document.getElementById("phone").style.borderColor = "red";
        }                 
        
        else if(x.name=="password"){
            document.getElementById("PasswordErr").innerHTML = "Password is required";
            document.getElementById("PasswordErr").style.color = "red";
            document.getElementById("password").style.borderColor = "red";
        }       
        else if(x.name=="cpassword" && !document.getElementById("password").value==""){
            document.getElementById("confirmpassErr").innerHTML = "Retype the Password";
            document.getElementById("confirmpassErr").style.color = "red";
            document.getElementById("cpassword").style.borderColor = "red";
        }  

          else if(x.name=="compname"){
            document.getElementById("compnameErr").innerHTML = "Company Name cannot be empty";
            document.getElementById("compnameErr").style.color = "red";
            document.getElementById("compname").style.borderColor = "red";
        }
        else if(x.name=="compaddress"){
            document.getElementById("compadrsErr").innerHTML = "Company Address cannot be empty";
            document.getElementById("compadrsErr").style.color = "red";
            document.getElementById("compaddress").style.borderColor = "red";
        }
        else if(x.name=="license"){
            document.getElementById("licenseErr").innerHTML = "Trade License Cannot Be Empty";
            document.getElementById("licenseErr").style.color = "red";
            document.getElementById("license").style.borderColor = "red";
        }        
    }
    
    else if((a.length < 2) && x.name=="username")
    {
        document.getElementById("usernameErr").innerHTML = "User Name must have 2 characters";
        document.getElementById("usernameErr").style.color = "red";
        document.getElementById("username").style.borderColor = "red";
    }
    else if((!format3.test(a)) && x.name =="email")
    {
        document.getElementById("emailErr").innerHTML = "Invalid email format";
        document.getElementById("emailErr").style.color = "red";
        document.getElementById("email").style.borderColor = "red";
    }
    else if((!format2.test(a)) && x.name =="phone")
    {
        document.getElementById("phoneErr").innerHTML = "Invalid Phone Number";
        document.getElementById("phoneErr").style.color = "red";
        document.getElementById("phone").style.borderColor = "red";
    }
    else if((a.length < 8) && x.name=="password")
    {
        document.getElementById("PasswordErr").innerHTML = "Password must be 8 charecters";
        document.getElementById("PasswordErr").style.color = "red";
        document.getElementById("password").style.borderColor = "red";
    }
    else if((!format.test(a)) && x.name=="password")
    {
        document.getElementById("PasswordErr").innerHTML = "Password must contain at least one of the special characters (@, #, $, %,*,&,!)";
        document.getElementById("PasswordErr").style.color = "red";
        document.getElementById("password").style.borderColor = "red";
    }
    else if((a.length < 2) && x.name=="compname")
    {
        document.getElementById("compnameErr").innerHTML = " Company Name must have at least 2 characters";
        document.getElementById("compnameErr").style.color = "red";
        document.getElementById("compname").style.borderColor = "red";
    }
    else if((a.split(" ").length < 2) && x.name=="compaddress")
    {
        document.getElementById("compadrsErr").innerHTML = " Company Address must have at least 2 words";
        document.getElementById("compadrsErr").style.color = "red";
        document.getElementById("compaddress").style.borderColor = "red";
    }
    else if((!format1.test(a)) && x.name =="license")
    {
        document.getElementById("licenseErr").innerHTML = "Trade License Number must have 10 Numeric numbers";
        document.getElementById("licenseErr").style.color = "red";
        document.getElementById("license").style.borderColor = "red";
    }
    else
    {
        if(x.name=="username"){
            document.getElementById("usernameErr").innerHTML = "\u2713";
            document.getElementById("usernameErr").style.color = "green";
            document.getElementById("username").style.borderColor = "";
        }
        else if(x.name=="email"){
            document.getElementById("emailErr").innerHTML = "\u2713";
            document.getElementById("emailErr").style.color = "green";
            document.getElementById("email").style.borderColor = "";
        }
        else if(x.name=="phone"){
            document.getElementById("phoneErr").innerHTML = "\u2713";
            document.getElementById("phoneErr").style.color = "green";
            document.getElementById("phone").style.borderColor = "";
        }
        else if(x.name=="license"){
            document.getElementById("licenseErr").innerHTML = "\u2713";
            document.getElementById("licenseErr").style.color = "green";
            document.getElementById("license").style.borderColor = "";
        }
        else if(x.name=="compname"){
            document.getElementById("compnameErr").innerHTML = "\u2713";
            document.getElementById("compnameErr").style.color = "green";
            document.getElementById("compname").style.borderColor = "";
        }
        else if(x.name=="compaddress"){
            document.getElementById("compadrsErr").innerHTML = "\u2713";
            document.getElementById("compadrsErr").style.color = "green";
            document.getElementById("compaddress").style.borderColor = "";
        }
        else if(x.name=="password"){
            document.getElementById("PasswordErr").innerHTML = "\u2713";
            document.getElementById("PasswordErr").style.color = "green";
            document.getElementById("password").style.borderColor = "";
        }
        else if(x.name=="cpassword" && x.value==document.getElementById("password").value ){
            document.getElementById("confirmpassErr").innerHTML = "\u2713";
            document.getElementById("confirmpassErr").style.color = "green";
            document.getElementById("cpassword").style.borderColor = "";
        }

        else if(x.name=="cpassword" && !document.getElementById("password").value==""){
            document.getElementById("confirmpassErr").innerHTML = "Password & Retyped Password Dosen't Match";
            document.getElementById("confirmpassErr").style.color = "red";
            document.getElementById("cpassword").style.borderColor = "red";
        }
    }

    
}

function checkUsername(str) {
  var xhttp; 
  var format4 = /^[a-zA-Z-.' ]*$/; 
  if (str == "") {
    document.getElementById("usernameErr").innerHTML = "Username Cannot Be Empty";
    document.getElementById("usernameErr").style.color = "red";
    document.getElementById("username").style.borderColor = "red";
    return;
  }
  else if(str.length < 2)
    {
        document.getElementById("usernameErr").innerHTML = "User Name must have 2 characters";
        document.getElementById("usernameErr").style.color = "red";
        document.getElementById("username").style.borderColor = "red";
        return;
    }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    //console.log(this.responseText);
    if (this.readyState == 4 && this.status == 200 && this.responseText!=0) {
       document.getElementById("usernameErr").innerHTML = "Username Already Exist !! Please Try Another";
       document.getElementById("usernameErr").style.color = "red";
       document.getElementById("username").style.borderColor = "red";
    }
    else{
       document.getElementById("usernameErr").innerHTML = "\u2713";
       document.getElementById("usernameErr").style.color = "green";
       document.getElementById("username").style.borderColor = "";
    }
  };
  xhttp.open("GET", "../model/usernameCheck.php?q="+str, true);
  xhttp.send();
}