<?php
$title = "Forside | FancyClothes.dk";
$description = "FancyClothes er en butik med masser af moderne modetøj til både mænd og kvinder til billige penge";
include "includes/header.php";
?>
<div class="container">
    <ul class="slider" id="slider">
        <li><img src="img/slide1.jpg" alt=""></li>
        <li><img src="img/slide2.jpg" alt=""></li>
        <li><img src="img/slide3.jpg" alt=""></li>
    </ul>
</div>
<hr class="hide400">
<h1 class="tagline">FancyClothes.DK - tøj, kvalitet, simpelt!</h1>
<hr>
<?php
if(isset($_SESSION['username'])){
    if($_SESSION['accesslevel'] < 3){
    ?>
<div class="createArticle container">

    <h3 class="center errorMsg">Opret ny vare:</h3>
    <form action="includes/insertArticle.php" method="post">
        <div>
            <label for="imgSrc">Billede</label>
            <input type="text" id="imgSrc" name="imgSrc" placeholder="Vælg billede" required>
        </div>
        <div>
            <label for="imgAlt">Alt tekst</label>
            <input type="text" id="imgAlt" name="imgAlt" placeholder="Billedets alttekst..." required>
        </div>
        <div>
            <label for="heading">Overskrift</label>
            <input type="text" id="heading" name="heading" placeholder="Overskrift..." required>
        </div>
        <div>
            <label for="content">Brødtekst</label>
            <textarea name="content" id="content" cols="30" rows="10" placeholder="Brødtekst..."></textarea>
        </div>
        <div>
            <label for="stars">Antal stjerner</label>
            <select name="stars" id="stars">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div>
            <label for="category">Kategori</label>
            <select name="category" id="category" required>
            <?php include "includes/showCategoryWhenMadeProducts.php" ?>
                <!-- <option value="jakker">Jakker</option>
                <option value="bukser">Bukser</option>
                <option value="skjorter">Skjorter</option>
                <option value="strik">Strik</option>
                <option value="tshirts">T-shirts og tanktops</option>
                <option value="tasker">Tasker</option> -->
            </select>
        </div>
        <div>
            <label for="gender">Køn</label>
            <select name="gender" id="gender">
                <option value="Mænd">Mænd</option>
                <option value="Kvinde">Kvinde</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Opret" name="value">
        </div>
    </form>

</div>
</div>
<?php
    }
}
?>
<main class="container">
    <aside>
        <div class="categories">
            <div class="catTop">
                <h4>Kategorier:</h4>
            </div>
            <div class="catMain">
                <ul>
                    <li><a href="#">Jakker</a></li>
                    <li><a href="#">Bukser</a></li>
                    <li><a href="#">Skjorter</a></li>
                    <li><a href="#">Strik</a></li>
                    <li><a href="#">T-shirts & Tank tops</a></li>
                    <li><a href="#">Tasker</a></li>
                </ul>
            </div>
        </div>

        <div class="newsletter">
            <div class="newsTop">
                <h4>Tilmeld nyhedsbrev</h4>
            </div>
            <div class="newsMain">
                <form action="">
                    <input type="text" placeholder="Navn">
                    <input type="email" placeholder="Email">
            </div>
            <div class="newsBottom">
                <input type="submit" value="Tilmeld">
                </form>
            </div>
        </div>
    </aside>
    <div class="products">
        <h3>INSPIRATION</h3>
        <hr>
        <div class="inspiration">
            <div class="catMen">
                <img src="img/kategoriHerre.jpg" alt="">
                <h5>Herretøj</h5>
                <div class="action">Lær mere</div>
            </div>
            <div class="catWomen">
                <img src="img/kategoriKvinde.jpg" alt="">
                <h5>Kvindetøj</h5>
                <div class="action">Lær mere</div>
            </div>
        </div>
        <div class="frontProducts">
            <?php
                include 'includes/showProductOnFrontPage.php';
            ?>
        </div>
    </div>
</main>
<?php
include "includes/footer.php";
?>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>');
    const makeDescSmaller = () => {
        let allDescriptions = document.querySelectorAll(".desc");
        allDescriptions.forEach(description => {
            let readMore = document.createElement("a");
            readMore.innerText = "Læs Mere...";
            let oldDesc = description.innerText;
            if (oldDesc.length >= 70) {
                let newDesc = oldDesc.substr(0, 60);
                description.innerText = `${newDesc}`;
            }
        });
    }
    makeDescSmaller();
</script>
<script src="js/plugins.js"></script>
<script src="js/slider.min.js"></script>
<script>
    $(window).on("load", function() {
        $("#slider").slider();
    });
</script>
</body>

</html>