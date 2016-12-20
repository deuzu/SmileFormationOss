<?php

require_once "./services/sqlDriverService.php";


/**
 * @param $login
 * @param $password
 * @param $name
 * @param string $role
 * @return bool
 */
function createUser($login, $password,$role="USER", $firstName = '', $lastName = '', $phone = '',$email='') {
  
    $convertedPassword = sha1($password);
     
  
    $dbh = getDatabaseConnection();
    
     
    $sql = "INSERT INTO users (login,role,firstName,lastName,email,password,phone)
            VALUES (:login,:role,:firstName,:lastName,:email,:password,:phone)";
    
    $stmt = $dbh->prepare($sql);
    
    $stmt->bindValue(':login', $login,PDO::PARAM_STR);
    $stmt->bindValue(':role', $role,PDO::PARAM_STR);
    $stmt->bindValue(':firstName', $firstName,PDO::PARAM_STR);
    $stmt->bindValue(':lastName', $lastName,PDO::PARAM_STR);
    $stmt->bindValue(':email', $email,PDO::PARAM_STR);
    $stmt->bindValue(':password', $convertedPassword,PDO::PARAM_STR);
    $stmt->bindValue(':phone', $phone,PDO::PARAM_STR);


    return $stmt->execute();

}


function updateUser($user) {

    $dbh = getDatabaseConnection();

    $sql = "UPDATE users 
            SET 
                role = :role, 
                firstName = :firstName, 
                lastName = :lastName,  
                email = :email,  
                phone = :phone
                
            WHERE ID = :id ";

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':role', $user['role'],PDO::PARAM_STR);
    $stmt->bindValue(':firstName', $user['firstName'],PDO::PARAM_STR);
    $stmt->bindValue(':lastName', $user['lastName'],PDO::PARAM_STR);
    $stmt->bindValue(':email', $user['email'],PDO::PARAM_STR);
    $stmt->bindValue(':phone', $user['phone'],PDO::PARAM_STR);
    $stmt->bindParam(':id', $user['ID']);

    return $stmt->execute();
}

function deleteUser($user){

    $dbh = getDatabaseConnection();

    $sql = "DELETE FROM users
            WHERE ID = :id";

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':id', $user['ID']);

    return $stmt->execute();
}