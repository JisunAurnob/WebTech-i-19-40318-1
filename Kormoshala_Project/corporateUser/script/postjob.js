var flag = 0;

function change(x) 
{
    var format = /[@,#,$,%]/;
    var format2 = /^\d{11}$/;
    var format3 = /\S+@\S+\.\S+/;
    var format4 = /^[a-zA-Z-.' ]*$/;
    var format5 = /^[0-9]*$/;
    var format6 =/^[a-zA-Z-'._ 0-9]*$/;
    var a = x.value;
    

    if(a=="")
    {
        if(x.name=="jtitle"){
            document.getElementById("jtitleErr").innerHTML = "Job Title is Required";
            document.getElementById("jtitleErr").style.color = "red";
            document.getElementById("jtitle").style.borderColor = "red";
        }
        else if(x.name=="jobdetail"){
            document.getElementById("jobdetailErr").innerHTML = "Job Details is Required";
            document.getElementById("jobdetailErr").style.color = "red";
            document.getElementById("jobdetail").style.borderColor = "red";
        }   
        else if(x.name=="salary"){
            document.getElementById("salaryErr").innerHTML = "Salary is required";
            document.getElementById("salaryErr").style.color = "red";
            document.getElementById("salary").style.borderColor = "red";
        }   
        else if(x.name=="emprequire"){
            document.getElementById("emprequireErr").innerHTML = "Employee Requirement Cannot Be Empty";
            document.getElementById("emprequireErr").style.color = "red";
            document.getElementById("emprequire").style.borderColor = "red";
        }                 
        else if(x.name=="vacancy"){
            document.getElementById("vacancyErr").innerHTML = "Vacancy cannot be empty";
            document.getElementById("vacancyErr").style.color = "red";
            document.getElementById("vacancy").style.borderColor = "red";
        }     
        else if(x.name=="location"){
            document.getElementById("locationErr").innerHTML = "Location is required";
            document.getElementById("locationErr").style.color = "red";
            document.getElementById("location").style.borderColor = "red";
        }       
        else if(x.name=="workplace"){
            document.getElementById("workplaceErr").innerHTML = "Please select a Workplace";
            document.getElementById("workplaceErr").style.color = "red";
            document.getElementById("workplace").style.borderColor = "red";
        }
        else if(x.name=="jobtype"){
            document.getElementById("jobtypeErr").innerHTML = "Please select a Job Type";
            document.getElementById("jobtypeErr").style.color = "red";
            document.getElementById("jobtype").style.borderColor = "red";
        }

    }
    else if((!format4.test(a)) && x.name =="jtitle")
    {
        document.getElementById("jtitleErr").innerHTML = "Only letters white space, period & dash allowed in Job Title";
        document.getElementById("jtitleErr").style.color = "red";
        document.getElementById("jtitle").style.borderColor = "red";
    }
    else if((a.length < 3) && x.name=="jtitle")
    {
        document.getElementById("jtitleErr").innerHTML = "Job Title must have 3 characters";
        document.getElementById("jtitleErr").style.color = "red";
        document.getElementById("jtitle").style.borderColor = "red";
    }
    else if((!format4.test(a)) && x.name =="jobdetail")
    {
        document.getElementById("jobdetailErr").innerHTML = "Only letters white space, period & dash allowed in Job Details";
        document.getElementById("jobdetailErr").style.color = "red";
        document.getElementById("jobdetail").style.borderColor = "red";
    }
    else if((a.split(" ").length < 2) && x.name=="jobdetail")
    {
        document.getElementById("jobdetailErr").innerHTML = "Job Details Must have 2 words";
        document.getElementById("jobdetailErr").style.color = "red";
        document.getElementById("jobdetail").style.borderColor = "red";
    }
    else if((!format5.test(a)) && x.name =="salary")
    {
        document.getElementById("salaryErr").innerHTML = "Please Enter Numeric Value Only";
        document.getElementById("salaryErr").style.color = "red";
        document.getElementById("salary").style.borderColor = "red";
    }
    else if((!format6.test(a)) && x.name=="emprequire")
    {
        document.getElementById("emprequireErr").innerHTML = "Can not contain Spacial Characters";
        document.getElementById("emprequireErr").style.color = "red";
        document.getElementById("emprequire").style.borderColor = "red";
    }
    else if((a.split(" ").length < 2)  && x.name=="emprequire")
    {
        document.getElementById("emprequireErr").innerHTML = "Employee Requirement Must have 2 words";
        document.getElementById("emprequireErr").style.color = "red";
        document.getElementById("emprequire").style.borderColor = "red";
    }
     else if((!format5.test(a)) && x.name =="vacancy")
    {
        document.getElementById("vacancyErr").innerHTML = "Please Enter Numeric Value Only";
        document.getElementById("vacancyErr").style.color = "red";
        document.getElementById("vacancy").style.borderColor = "red";
    }
    else if((a.split(" ").length < 2) && x.name=="location")
    {
        document.getElementById("locationErr").innerHTML = "Location Must have 2 words";
        document.getElementById("locationErr").style.color = "red";
        document.getElementById("location").style.borderColor = "red";
    }
    else
    {
        if(x.name=="jtitle"){
            document.getElementById("jtitleErr").innerHTML = "\u2713";
            document.getElementById("jtitleErr").style.color = "green";
            document.getElementById("jtitle").style.borderColor = "";
        }
        else if(x.name=="jobdetail"){
            document.getElementById("jobdetailErr").innerHTML = "\u2713";
            document.getElementById("jobdetailErr").style.color = "green";
            document.getElementById("jobdetail").style.borderColor = "";
        }
        else if(x.name=="salary"){
            document.getElementById("salaryErr").innerHTML = "\u2713";
            document.getElementById("salaryErr").style.color = "green";
            document.getElementById("salary").style.borderColor = "";
        }
        else if(x.name=="emprequire"){
            document.getElementById("emprequireErr").innerHTML = "\u2713";
            document.getElementById("emprequireErr").style.color = "green";
            document.getElementById("emprequire").style.borderColor = "";
        }
        else if(x.name=="vacancy"){
            document.getElementById("vacancyErr").innerHTML = "\u2713";
            document.getElementById("vacancyErr").style.color = "green";
            document.getElementById("vacancy").style.borderColor = "";
        }
        else if(x.name=="location"){
            document.getElementById("locationErr").innerHTML = "\u2713";
            document.getElementById("locationErr").style.color = "green";
            document.getElementById("location").style.borderColor = "";
        }
        else if(x.name=="workplace"){
            document.getElementById("workplaceErr").innerHTML = "\u2713";
            document.getElementById("workplaceErr").style.color = "green";
            document.getElementById("workplace").style.borderColor = "";
        }
        else if(x.name=="jobtype"){
            document.getElementById("jobtypeErr").innerHTML = "\u2713";
            document.getElementById("jobtypeErr").style.color = "green";
            document.getElementById("jobtype").style.borderColor = "";
        }

    }

    
}