<?php
    include 'database.php';
    if(isset($_SESSION['username'])){
        $userId = intval($_GET['madeBy']);
        if($_SESSION['accesslevel'] == 1 || $userId == $_SESSION['uid']){
            $id = intval($_GET['id']);
            
            // Laver et prepared statement til at slette produktet
            $stmt = $con->prepare("DELETE FROM `products` WHERE `productId` = $id");
            $stmt->execute();
            header("Location: ../index.php?DeleteProduct=Success");
        }
        else{
            header("Location: ../index.php?DeleteProduct=Error");
        }
    }
    else{
        header("Location: ../index.php?DeleteProduct=Error");
    }
