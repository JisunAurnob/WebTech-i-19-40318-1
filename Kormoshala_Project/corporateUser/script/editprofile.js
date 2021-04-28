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
        if(x.name=="email"){
            document.getElementById("emailErr").innerHTML = "Email is required";
            document.getElementById("emailErr").style.color = "red";
            document.getElementById("email").style.borderColor = "red";
        }   
        else if(x.name=="phone"){
            document.getElementById("phoneErr").innerHTML = "Phone Cannot Be Empty";
            document.getElementById("phoneErr").style.color = "red";
            document.getElementById("phone").style.borderColor = "red";
        }                 
             
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
    else
    {
        if(x.name=="email"){
            document.getElementById("emailErr").innerHTML = "\u2713";
            document.getElementById("emailErr").style.color = "green";
            document.getElementById("email").style.borderColor = "";
        }
        else if(x.name=="phone"){
            document.getElementById("phoneErr").innerHTML = "\u2713";
            document.getElementById("phoneErr").style.color = "green";
            document.getElementById("phone").style.borderColor = "";
        }
        
    }

    
    
}