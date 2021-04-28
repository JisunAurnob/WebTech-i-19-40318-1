<?php 

require_once 'db_connect.php';


function showAllData($tableName){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM '.$tableName.'';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showAllJob($tableName){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM '.$tableName.'';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function showJob($tableName, $columnName){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM ".$tableName." where Job_id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$columnName]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function showEmployee($tableName, $columnName){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM ".$tableName." where Username = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$columnName]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addCorporateEmployee($tableName, $data){
	$conn = db_conn();
    $selectQuery = "INSERT into ".$tableName." (Username, Email, Phone, CompanyName,CompanyAddress,TradeLicense,Password)
VALUES (:Username, :Email, :Phone, :CompanyName, :CompanyAddress, :TradeLicense, :Password)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':Username' => $data['Username'],
        	':Email' => $data['Email'],
        	':Phone' => $data['Phone'],
        	':CompanyName' => $data['CompanyName'],
            ':CompanyAddress' => $data['CompanyAddress'],
            ':TradeLicense' => $data['TradeLicense'],
            ':Password' => $data['Password']
            
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function addJob($tableName, $data){
    $conn = db_conn();
    $selectQuery = "INSERT into ".$tableName." (JobTitle, cname, JobDetail, Salary ,EmployeeRequirement, Vacancy, Location, Workplace, JobType, PostedBy, JobStatus)
VALUES (:JobTitle, :cname, :JobDetail, :Salary, :EmployeeRequirement, :Vacancy, :Location, :Workplace, :JobType, :PostedBy, :JobStatus)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':JobTitle' => $data['JobTitle'],
            ':cname' => $data['cname'],
            ':JobDetail' => $data['JobDetail'],
            ':Salary' => $data['Salary'],
            ':EmployeeRequirement' => $data['EmployeeRequirement'],
            ':Vacancy' => $data['Vacancy'],
            ':Location' => $data['Location'],
            ':Workplace' => $data['Workplace'],
            ':JobType' => $data['JobType'],
            ':PostedBy' => $data['PostedBy'],
            ':JobStatus' => $data['JobStatus']
            
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateJob($tableName, $id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set JobTitle = ?, JobDetail = ?, Salary = ?, EmployeeRequirement = ?, Vacancy = ?, Location = ?,  Workplace = ?,  JobType = ? where Job_id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['JobTitle'], $data['JobDetail'], $data['Salary'], $data['EmployeeRequirement'],  $data['Vacancy'],  $data['Location'],  $data['Workplace'],  $data['JobType'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteJob($tableName, $id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `".$tableName."` WHERE Job_id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}


function checkUsername($tableName, $username){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM ".$tableName." where username = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function loginCheck($tableName, $username, $password){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM ".$tableName." where username = ? AND password = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username, $password]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function changePassword($tableName, $username, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set password = ? where username = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Password'], $username
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateEmployee($tableName, $username, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set  email = ?, phone = ?, image = ? where username = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Email'], $data['Phone'], $data['Image'], $username
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



function updateProduct($tableName, $id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set Name = ?, BuyingPrice = ?, SellingPrice = ?, display = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['Name'], $data['BuyingPrice'], $data['SellingPrice'], $data['display'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteProduct($tableName, $id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `".$tableName."` WHERE id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function searchProduct($name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `product` WHERE Name LIKE '%$name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}