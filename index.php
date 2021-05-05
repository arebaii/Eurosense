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
<<<<<<< HEAD
=======
    
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
    <link rel = "icon" href = "./icons/icon.png" type = "image/x-icon">
</head>
<body>

<<<<<<< HEAD
<!-- Authentification -->
<?php// include "Auth.php" ?>

<?php
//Comment this line if you want to desactivate connection
include "Connect.php"
?>

=======

<!-- Authentification
<?php// include "Auth.php" ?>

Connexion BDD postgres 

--> 
<?php include "Connect.php" ?>  
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7

<div id="logo">  <p>
    <img alt= "logo" src="./icons/logo_v2.png" id="logo"> </p>
</div>


<<<<<<< HEAD
<!-- tuto : https://grafikart.fr/tutoriels/tp-tabs-776 -->
<div class=page>
        <!-- Tabs function -> "tabs.js" -->
        <div id=Menu>
=======
<!--tuto : https://grafikart.fr/tutoriels/tp-tabs-776 -->
<div class=page>
    <div id=Menu>
        
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
        <ul class="tabs">
            <li class="active"><a href="#Add"> <img alt="icone add" src="icons/add.png" class="icone" id="img_add"> Add </a></li>
            <li><a href="#Edit"> <img alt="icone edit" src="icons/edit.png" class="icone" id="img_edit">Edit </a></li>
            <li><a href="#Delete"> <img alt="icone delete" src="icons/delete.png" class="icone" id="img_delete">Delete </a></li>
            <li><a href="#Search"><img alt="icone search" src="icons/search.png" class="icone" id="img_search"> Search </a></li>


            
        </ul>
        <div class="tabs-content">
            <div class="tab-content active" id="Add">
                <?php include "Add.php" ?>
            </div>
            <div class="tab-content" id="Edit"> 
                <?php include "Edit.php" ?>
            </div>
            <div class="tab-content" id="Delete">
                <?php include "Delete.php" ?>
            </div>
            <div class="tab-content" id="Search">
                <?php include "Search.php" ?>
            </div>
        </div>
    </div>

        <div id="Map">
        </div>
<<<<<<< HEAD
      
</div>  
=======

</div>    
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7

</body>
<script src="leaflet.js"></script>
<script defer src="Ajax.js"></script>
<script defer src="tabs.js"></script>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
