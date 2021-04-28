<?php 

require_once 'db_connect.php';

function addUser($tableName, $data){
    $conn = db_conn();
    $selectQuery = "INSERT into ".$tableName." (name, email, username, password, gender, dateofbirth, profilepicture, userType)
VALUES (:name, :email, :username, :password, :gender, :dateofbirth, :profilepicture, :userType)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':username' => $data['username'],
            ':password' => $data['password'],
            ':gender' => $data['gender'],
            ':dateofbirth' => $data['dateofbirth'],
            ':profilepicture' => $data['profilepicture'],
            ':userType' => $data['userType']
        ]);
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

function updateAdmin($tableName, $username, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set   name = ?, email = ?, dateofbirth = ?, gender = ? where username = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['email'], $data['dateofbirth'], $data['gender'], $username
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function updateCorporate($tableName, $username, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set   CompanyName = ?, Email = ?, Phone = ?, CompanyAddress = ?, TradeLicense = ? where Username = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['CompanyName'], $data['Email'], $data['Phone'], $data['CompanyAddress'], $data['TradeLicense'], $username
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function updateFreelancer($tableName, $username, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set   name = ?, email = ?, phone = ?, address = ? where username = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['email'], $data['phone'], $data['address'], $username
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updatePassword($tableName, $username, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set password = ? where username = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['password'], $username
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showUser($tableName, $columnName){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM ".$tableName." where username = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$columnName]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

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

function searchJobs($q){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM jobs WHERE JobTitle LIKE '%$q%' AND JobStatus = 'approved'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function deleteUser($tableName, $username){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `".$tableName."` WHERE Username = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}
function deletePost($tableName, $id){
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
function showJob($tableName, $id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM ".$tableName." where Job_id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}
function updateJobStatus($tableName, $id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set  JobStatus = ? where Job_id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['JobStatus'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function updateSeeker($tableName, $username, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE ".$tableName." set   name = ?, email = ?, phone = ?, gender = ?, dob = ? where username = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['email'], $data['phone'], $data['gender'], $data['dob'], $username
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

?>