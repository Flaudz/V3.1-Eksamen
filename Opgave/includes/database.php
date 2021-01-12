<?php
// Her tjekker vi om session er startet
if(session_status() == PHP_SESSION_NONE){
    // Hvis sessionen ikke er startet starter vi den
    session_start();
    // På den her måde ungår vi fejl når vi includer flere filer der starter session
}
// Databasens login information
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "fancyclothes";

// Her bruger vi en try catch til error handling
try{
    $con = new PDO("mysql:host=$dbServerName;dbname=$dbName;", $dbUserName, $dbPassword);
} catch(PDOException $e) {
    // PDOExecption repræsenter sin som en fejl lavet med PDO.
    // Hvis den ikke kan tilslutte sig databasen til den kommer her ned og "throw" en fejl

    echo "connection failed: " . $e->getMessage();
}