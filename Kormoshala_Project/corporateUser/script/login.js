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
            document.getElementById("usernameErr").innerHTML = "Username is Required";
            document.getElementById("usernameErr").style.color = "red";
            document.getElementById("username").style.borderColor = "red";
        }                
        
        else if(x.name=="password"){
            document.getElementById("PasswordErr").innerHTML = "Password is required";
            document.getElementById("PasswordErr").style.color = "red";
            document.getElementById("password").style.borderColor = "red";
        }              
    }
   
    else
    {
        if(x.name=="username"){
            document.getElementById("usernameErr").innerHTML = "\u2713";
            document.getElementById("usernameErr").style.color = "green";
            document.getElementById("username").style.borderColor = "";
        }
       
        else if(x.name=="password"){
            document.getElementById("PasswordErr").innerHTML = "\u2713";
            document.getElementById("PasswordErr").style.color = "green";
            document.getElementById("password").style.borderColor = "";
        }
        
    }

    
    
}