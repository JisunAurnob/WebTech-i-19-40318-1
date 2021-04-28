var flag = 0;

function change(x) 
{
    var format = /[@,#,$,%]/;
    var format2 = /^\d{11}$/;
    var format3 = /\S+@\S+\.\S+/;
    var a = x.value;
    

    if(a=="")
    {
        if(x.name=="name"){
            document.getElementById("nameErr").innerHTML = "Name cannot be empty";
            document.getElementById("nameErr").style.color = "red";
            document.getElementById("name").style.borderColor = "red";
        }   
        else if(x.name=="email"){
            document.getElementById("emailErr").innerHTML = "Email is required";
            document.getElementById("emailErr").style.color = "red";
            document.getElementById("email").style.borderColor = "red";
        }                 
        else if(x.name=="gender"){
            document.getElementById("genderErr").innerHTML = "Gender cannot be empty";
            document.getElementById("genderErr").style.color = "red";
            document.getElementById("gender").style.borderColor = "red";
        }
        else if(x.name=="birthday"){
            document.getElementById("birthdayErr").innerHTML = "Gender cannot be empty";
            document.getElementById("birthdayErr").style.color = "red";
            document.getElementById("birthday").style.borderColor = "red";
        }     
    }
    else if((a.split(" ").length < 2) && x.name=="name")
    {
        document.getElementById("nameErr").innerHTML = "Name must have 2 words";
        document.getElementById("nameErr").style.color = "red";
        document.getElementById("name").style.borderColor = "red";
    }
    else if((!format3.test(a)) && x.name =="email")
    {
        document.getElementById("emailErr").innerHTML = "Invalid email format";
        document.getElementById("emailErr").style.color = "red";
        document.getElementById("email").style.borderColor = "red";
    }
    else
    {
        if(x.name=="name"){
            document.getElementById("nameErr").innerHTML = "\u2713";
            document.getElementById("nameErr").style.color = "green";
            document.getElementById("name").style.borderColor = "";
        }
        else if(x.name=="email"){
            document.getElementById("emailErr").innerHTML = "\u2713";
            document.getElementById("emailErr").style.color = "green";
            document.getElementById("email").style.borderColor = "";
        }
        else if(x.name=="gender"){
            document.getElementById("genderErr").innerHTML = "\u2713";
            document.getElementById("genderErr").style.color = "green";
            document.getElementById("gender").style.borderColor = "";
        }
        else if(x.name=="birthday"){
            document.getElementById("birthdayErr").innerHTML = "\u2713";
            document.getElementById("birthdayErr").style.color = "green";
            document.getElementById("birthday").style.borderColor = "";
        }
    }

    
    
}