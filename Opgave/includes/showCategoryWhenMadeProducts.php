<?php
include "database.php";

// Making a prepare statement with the $con variable
$stmt = $con->prepare("SELECT * FROM category");
// Executing the statement
$stmt->execute();

// Here i check if the row count (Number of rows i got out of the SQl) is above 0
if($stmt->rowCount() > 0){
    // If it is then do a while loop with fetch to get the results
    while($row = $stmt->fetch()){
        ?>
            <option value="<?= $row['categoryId'] ?>"><?= $row['categoryName'] ?></option>
        <?php
    }
}