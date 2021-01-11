<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "fancyclothes";

try{
    $con = new PDO("mysql:host=$dbServerName;dbname=$dbName;", $dbUserName, $dbPassword);
} catch(PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}