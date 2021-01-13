<?php
include "includes/database.php";
if (isset($_POST['callFunc1'])) {
    // Får id fra ajax kald nede i javascript
    $id = intval($_POST['callFunc1']);
    
    // Laver et prepared statement til at slette produktet
    $stmt = $con->prepare("DELETE FROM `products` WHERE `productId` = $id");
    $stmt->execute();
}
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
    <!-- Grunden til enctype="multipart" er at hvis man sender flere forskellige slags data skal man fortælle det til formen -->
    <form action="includes/insertArticle.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="imgSrc">Billede</label>
            <input type="file" name="image">
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
            <textarea name="content" id="textarea" cols="30" rows="10" placeholder="Brødtekst..."></textarea>
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
                    <?php include "includes/showCategorys.php"; ?>
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
    window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
</script>
<script src="js/plugins.js"></script>
<script src="js/slider.min.js"></script>
<script src="js/activeLinks.js"></script>
<script src="https://cdn.tiny.cloud/1/kdg5ovhsls0qt0smv5v3gj4dighxakp8kq85crqvtfp6jqr0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(window).on("load", function() {
        $("#slider").slider();
    });

    // Mit Javascript
    // Slet Produkt
    const deleteBtn = document.querySelectorAll(".deleteProduct");
    deleteBtn.forEach(btn => {
        btn.addEventListener("click", e =>{
            const id = e.target.id;
            $.ajax({
                url: 'index.php',
                type: 'post',
                data: {
                    "callFunc1": id
                },
                success: function(response) {
                }
            });
        })
    });

    // TinyMCE
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
</script>
</body>

</html>