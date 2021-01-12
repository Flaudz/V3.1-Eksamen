<?php
    include "database.php";
    // Making a prepared statement
    $stmt = $con->prepare("SELECT * FROM category");
    $stmt->execute();

    // Here i check if the row count (Number of rows i got out of the SQl) is above 0
    if($stmt->rowCount() > 0){
        // If it is then do a while loop with fetch to get the results
        while($row = $stmt->fetch()){
            // For hvert row laver jeg en li som viser kategory
            ?>
                <li><a href="index.php?category=<?= $row['categoryId'] ?>"><?= $row['categoryName'] ?></a></li>
            <?php
        }
    }
?>