<?php
include "database.php";

// Params
$heading = $_POST['heading'];
$content = $_POST['content'];
$stars = $_POST['stars'];
$category = $_POST['category'];
$imgSrc = $_POST['imgSrc'];
$imgAlt = $_POST['imgAlt'];
$gender = $_POST['gender'];

echo $stars;
echo gettype($stars);
echo $gender;

// Making a prepare statement with the $con variable i got from database.php
$stmt = $con->prepare("INSERT INTO products (headline, imgSrc, imgAlt, bodyText, madeBy, stars, category, gender) VALUES (:headline, :imgSrc, :imgAlt, :bodyText, :madeBy, :stars, :category, :gender)");
// bindParams er lavet til at undgå SQL injection
$stmt->bindParam(':headline', $heading);
$stmt->bindParam(':imgSrc', $imgSrc);
$stmt->bindParam(':imgAlt', $imgAlt);
$stmt->bindParam(':bodyText', $content);
$stmt->bindParam(':madeBy', $_SESSION['uid']);
$stmt->bindParam(':stars', $stars);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':gender', $gender);
$stmt->execute();
header("Location: ../index.php");