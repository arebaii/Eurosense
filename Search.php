
<form action="index.php#Search" method="POST" id="Search-FORM">
    <div class="field"  id=Search-BDL>
    <!-- //Requete SQL -> tableaux déroulant des project ID de la table Project -->
        <h2> BDL (Project ID) </h2>
        <input type="text" list="Search_Bdl" class="search-field" name="Searchbdl" id="Search_bdl" value="">
        <span id="bdlName"></span>
        <datalist id="Search_Bdl">
        <?php   
            foreach ($BDL as $B) {
                echo "<option value=" . $B["bdl"] . ">";
            }
        ?>
        </datalist>

        <select name="Searchstorage_location" id="Search_Storage">
                <option value="" disabled selected>Select location</option>
                <?php   
                foreach ($country as $c) {
                    echo "<option value=" . $c["country"] . ">" . $c['country'] . "</option>";
                }
                ?>
        </select>

        <input type="checkbox" name="image_checker" value="false" id="Search_image">
        <label for="SearchImage">Image</label>
        <input type="checkbox" name="ortho_checker" value="false" id="Search_ortho">
        <label for="SearchOrtho">OrthoImage</label>
        <input type="checkbox" name="lidar_checker" value="false" id="Search_lidar">
        <label for="SearchLidar">Lidar</label>
        <input type="checkbox" name="project_checker" value="false" id="Search_project">
        <label for="SearchLidar">Project</label>
    </div>

    <div id="Search-submit">
    <input type="reset" value="reset">
    <input type="submit" name="validateSearch" value="validate" id=VSearch>
    </div>




<?php
$SearchField = array('Searchbdl', 'Searchstorage_location');
$SearchCheck = array('image_checker','ortho_checker','lidar_checker','project_checker');

$SEARCHdata = ""; // Noms des champs à envoyer dans la requéte
$Searchreq = null;
$SearchResult = null;

if(isset($_POST['Searchbdl'])) {
    if($_POST['Searchbdl'] != "") {
        $Sbdl = $_POST['Searchbdl'];
        $SEARCHdata .= "bdl LIKE '$Sbdl' AND ";
    }
}

if(isset($_POST['Searchstorage_location'])) {
    $Sstorage = $_POST['Searchstorage_location'];
    $SEARCHdata .= "storage_location LIKE '$Sstorage' AND ";
}

if(isset($_POST['validateSearch'])) {
    foreach($SearchCheck as $sf) {
        if(isset($_POST[$sf])) {
                $SEARCHdata .= $sf . " = " . $_POST[$sf] . " OR "; 
        }
    }
    
    if ($SEARCHdata != "") {

        $Searchreq = "SELECT DISTINCT n_disk, storage_location FROM public.prototype_table WHERE " . substr($SEARCHdata, 0, -4);
        
        echo $Searchreq;
        //Envoie de la requete
        if ($Sresult = pg_query($Searchreq)){
        
            while ($Srow = pg_fetch_assoc($Sresult)) {
                $SearchResult[$i] = $Srow;
                $i++;
            }

            /*
            $feature = array(
                'type' => 'Feature'
                ,'properties' => $SearchResult);
            $Rjson = array(
                    'type'      => 'FeatureCollection',
                    'features'  => $feature
                    );
    
            echo json_encode($Rjson);
            */
            
            if($SearchResult != null) {
                ?>
                <table>
                <?php
                foreach($SearchResult as $sr) {
                    echo"<tr>";
                    echo "<td>" .  $sr["n_disk"] . "</td><td>" .$sr["storage_location"] ."</td>";
                    echo"</tr>";
                }         
                ?>
                </table>
                <?php

            } 
            else {
                echo "0 Result";
            }
        }   
    }
    
}


?>
</form>