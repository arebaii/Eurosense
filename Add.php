<!-- je fais un test ici -->
<!--****************************** FORMULAIRE *********************************************-->

<form action="index.php" method="POST" id="Add-FORM">

    <div class="field"  id=Add-Format>
    <!-- //Requete SQL -> tableaux déroulant des project ID de la table Project -->
        <h2> BDL (Project ID) </h2>
        <input type="text"  BDL (Project ID) list="idBdl" name="bdl" id="pjID">
        <!-- y a un 'ok' qui apparait -->
            <span id="bdlName"></span>
        <datalist id="idBdl">
        <?php   
            foreach ($PJID as $P) {
                echo "<option value=" . $P["project_id"] . ">";
            }
        ?>
        </datalist>

    <!-- //Fenêtre du choix du pays -->

        <h2>Storage Location </h2>
        <select name="country" class="text">
        
            <?php   
                foreach ($country as $c) {
                    echo "<option value=" . $c["country"] . ">" . $c['country'] . "</option>";
                }
            ?>
        </select>
        <!-- //Champ à remplir par l'utilisateur comportant le numéro du disk sur lequel est stocké la donnée -->
        <h2> N° Disk </h2>
        <input type="text" name="n_disk">
    </div>


    <div class="field" id=Add-DataType>
    <!-- //Deux choix -> Images et Orthos
    //Images -> LV0 / LV1 / LV2 / RAW
    //Images.LV2 -> RGB / CIR / PAN / RGBI -->
        <div id="Add-IMG">
            <h2> Image Data </h2>            
            <div>
                <!-- //Deux champs ou l'utilisateur doit remplir la premiére et derniére image acquise -->
                <div>
                    <!--
                    //Requete 
                     -> tableaux déroulant des dates disponible de la table mission flight
                    //En lien avec le project ID selectionné
                    // ET / OU BIEN : Calendar Menu -->
                    <div>
                        <h2> Mission date </h2>
                        <select name="country" class="text">
                        <?php/*   
                        foreach ($country as $c) {
                            echo "<option value=" . $c["country"] . ">" . $c['country'] . "</option>";
                        }
                        */?>
                        </select>
                    </div>

                    <!--*******Calendrier mis en place pour la premiére version
                        <input type="date" name="mission_date"
                            value="2021-01-01"
                            min="2018-01-01" max="2024-12-31">
                    -->

                    <div>
                        <h3> Image Start </h3>
                        <input type="text" name="image_start">
                    </div>
                    <div>
                        <h3> Image End </h3>
                        <input type="text" name="image_end">
                    </div>
                </div>

            <!-- //Chargement du shape -> Liens de l'éléments ? -> glissé déposé-->
                <div>
                    <h3> Polygone shape </h3>                   
                    <input type="file" name="image_geom">
                </div>
            </div>
            
            <div id="checkIMG">
                <div>
                <h3> Format </h3>
                <ul class="ul-checkbox">
                    <li><input type="checkbox" name="image_raw" id="img_R" value="true">
                    <label for="img_R">RAW</label></li>
                    <li><input type="checkbox" name="image_lv0" id="img_0" value="true">
                    <label for="img_0">LV0</label></li>
                    <li><input type="checkbox" name="image_lv2" id="img_2" value="true">  
                    <label for="img_2">LV2</label></li>
                    <li><input type="checkbox" name="image_lv3" id="img_3" value="true">  
                    <label for="img_3">LV3</label></li>
                </ul>
                </div>

                <div>    
                    <h3> Channels</h3>
                    <ul class="ul-checkbox">
                        <li><input type="checkbox" name="image_rvb" id="img_RVB" value="true" >
                        <label for="img_RVB">RVB</label></li>
                        <li><input type="checkbox" name="image_rvbi" id="img_RVBI" value="true">
                        <label for="img_RVBI">RVBI</label></li>
                        <li><input type="checkbox" name="image_pan" id="img_PAN" value="true" >  
                        <label for="img_PAN">PAN</label></li>
                        <li><input type="checkbox" name="image_cir" id="img_CIR" value="true" >  
                        <label for="img_CIR">CIR</label></li>
                    </ul>
                </div>
            </div>
            
        </div>
            
        <div id="Add-Ortho">
            <h2> OrthoImage Data </h2>
            <div>
                <h3> Format </h3>
                <ul class="ul-checkbox">
                <li><input type="checkbox" name="ortho_tif" id="Ortho_Tif" value="true">
                <label for="Ortho_Tif">TIF</label></li>
                <li><input type="checkbox" name="ortho_ecw" id="Ortho_ECW" value="true">
                <label for="Ortho_ECW">ECW</label></li>
                <li><input type="checkbox" name="ortho_jpg" id="Ortho_JPG" value="true">
                <label for="Ortho_JPG">JPG</label></li>
                </ul>
            </div>
            <div>
                <h3> Number of channels </h3>
                <ul class="ul-checkbox">
                <li><input type="checkbox" name="ortho_rvb" id="Ortho_RVB" value="true">
                <label for="Ortho_RVB">RVB</label></li>
                <li><input type="checkbox" name="ortho_rvbi" id="Ortho_RVBI" value="true">
                <label for="Ortho_RVBI">RVBI</label></li>
                <li><input type="checkbox" name="ortho_infrared" id="Ortho_I" value="true">
                <label for="Ortho_I">Infrared</label></li>
                </ul>
            </div>
            <div>
                <h3> Coding depth </h3>
                <ul class="ul-checkbox">
                <li><input type="checkbox" name="ortho_8bit" id="Ortho_"8b value="true">
                <label for="Ortho_8b">8 bytes</label></li>
                <li><input type="checkbox" name="ortho_16bit" id="Ortho_16b" value="true">
                <label for="Ortho_16b">16 bytes</label></li>
                </ul>
            </div>

            <div>
                <div>
                <h3> Orthoimage shape </h3>
                <input type="file" name="ortho_geom">
            </div> 

            <div>
                <h3> Text </h3>
                <input type="imput" name="ortho_text">
            </div>
            </div>
        </div>

        <div id="Add-Lidar">
        <h2> Lidar Data </h2>
            
                <h3> Lidar shape </h3>
                <input type="file" name="lidar_geom">
                
                <div>
                <h3> Lidar type of data </h3>
                <ul class="ul-checkbox">
                <li><input type="checkbox" name="lidar_rawdata" id="l_rawdata" value="true">
                <label for="l_rawdata">Raw Data</label></li>
                <li><input type="checkbox" name="lidar_rawgeodata" id="l_rawgeodata" value="true">
                <label for="l_rawgeodata">Raw georeferenced data</label></li>
                <li><input type="checkbox" name="lidar_rawblocktiles"  id="l_rawblocktiles" value="true">
                <label for="l_rawblocktiles">Raw block tiles</label></li>
                <li><input type="checkbox" name="lidar_adjusteddata"  id="l_adjusteddata" value="true">
                <label for="l_adjusteddata">Adjusted data</label></li>
                <li><input type="checkbox" name="lidar_adjustedfiltereddata"  id="l_adjustedfiltereddata" value="true">
                <label for="l_adjustedfiltereddata">Adjusted and filtered data</label></li>
                <li><input type="checkbox" name="lidar_delivery"  id="l_delivery" value="true">
                <label for="l_delivery">Delivery</label></li>
                </ul>
                </div>
 
            
        </div>     
    </div>
        <div class="field" id="Add-Project">
        <h2> Project </h2>
            <div>
                <h3> Project shape </h3>
                
                <input type="file" name="project_geom">
 
                <ul class="ul-checkbox">
                <li><input type="checkbox" name="project_aoi"  id="p_aoi" value="true">
                <label for="p_aoi">AOI</label></li>
                <li><input type="checkbox" name="project_dgps"  id="p_dgps" value="true">
                <label for="p_dgps">DGPS</label></li>
                <li><input type="checkbox" name="project_aet"  id="p_aet" value="true">
                <label for="p_aet">AET</label></li>
                <li><input type="checkbox" name="project_tiling"  id="p_tiling" value="true">
                <label for="p_tiling">TILING</label></li>
                </ul>
                <h3> Project others format </h3>
                <input type="text" name="project_text">
                
                    


 
            </div>
        </div>       
    
    

    <div id="Add-submit">
        <input type="reset" value="reset">
        <input type="submit" name="validate" value="validate" disabled="true">
    </div>

