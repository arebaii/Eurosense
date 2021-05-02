<?php
/****************************** CONNECTION TO BDD *********************************************/
//Change parameters of pg_connect

$link = pg_connect("host=localhost dbname=Geodev user=postgres password=postgres");
if (!$link) {
    die('Erreur de connexion');
  }
?>



<?php
/****************************** Query -> BDD *********************************************/

//Get list of country in table list_country
$queryCountry = 'SELECT country FROM list_country';
$resultCountry = pg_query($queryCountry);
$i = 0;
while ($row = pg_fetch_assoc($resultCountry)) {
    $country[$i] = $row;
    $i++;
}

//Get Project_id in project table
$queryProjID = 'SELECT project_id FROM "Project"';
$resultProjID = pg_query($queryProjID);
$i = 0;
while ($row = pg_fetch_assoc($resultProjID)) {
    $BDLP[$i] = $row;
    $i++;
}

//Get BDL in API table
$queryBDL = 'SELECT bdl FROM prototype_table';
$resultBDL = pg_query($queryBDL);
$i = 0;
while ($row = pg_fetch_assoc($resultBDL)) {
    $APIBDL[$i] = $row;
    $i++;
}


?>