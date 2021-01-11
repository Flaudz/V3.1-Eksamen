<?php
$title = "Register | FancyClothes.dk";
$description = "FancyClothes register side er en fatastisk side hvor du kan register dig som bruger på vores fatastiske side";
include "includes/header.php";
?>
<main class="container flex registerContainer">
    <form action="includes/registerUser.php" method="POST">
        <input class="passwordInput" type="text" name="userNameInput" placeholder="Username">
        <input class="passwordInput" type="password" name="passwordInput" placeholder="Password">
        <div class="RegisterButtonContainer flex">
            <button class="registerBtn" type="submit">Register</button>
        </div>
    </form>
</main>
<?php
include "includes/footer.php";
?>
</body>

</html>