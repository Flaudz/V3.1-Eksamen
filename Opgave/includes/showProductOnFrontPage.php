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
                <p>Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrenes opmærksomhed. Alle undtagen én. Hun forblev tro mod sig selv - en unik, selvsikker og uforanderlig skønhed - hende, alle fyrene ville ha'. En Odd Molly! - som ikke er et koncept, men autentisk! – et brand, hvis kollektioner er vildt smukke og inderlige, som der altid vil være brug for - dengang, nu, såvel som i fremtiden.
                    <a href="#">Læs mere...</a>
                </p>
                <!-- Mulighed for sletning herunder -->
            </div>
        </article>
<?php
    }
}
?>