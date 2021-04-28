var flag = 0;

function change(x) 
{
    var format = /[@,#,$,%]/;
    var format2 = /^\d{11}$/;
    var format3 = /\S+@\S+\.\S+/;
    var a = x.value;
    

    if(a=="")
    {   if(x.name=="cpass"){
            document.getElementById("cpassErr").innerHTML = "Current Password is required";
            document.getElementById("cpassErr").style.color = "red";
            document.getElementById("cpass").style.borderColor = "red";
        }
        else if(x.name=="npass"){
            document.getElementById("npassErr").innerHTML = "New Password is required";
            document.getElementById("npassErr").style.color = "red";
            document.getElementById("npass").style.borderColor = "red";
        }
        else if(x.name=="rtnpass"){
            document.getElementById("rtnpassErr").innerHTML = "Retype The New the Password";
            document.getElementById("rtnpassErr").style.color = "red";
            document.getElementById("rtnpass").style.borderColor = "red";
        }            
    }
    else if((a.length < 8) && x.name=="npass")
    {
        document.getElementById("npassErr").innerHTML = "New Password must be 8 charecters";
        document.getElementById("npassErr").style.color = "red";
        document.getElementById("npass").style.borderColor = "red";
    }
    else if((!format.test(a)) && x.name=="npass")
    {
        document.getElementById("npassErr").innerHTML = "New Password must contain at least one of the special characters (@, #, $, %)";
        document.getElementById("npassErr").style.color = "red";
        document.getElementById("npass").style.borderColor = "red";
    }
    else if(x.name=="npass" && document.getElementById("cpass").value==document.getElementById("npass").value){
        document.getElementById("npassErr").innerHTML = "Current Password & New Password Shold Not Be Same";
        document.getElementById("npassErr").style.color = "red";
        document.getElementById("npass").style.borderColor = "red";
    }
    else
    {
        if(x.name=="cpass"){
            document.getElementById("cpassErr").innerHTML = "\u2713";
            document.getElementById("cpassErr").style.color = "green";
            document.getElementById("cpass").style.borderColor = "";
        }
        else if(x.name=="npass"){
            document.getElementById("npassErr").innerHTML = "\u2713";
            document.getElementById("npassErr").style.color = "green";
            document.getElementById("npass").style.borderColor = "";
        }
        else if(x.name=="rtnpass" && x.value==document.getElementById("npass").value ){
            document.getElementById("rtnpassErr").innerHTML = "\u2713";
            document.getElementById("rtnpassErr").style.color = "green";
            document.getElementById("rtnpass").style.borderColor = "";
        }

        else if(x.name=="rtnpass" && !document.getElementById("npass").value==""){
            document.getElementById("rtnpassErr").innerHTML = "New Password & Retyped Password Dosen't Match";
            document.getElementById("rtnpassErr").style.color = "red";
            document.getElementById("rtnpass").style.borderColor = "red";
        }
    }

    
    
}