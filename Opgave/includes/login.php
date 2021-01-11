<?php
include 'database.php';
// Params
$userName = $_POST['formUsername'];
$password = $_POST['formPassword'];

// Making a prepare statement with the $con variable
$statement = $con->prepare("SELECT * FROM users WHERE username = (:name)");
// Binding a value to (:name) that is in the SQL code above
$statement->bindParam(':name', $userName);
// Executing the SQL
$statement->execute();
// Here i check if the row count (Number of rows i got out of the SQl) is above 0
if($statement->rowCount() > 0){
    // If it is then do a while loop with fetch to get the results
    while($row = $statement->fetch()){
        $checkPassword = password_verify($password, $row['password']);
        // Checking if the hased password is equel to the password input
        // Just a extra check about the username just to be sure
        echo $checkPassword;
        if($row["username"] == $userName && $checkPassword == 1){
            // If the password is true the i make 2 session to keep information about what account the user is logged in to
            $_SESSION["uid"] = $row['id'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["accesslevel"] = $row['accesslevel'];
            header("Location: ../index.php");
        }
        else{
            // If the password is wrong the is will direct to the login site and make some extra url
            header("Location: ../index.php?login=Error");
        }
    }
}
else{
    // If username does not exist then direct to index site
    header("Location: ../index.php?login=Error");
}