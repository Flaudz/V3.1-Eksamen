<?php
include "database.php";

// Params
$userName = $_POST['userNameInput'];
$userPassword = $_POST['passwordInput'];
$password = password_hash($userPassword, PASSWORD_DEFAULT);

// Making a prepare statement with the $con variable we got from database.php
$statement = $con->prepare("SELECT * FROM USERS WHERE username = (:name)");
// Binding a value to (:name) that is in the SQL code above
$statement->bindParam(':name', $userName);
// Executing the SQL
$statement->execute();
// Here i check if the row count (Number of rows i got out of the SQL) is above 1
if($statement->rowCount() > 0){
    // If username then direct to login site
    header("Location: ../register.php?login=usernameExits");
}
else{
    // Making a prepare statement with the $con variable we got from database.php
    $stmt = $con->prepare("INSERT INTO users (username, password) VALUES (:name, :password)");
    // Mener at man bruger bindParam til at undgå sql injections
    $stmt->bindParam(':name', $userName);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    header("Location: ../index.php?register=success");
}
