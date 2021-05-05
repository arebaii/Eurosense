<<<<<<< HEAD
<!--************************************* FORM ADD **************************************************-->
=======

<!--****************************** FORMULAIRE *********************************************-->
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7

<form action="index.php#Add" method="POST" id="Add-FORM">

    <div class="field"  id=Add-Format>
<<<<<<< HEAD
    <!-- Set Rolling table of BDL of the project table -->
=======
    <!-- //Requete SQL -> tableaux déroulant des project ID de la table Project -->
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
        <div>
            <h3> BDL (Project ID) </h3>
            <input type="text"  BDL (Project ID) list="idBdl" name="bdl" id="pjID">
            <datalist id="idBdl">
            <?php   
<<<<<<< HEAD
                // Get result of all BDL in project table -> Connect.php Line 25
                foreach ($BDLP as $BDLPoject) {
                    echo "<option value=" . $BDLPoject["project_id"] . ">";
                }
            ?>
            </datalist>
        </div>

    <!-- Set select table of country of list_country table -->
        <div>
            <h3>Storage Location </h3>
            <select name="storage_location" class="text">
                <?php   
                    // Get result of all country in API table -> Connect.php Line 16
                    foreach ($country as $location) {
                        echo "<option value=" . $location["country"] . ">" . $location['country'] . "</option>";
=======
                foreach ($PJID as $P) {
                    echo "<option value=" . $P["project_id"] . ">";
                }
            ?>
            </datalist>
        </div>   
    <!-- //Fenêtre du choix du pays -->

        <div>
            <h3>Storage Location </h3>
            <select name="storage_location" class="text">
            
                <?php   
                    foreach ($country as $c) {
                        echo "<option value=" . $c["country"] . ">" . $c['country'] . "</option>";
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
                    }
                ?>
            </select>
        </div>
<<<<<<< HEAD

    <!-- N° OF DISK -->
=======
        <!-- //Champ à remplir par l'utilisateur comportant le numéro du disk sur lequel est stocké la donnée -->
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
        <div>
            <h3> N° Disk </h3>
            <input type="text" name="n_disk">
        </div>
<<<<<<< HEAD
        
    </div>
    

    <div class="field" id=Add-DataType>
    <!-- FIELDS OF IMAGE DATA -->
        <hr>
        <div id="Add-IMG">
            
            <h2> Image Data </h2>            
            <div>
                <div>
=======
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
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
                    <div>
                        <h3> Mission date </h3>
                        <select name="image_mission_date" class="text">
                        <?php/*   
                        foreach ($country as $c) {
                            echo "<option value=" . $c["country"] . ">" . $c['country'] . "</option>";
                        }
                        */?>
                        </select>
                    </div>

<<<<<<< HEAD
                    <!--    ******* CALENDAR MENU *******
=======
                    <!--*******Calendrier mis en place pour la premiére version
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
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
<<<<<<< HEAD
            </div>
         
            <div id="checkIMG">
                <div>
                        <h3> Polygone shape </h3>                   
        
                        <div class="file-input">
                            <input type="file"  id="file" class="file" name="image_geom" multiple>
                            <label for="file">
                            Select .shp .shx .dbf
                                <p class="file-name"></p>
                            </label>
                        </div>

                        <div>
                            <h3> Srid Image  </h3>
                            <input type="text" name="srid_image">
                        </div>

                    </div>       
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
        
        <!-- FIELDS OF ORTHOIMAGE DATA -->
        <hr>
        <div id="Add-Ortho">
            <h2> OrthoImage Data </h2>
                <div>
                
                    <div>
                        <div>
                            <h3> Orthoimage shape </h3>
                            <div class="file-input">
                                <input type="file"  class="file">
                                <label for="file">Select file <p class="file-name"></p></label> 
                            </div>
                        </div> 

                        <div>
                            <div>
                                <h3> Srid Orthoimage </h3>
                                <input type="text" name="srid_ortho" class="text_ortho">
                            </div>
                        </div>
                    </div>


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
                        <li><input type="checkbox" name="ortho_8bit" id="Ortho_8b" value="true">
                        <label for="Ortho_8b">8 bytes</label></li>
                        <li><input type="checkbox" name="ortho_16bit" id="Ortho_16b" value="true">
                        <label for="Ortho_16b">16 bytes</label></li>
                        </ul>
                        <div>
                                <h3> Text  </h3>
                                <input type="text" name="ortho_text" class="text_ortho">
                            </div>
                    </div>

                    
            </div>
        </div>

        <!-- FIELDS OF LIDAR DATA -->
        <hr>
        <div id="Add-Lidar"> 
            
            <h2> Lidar Data </h2>
            <div class='flex-format'>   
                    <div>
                        <h3> Lidar shape </h3>
                            <div class="file-input">
                                <input type="file"  class="file" id="LidarGeom" name="input_lidar_geom" multiple>
                                <input name="lidar_geom" id="RLGeom" value="" hidden>
                                <label for="file">Select .shp .shx .dbf <p class="file-name"></p></label> 
                            </div>
                            <div>
                                <h3> Srid Lidar </h3>
                                <input type="text" name="srid_lidar">
                            </div>
                    </div>
                    
                    <div>
                        <h3> Lidar type of data </h3>
                        <ul class="ul-checkbox">
                            <li><input type="checkbox" name="lidar_raw_data" id="l_rawdata" value="true">
                            <label for="l_rawdata">Raw Data</label></li>
                            <li><input type="checkbox" name="lidar_raw_georeferenced_data" id="l_rawgeodata" value="true">
                            <label for="l_rawgeodata">Raw georeferenced data</label></li>
                            <li><input type="checkbox" name="lidar_raw_block_tiles"  id="l_rawblocktiles" value="true">
                            <label for="l_rawblocktiles">Raw block tiles</label></li>
                            <li><input type="checkbox" name="lidar_adjusted_data"  id="l_adjusteddata" value="true">
                            <label for="l_adjusteddata">Adjusted data</label></li>
                            <li><input type="checkbox" name="lidar_adjusted_and_filtered_data"  id="l_adjustedfiltereddata" value="true">
                            <label for="l_adjustedfiltereddata">Adjusted and filtered data</label></li>
                            <li><input type="checkbox" name="lidar_delivery"  id="l_delivery" value="true">
                            <label for="l_delivery">Delivery</label></li>
                        </ul>
                    </div>
            </div>
        </div>  
    </div>   
    


        <!-- FIELDS OF PROJECT DATA -->
        <hr>
        <div class="field" id="Add-Project">
            
            <h2> Project </h2>
                <div class='flex-format' >
                    <div>
                        <h3> Project shape </h3>
                        <div class="file-input">
                                    <input type="file" class="file" id="ProjectGeom" name="input_project_geom" multiple>
                                    <input name="project_geom" id="RPGeom" value="" hidden>
                                    <label for="file">Select .shp .shx .dbf <p class="file-name"></p></label> 
                        </div>


                        <h3> Srid Project </h3>
                        <input type="text" name="srid_project">
                        
                        <h3> Project others format </h3>
                        <input type="text" name="project_others">

                        
                        
                            
                    </div> 
                    
                    <div>
                        <h3>Project options</h3>
                        <ul class="ul-checkbox">
                            <li><input type="checkbox" name="project_aoi"  id="p_aoi" value="true">
                            <label for="p_aoi">AOI</label></li>
                            <li><input type="checkbox" name="project_dgps"  id="p_dgps" value="true">
                            <label for="p_dgps">DGPS</label></li>
                            <li><input type="checkbox" name="project_aet"  id="p_aet" value="true">
                            <label for="p_aet">AET</label></li>
                            <li><input type="checkbox" name="project_tilings"  id="p_tiling" value="true">
                            <label for="p_tiling">TILING</label></li>
                        </ul>
                    </div>
                </div>
        </div> 
    
=======

            <!-- //Chargement du shape -> Liens de l'éléments ? -> glissé déposé-->
                
            </div>
            
            <div id="checkIMG">
                <div>
                    <h3> Polygone shape </h3>                   
                    <input type="file" name="image_geom">
                </div>
                
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
                <li><input type="checkbox" name="ortho_8bit" id="Ortho_8b" value="true">
                <label for="Ortho_8b">8 bytes</label></li>
                <li><input type="checkbox" name="ortho_16bit" id="Ortho_16b" value="true">
                <label for="Ortho_16b">16 bytes</label></li>
                </ul>
            </div>

            <div>
                <div>
                <h3> Orthoimage shape </h3>
                <input type="file"  name="ortho_geom">
            </div> 

            <div>
                <h3> Text </h3>
                <input type="text" name="ortho_text">
                <label for="file">Choose ORTHO a file</label>
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
                <li><input type="checkbox" name="lidar_raw_data" id="l_rawdata" value="true">
                <label for="l_rawdata">Raw Data</label></li>
                <li><input type="checkbox" name="lidar_raw_georeferenced_data" id="l_rawgeodata" value="true">
                <label for="l_rawgeodata">Raw georeferenced data</label></li>
                <li><input type="checkbox" name="lidar_raw_block_tiles"  id="l_rawblocktiles" value="true">
                <label for="l_rawblocktiles">Raw block tiles</label></li>
                <li><input type="checkbox" name="lidar_adjusted_data"  id="l_adjusteddata" value="true">
                <label for="l_adjusteddata">Adjusted data</label></li>
                <li><input type="checkbox" name="lidar_adjusted_and_filtered_data"  id="l_adjustedfiltereddata" value="true">
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
                <li><input type="checkbox" name="project_tilings"  id="p_tiling" value="true">
                <label for="p_tiling">TILING</label></li>
                </ul>
                <h3> Project others format </h3>
                <input type="text" name="project_others">

            </div>
        </div>       
    
    

>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
    <div id="Add-submit">
        <input type="reset" value="reset">
        <input type="submit" name="validate" value="validate" disabled="true">
    </div>

<?php


<<<<<<< HEAD
/*************************************** VALIDATION METHOD => POST *********************************************/

/*********** FIELDS OF VALIDATION ************/
$Field = array('bdl','storage_location','n_disk');
=======



/*************************************************** VALIDATION ********************************************************************************/

/********************************************** Champ de validation ***********************************************************************/
$Field = array('bdl','storage_location','n_disk'); // Field obligatoire
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
$checkImg = array('image_mission_date','image_start','image_end','image_raw','image_lv0','image_lv2','image_lv3','image_rvb','image_rvbi','image_pan','image_cir','image_geom');
$checkOrtho = array('ortho_tif','ortho_ecw','ortho_jpg','ortho_rvb','ortho_rvbi','ortho_infrared','ortho_8bit','ortho_16bit','ortho_geom');
$checkLidar = array('lidar_raw_data','lidar_raw_georeferenced_data','lidar_raw_block_tiles','lidar_adjusted_data','lidar_adjusted_and_filtered_data','lidar_delivery','lidar_geom');
$checkProject = array('project_aoi','project_dgps','project_aet','project_tiling','project_others','project_geom');
<<<<<<< HEAD

//initializes variable of the request parameters
$data = "";
$datavalue = "";

// IF validate FORM is set
if(isset($_POST['validate'])) {

// *** ADD Name of fields and value fields in request parameters ***
=======
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

>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
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

    foreach($checkProject as $proj) {
        if(isset($_POST[$proj])) {
            if($_POST[$proj] != "") {
                $data .= $proj . ",";
                $datavalue .= "'" .$_POST[$proj] . "',";
            }
        }
    }

<<<<<<< HEAD

    //Set geometry
    if(isset($_POST['image_geom'])) {
        if($_POST['image_geom'] != "") {
            $data .= 'image_geom' . ",";
            $image_geom = "ST_Transform(ST_SetSRID(ST_GeomFromGeoJSON('". $_POST['image_geom'] ."'), 4326), 4326)";
            $datavalue .=  $image_geom . ",";
        }
    }

    if(isset($_POST['ortho_geom'])) {
        if($_POST['ortho_geom'] != "") {
            $data .= 'ortho_geom' . ",";
            $ortho_geom = "ST_Transform(ST_SetSRID(ST_GeomFromGeoJSON('". $_POST['image_geom'] ."'), 4326), 4326)";
            $datavalue .=  $ortho_geom . ",";
        }
    }
    
    if(isset($_POST['lidar_geom'])) {
        if($_POST['lidar_geom'] != "") {
            $data .= 'lidar_geom' . ",";
            $lidar_geom = "ST_Transform(ST_SetSRID(ST_GeomFromGeoJSON('". $_POST['image_geom'] ."'), 4326), 4326)";
            $datavalue .=  $lidar_geom . ",";
        }
    }
    
    if(isset($_POST['project_geom'])) {
        if($_POST['project_geom'] != "") {
            $data .= 'project_geom' . ",";
            $project_geom = "ST_Transform(ST_SetSRID(ST_GeomFromGeoJSON('". $_POST['image_geom'] ."'), 4326), 4326)";
            $datavalue .=  $project_geom . ",";
        }
    }
   

/*************************************************** SEND REQUEST ********************************************************************************/
    if ($data != "") {

    $req = "INSERT INTO public.prototype_table(". substr($data, 0, -1) .") VALUES(" . substr($datavalue, 0, -1) . ")";

    $sendReq = pg_query($req);

=======
    if ($data != "") {
    // Requete d'insertion dans la table -> enleve la derniére valeur des tableau data et datavalue (une virgule)
    $req = "INSERT INTO public.prototype_table(". substr($data, 0, -1) .") VALUES(" . substr($datavalue, 0, -1) . ")";

    //Envoie de la requete
    $sendReq = pg_query($req);

    /*
    if($sendReq) {
        echo "<span>window.alert('requete envoyé')</span>";
    }
    else {
        echo "Erreur";
    }
    */
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
    }
}

?>


</form>
<script defer src="Formulaire.js"></script>