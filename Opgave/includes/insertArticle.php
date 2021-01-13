<?php
include "database.php";

// Upload Image
// Tjekker hvis jeg har sat et billede ind
if(isset($_FILES['image'])) {
    // name stores the original filename from the client before it was uploaded
    $file_name = $_FILES['image']['name'];
    // tmp_name stores the name of the temporary file
    $file_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($file_tmp, "../img/" . $_FILES["image"]["name"]);
}


// Params
$headline = $_POST['heading'];
$content = $_POST['content'];
$stars = intval($_POST['stars']);
$category = intval($_POST['category']);
$imgSrc = "img/" . $_FILES["image"]["name"];
$imgAlt = $_POST['imgAlt'];
$gender = $_POST['gender'];

// Making a prepare statement with the $con variable i got from database.php
$stmt = $con->prepare("INSERT INTO products (headline, imgSrc, imgAlt, bodyText, madeBy, stars, category, gender) VALUES ('$headline','$imgSrc','$imgAlt','$content','$_SESSION[uid]','$stars','$category','$gender');");
$stmt->execute();
header("Location: ../index.php");