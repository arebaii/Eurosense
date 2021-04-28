<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api Eurosense</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
    
    <link rel = "icon" href = "./icons/icon.png" type = "image/x-icon">
</head>
<body>


<!-- Authentification
<?php// include "Auth.php" ?>

Connexion BDD postgres 

--> 
<?php// include "Connect.php" ?>  

<div id="logo">  <p>
    <img alt= "logo" src="./icons/logo_v2.png" id="logo"> </p>
</div>


<!--tuto : https://grafikart.fr/tutoriels/tp-tabs-776 -->
<div class=page>
        <section class="addVectorLayer">
                <form action="" method="POST" class="vector">
                    choisir un fichier
                    <input type="file" name="files" id="input_files">
                </form>
        </section>
        
        <div id="Map"> </div>

</div>    

</body>

<script src="leaflet.js"></script>
<script defer src="Ajax.js"></script>

</html>