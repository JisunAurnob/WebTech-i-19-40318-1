var flag = 0;

function change(x) 
{
    var format = /[@,#,$,%,*,&,!]/;
    var format2 = /^\d{11}$/;
    var format3 = /\S+@\S+\.\S+/;
    var a = x.value;
    

    if(a=="")
    {   if(x.name=="cpassword"){
            document.getElementById("cpassErr").innerHTML = "Current Password is required";
            document.getElementById("cpassErr").style.color = "red";
            document.getElementById("cpassword").style.borderColor = "red";
        }
        else if(x.name=="npassword"){
            document.getElementById("npassErr").innerHTML = "Enter a New Password";
            document.getElementById("npassErr").style.color = "red";
            document.getElementById("npassword").style.borderColor = "red";
        }
        else if(x.name=="rpassword"){
            document.getElementById("rpassErr").innerHTML = "Retype The New the Password";
            document.getElementById("rpassErr").style.color = "red";
            document.getElementById("rpassword").style.borderColor = "red";
        }            
    }
    else if((a.length < 8) && x.name=="npassword")
    {
        document.getElementById("npassErr").innerHTML = "New Password must be 8 charecters";
        document.getElementById("npassErr").style.color = "red";
        document.getElementById("npassword").style.borderColor = "red";
    }
    else if((!format.test(a)) && x.name=="npassword")
    {
        document.getElementById("npassErr").innerHTML = "New Password must contain at least one of the special characters (@, #, $, %,*,%,!)";
        document.getElementById("npassErr").style.color = "red";
        document.getElementById("npassword").style.borderColor = "red";
    }
    else if(x.name=="npassword" && document.getElementById("cpassword").value==document.getElementById("npassword").value)
    {
        document.getElementById("npassErr").innerHTML = "Current Password & New Password Should not be Same ";
        document.getElementById("npassErr").style.color = "red";
        document.getElementById("npassword").style.borderColor = "red";
    }
    else
    {
        if(x.name=="cpassword"){
            document.getElementById("cpassErr").innerHTML = "\u2713";
            document.getElementById("cpassErr").style.color = "green";
            document.getElementById("cpassword").style.borderColor = "";
        }
        else if(x.name=="npassword"){
            document.getElementById("npassErr").innerHTML = "\u2713";
            document.getElementById("npassErr").style.color = "green";
            document.getElementById("npassword").style.borderColor = "";
        }
        else if(x.name=="rpassword" && x.value==document.getElementById("npassword").value ){
            document.getElementById("rpassErr").innerHTML = "\u2713";
            document.getElementById("rpassErr").style.color = "green";
            document.getElementById("rpassword").style.borderColor = "";
        }

        else if(x.name=="rpassword" && !document.getElementById("npassword").value==""){
            document.getElementById("rpassErr").innerHTML = "New Password & Retyped Password Dosen't Match";
            document.getElementById("rpassErr").style.color = "red";
            document.getElementById("rpassword").style.borderColor = "red";
        }
    }

    
    
}