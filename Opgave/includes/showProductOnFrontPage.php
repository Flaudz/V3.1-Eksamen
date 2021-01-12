<?php
include 'database.php';

// Making a SQL stmt to get information from the database(We get $con from the database.php)
$stmt = $con->prepare("SELECT * FROM products");
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
                    Oprettet: Mandag d. 24/6-2019 af Mark
                </div>
                <p class="desc"><?= $row['bodyText'] ?>
                </p>
                <!-- Mulighed for sletning herunder -->
            </div>
        </article>
<?php
    }
}
?>