<?php





/*************************************************** VALIDATION ********************************************************************************/

/********************************************** Champ de validation ***********************************************************************/
$Field = array('bdl','country','mission_date','n_disk'); // Field obligatoire
$checkImg = array('image_start','image_end','image_raw','image_lv0','image_lv2','image_lv3','image_rvb','image_rvbi','image_pan','image_cir','image_geom'); // Field Image
$checkOrtho = array('ortho_tif','ortho_ecw','ortho_jpg','ortho_rvb','ortho_rvbi','ortho_infrared','ortho_8bit','ortho_16bit','ortho_geom'); // Field Orthoimage
$checkLidar = array('lidar_geom');  // Field Lidar
/*********************************************** ################## ***********************************************************************/


$data = ""; // Noms des champs à envoyer dans la requéte
$datavalue = ""; // Valeur à envoyer pour chaques champs dans la requéte


/*
                    Vérification des élément envoyé en POST

Pour chaque élément dans les tableaux "Field" / "checkImg" / "checkOrtho" / "checkLidar"
Si L'élément est bien présent --> isset($_POST( 'nom du champ envoyé en POST' ))
** pour les champs geom -> Et si la valeur est différentes de '' (rien)
==> Tu rajoute au tableau actuel ' .= ' 
    - dans $data = le nom du champ + 'virgule'
    - dans $datavalue = la valeur du champ + 'virgule'
*/

if(isset($_POST['validate'])) {

    foreach($Field as $a) {
        if(isset($_POST[$a])) {
            $data .= $a . ",";
            $datavalue .= "'" . $_POST[$a] . "',";
        }
    }
    
    foreach($checkImg as $img) {
        if(isset($_POST[$img])) {
            if($_POST[$img] != "") {
                $data .=$img . ",";
                $datavalue .= "'" . $_POST[$img] . "',";
            }
        }
    }

    foreach($checkOrtho as $ortho) {
        if(isset($_POST[$ortho])) {
            if($_POST[$ortho] != "") {
                $data .= $ortho . ",";
                $datavalue .= "'" . $_POST[$ortho] . "',";
            }
        }
    }    
    
    foreach($checkLidar as $lidar) {
        if(isset($_POST[$lidar])) {
            if($_POST[$lidar] != "") {
                $data .= $lidar . ",";
                $datavalue .= "'" .$_POST[$lidar] . "',";
            }
        }
    }

    // Requete d'insertion dans la table -> enleve la derniére valeur des tableau data et datavalue (une virgule)
    $req = "INSERT INTO public.prototype_table(". substr($data, 0, -1) .") VALUES(" . substr($datavalue, 0, -1) . ")";

    //Envoie de la requete
    $sendReq = pg_query($req);

    if($sendReq) {
        echo "<span>window.alert('requete envoyé')</span>";
    }
    else {
        echo "Erreur";
    }
}


?>


</form>
<script defer src="Formulaire.js"></script>
