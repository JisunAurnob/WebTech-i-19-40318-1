 <?php
 session_start();

 require_once '../model/model.php';
$table= 'corporate';
$corpEmployee = showEmployee($table, $_SESSION['username']);
$tableName = 'jobs';

$check=1;
$jtitleErr = $jobdetailErr = $salaryErr = $emprequireErr= $vacancyErr = $locationErr =$workplaceErr = $jobtypeErr = $compnameErr ="";
$jtitle = $jobdetail = $salary = $emprequire = $vacancy = $location =$workplace = $jobtype = $compname= "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //job title
  if (empty($_POST["jtitle"])) {
    $jtitleErr = "Job Title is required";
    $check=0;
    //header("location:../postJob.php");
  } else {
    $jtitle = test_input($_POST["jtitle"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$jtitle)) {
      $jtitleErr = "Only letters white space, period & dash allowed";
      $jtitle ="";
      $check=0;
    }
    else if (str_word_count($jtitle)<1) {
      $jtitleErr = "At least one words needed";
      $jtitle ="";
      $check=0;
    }
  }

  //job details
  
 if (empty($_POST["jobdetail"])) {
   $jobdetailErr = "*Please Fill up job details";
     $check=0;
  } else {

     $jobdetail =test_input($_POST["jobdetail"]);
     //$check=1;

    if (!preg_match("/^[a-zA-Z-'._ ]*$/",$jobdetail)) {
     $jobdetailErr= "*Can contain a-z,A-Z,period,dash,underscrone only";
      $jobdetail="";
      $check=0;

    }

    else if(str_word_count($jobdetail)<2)
    {
       $jobdetailErr = "*must contain 2 words";
       $jobdetail="";
        $check=0;
    }
   
  }

  //salary
  

if(empty($_POST["salary"])){

  $salaryErr="*fill up salary";
  $salary="";
  $check=0;
}

else
{
  $salary= test_input($_POST["salary"]);
  //$check=1;

 if(!preg_match("/^[0-9]*$/", $salary))
  {
    $salaryErr="Please Enter Numeric Value Only";
    $salary="";
    $check=0;
  }

}

//Employee Requirement 



   if (empty($_POST["emprequire"])) {
   $emprequireErr= "*Please Enter Employee Requirements";
   $emprequire="";
   $check=0;

  } else {

     $emprequire=test_input($_POST["emprequire"]);
     //$check=1;

    if (!preg_match("/^[a-zA-Z-'._ 0-9]*$/",$emprequire)) {
     $emprequireErr = "*Cannot contain Spacial Characters";
     $emprequire="";
      $check=0;

    }

    else if(str_word_count($emprequire)<2)
    {
       $emprequireErr= "*must contain 2 words";
       $emprequire="";
        $check=0;
    }
   
  }

  //Vacancy


if(empty($_POST["vacancy"])){

  $vacancyErr ="*Enter vacancy";
  $vacancy="";
  $check=0;
}

else
{
  $vacancy= test_input($_POST["vacancy"]);
  //$check=1;

 if(!preg_match("/^[0-9]*$/", $vacancy))
  {
    $vacancyErr ="Please Enter Numeric Value Only";
    $vacancy ="";
    $check=0;
  }

}

//Location


   if (empty($_POST["location"])) {
   $locationErr= "*Location is Require";
   $location="";
   $check=0;

  } else {

     $location=test_input($_POST["location"]);
     //$check=1;

    // if (!preg_match("/^[a-zA-Z-'._ ]*$/",$location)) {
    //  $locationErr = "*Can contain a-z,A-Z,period,dash,underscrone only";
    //  $location="";
    //   $check=0;

    // }

    if(str_word_count($location)<2)
    {
       $locationErr= "*must contain 2 words";
       $location="";
        $check=0;
    }
   
  }


  //workplace


  if(empty($_POST['workplace'])){
   $workplaceErr = "*You must select a Workplace";
    $workplace ="";
    $check=0;
  }

   else{
    $workplace= test_input($_POST["workplace"]);

    }


 //jobtype

    if(empty($_POST['jobtype'])){
    $jobtypeErr = "*You must select a Job Type";
     $jobtype="";
     $check=0;
   }
    else{
     $jobtype= test_input($_POST["jobtype"]);
    }




 if($check==0){
    $args = array(
    'jtitleErr' => $jtitleErr,
    'jobdetailErr' => $jobdetailErr,
    'salaryErr' => $salaryErr,
    'emprequireErr' => $emprequireErr,
    'vacancyErr' => $vacancyErr,
    'locationErr' => $locationErr,
    'workplaceErr' => $workplaceErr,
    'jobtypeErr' => $jobtypeErr
);
      header("location:../view/postJob.php?" . http_build_query($args));
   }


  if($check == 1 )
 {

   if(isset($_POST["submit"])){

  $data['JobTitle'] = $jtitle;
  $data['cname'] = $corpEmployee['CompanyName'];
  $data['JobDetail'] = $_POST['jobdetail'];
  $data['Salary'] = $_POST['salary'];
  $data['EmployeeRequirement'] = $_POST['emprequire'];
  $data['Vacancy'] = $_POST['vacancy'];
  $data['Location'] = $_POST['location'];
  $data['Workplace'] = $_POST['workplace'];
  $data['JobType'] = $_POST['jobtype'];
  $data['PostedBy'] = $_SESSION['username'];
  $data['JobStatus'] = 'pending';

  if (addJob($tableName,$data)) {
    header('Location: ../view/corporateEmployer.php?successMsg=Job Added Successfully');
  }
   else{
        $dberror = '<br><label>Data Not stored in database<br>';
           header('location:../view/corporateEmployer.php?successMsg=' .$dberror);  
  }


   }

    else {
  echo 'You are not allowed to access this page.';
}

 }
 



     if($check == 1 )
 {
   if(isset($_POST["submit"]))
   {
    if(file_exists('C:/xampp/htdocs/WT Lab Task/Final Project/docs/postJob.json'))  
    
           {  
                $current_data = file_get_contents('C:/xampp/htdocs/WT Lab Task/Final Project/docs/postJob.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'Job Title'         =>        $_POST['jtitle'],
                     'Job Details'             =>        $_POST['jobdetail'],
                     'Salary'             =>        $_POST['salary'],
                     'Employee Requirement'          =>        $_POST['emprequire'],
                     'Vacancy'      =>        $_POST['vacancy'],
                     'Location'   =>        $_POST['location'],
                     'Workplace'     =>        $_POST['workplace'], 
                     'Job type'          =>        $_POST['jobtype']     
                     
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('C:/xampp/htdocs/WT Lab Task/Final Project/docs/postJob.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>"; 
                     // header("location:corporateEmployer.php"); 
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           } 
   }
 }



}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>