<?php
include "database.php";
// Params
$headline = $_POST['heading'];
$content = $_POST['content'];
$stars = intval($_POST['stars']);
$category = intval($_POST['category']);
$imgSrc = $_POST['imgSrc'];
$imgAlt = $_POST['imgAlt'];
$gender = $_POST['gender'];
echo $_SESSION['uid'];

// Making a prepare statement with the $con variable i got from database.php
$stmt = $con->prepare("INSERT INTO products (headline, imgSrc, imgAlt, bodyText, madeBy, stars, category, gender) VALUES ('$headline','$imgSrc','$imgAlt','$content','$_SESSION[uid]','$stars','$category','$gender');");
$stmt->execute();
// header("Location: ../index.php");