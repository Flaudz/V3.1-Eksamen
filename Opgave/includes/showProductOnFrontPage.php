<?php
include 'database.php';
$stmt;
// Tjekker hvis url har ?category=1
if(isset($_GET['category'])){
    // Hvis den har tager jeg i dette tilfælde 1 og laver om til en int
    $category = intval($_GET['category']);
    // Making a SQL stmt to get information from the database(We get $con from the database.php)
    $stmt = $con->prepare("SELECT * FROM products WHERE category = $category");
}
else{
    // Hvis den ikke har dette så viser den bare alle produkter
    // Making a SQL stmt to get information from the database(We get $con from the database.php)
    $stmt = $con->prepare("SELECT * FROM products");
}
$stmt->execute();
// Here i check if the row count (Number of rows i got out of the SQl) is above 0
if ($stmt->rowCount() > 0) {
    // If it is then do a while loop with fetch to get the results
    while ($row = $stmt->fetch()) {
        $number = intval($row['stars']);

?>
        <article>
            <img src="<?= $row['imgSrc'] ?>" alt="<?= $row['imgAlt'] ?>">
            <div class="info">
                <h3><?= $row['headline'] ?></h3>
                <div class="stars">
                    <?php
                    for ($i = 0; $i < intval($row['stars']); $i++) {
                    ?>
                        <i class='fa fa-star' aria-hidden='true'></i>
                    <?php
                    }
                    while ($number < 5) {
                    ?>
                        <i class='fa fa-star-o' aria-hidden='true'></i>
                    <?php
                        $number++;
                    }
                    ?>
                </div>
            </div>
            <div class="description">
                <div class="published">
                    Lavet: <?= $row['dateMade'] ?>
                </div>
                <p class="desc"><?= $row['bodyText'] ?>
                </p>
                <?php
                // Hvis Session (Username) er sat skal den tjekke om man har lavet produktet eller at man er accesslevel 1
                // Hvis man ikke er kan man ikke slette produktet
                // Men hvis man er kan man
                if (isset($_SESSION['username'])) {

                    if ($row['madeBy'] == $_SESSION['uid'] || $_SESSION['accesslevel'] == 1) {
                ?>
                        <a class="deleteProduct" id="<?= $row['productId'] ?>">X</a>
                <?php

                    }
                }
                ?>
            </div>
        </article>
<?php
    }
}
?>