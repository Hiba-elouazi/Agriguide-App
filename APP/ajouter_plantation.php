<!-- ajouter_plantation.php -->
<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Ajouter une plantation</title></head>
<body>
    <h2>Ajouter une nouvelle plantation</h2>
    <form action="enregistrer_plantation.php" method="POST">
        Nom de la plante : <input type="text" name="plante" required><br>
        Date de plantation : <input type="date" name="date_plantation" required><br>
        Surface (m²) : <input type="number" name="surface" step="0.01" required><br>
        Localisation : <input type="text" name="localisation"><br>
        <input type="submit" value="Enregistrer">
    </form>
    <!-- Dans ajouter_plantation.php -->
<div id="map" style="height: 300px;"></div>
<input type="hidden" name="localisation" id="localisation">

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<script>
    var map = L.map('map').setView([31.63, -7.99], 6); // Vue initiale (Maroc)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker;

    map.on('click', function(e) {
        var latlng = e.latlng.lat + ',' + e.latlng.lng;
        document.getElementById('localisation').value = latlng;

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }
    });
</script>

</body>
</html>
