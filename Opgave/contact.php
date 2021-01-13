<?php
$title = "Om os | FancyClothes.dk";
$description = "Om os her kan du finde alle de oplysninger som du kan få brug for, for at komme i kontakt med os";
include 'includes/header.php';
?>
<div id="map">
</div>
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 57.660, lng: 10.463 },
            zoom: 12,
        });
    }
</script>
<script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4GKJQeKrp7yC7M3twHxhgETNkWE8oaAo&callback=initMap">
</script>
<?php
include 'includes/footer.php';
?>