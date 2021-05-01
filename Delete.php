
<form action="index.php#Delete" method="POST" id="Delete-FORM">
    <div class="field"  id=Delete-BDL>

        <h2> BDL (Project ID) </h2>
        <input type="text" list="Search_Bdl" class="search-field" name="Searchbdl" id="Delete_bdl" value="">

        <select name="D_Searchstorage_location" id="Delete_Storage">
                <option value="" disabled selected>Storage location</option>
                <?php   
                foreach ($country as $c) {
                    echo "<option value=" . $c["country"] . ">" . $c['country'] . "</option>";
                }
                ?>
        </select>

        <input type="checkbox" name="D_image_checker" value="false" id="Delete_image">
        <label for="SearchImage">Image</label>
        <input type="checkbox" name="D_ortho_checker" value="false" id="Delete_ortho">
        <label for="SearchOrtho">OrthoImage</label>
        <input type="checkbox" name="D_lidar_checker" value="false" id="Delete_lidar">
        <label for="SearchLidar">Lidar</label>
        <input type="checkbox" name="D_project_checker" value="false" id="Delete_project">
        <label for="SearchLidar">Project</label>
    </div>

    <div id="Delete-submit">
    <input type="reset" value="reset">
    <input type="submit" name="validateDelete" value="validate">
    </div>
</form>

<?php 

$Searchdata_D = "";
$DeleteImageReq = null;
$SearchImageResult_D = null;
$SearchOrthoResult_D = null;
$SearchLidarResult_D = null;
$SearchProjectResult_D = null;
$CheckData_D = false;

if(isset($_POST['Searchbdl'])) {
    if($_POST['Searchbdl'] != "") {
        $Dbdl = $_POST['Searchbdl'];
        $Searchdata_D .= "bdl LIKE '$Dbdl' AND ";
    }
}

if(isset($_POST['D_Searchstorage_location'])) {
    $Dstorage = $_POST['D_Searchstorage_location'];
    $Searchdata_D .= "storage_location LIKE '$Dstorage' AND ";
}

if(isset($_POST['validateDelete'])) {
    $SelectedID = array();
    if(isset($_POST['D_image_checker'])) {
        $CheckData_D = true;
        $SearchImageReq_D = "SELECT id_, bdl, n_disk, storage_location, image_raw, image_lv0, image_lv2, image_lv3, image_rvb, image_rvbi, image_pan, image_cir, ST_AsGeoJSON(image_geom) AS geometry FROM public.prototype_table WHERE " . $Searchdata_D . "image_checker = true";
    
        if ($Sresult = pg_query($SearchImageReq_D)){
            while ($Srow = pg_fetch_assoc($Sresult)) {
                $SearchImageResult_D[$i] = $Srow;
                $i++;
            }
        }
        if($SearchImageResult_D != null) {
            ?>
            <h3> Image result </h3>
            <table>
                <thead>
                    <tr>
                        <th> N° DISK </th><th> Storage Location </th><th> RAW </th><th> LV0 </th><th> LV2 </th>
                        <th> LV3 </th><th> RVB </th><th> RVBI </th><th> PAN </th><th> CIR </th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($SearchImageResult_D as $IR) {
                $id = $IR["id_"];
                $SelectedID[] = $IR["id_"];
                //array_push($SelectedID,$id;
                echo "<tr>";
                echo "<td>" .  $IR["n_disk"] . "</td><td>" . $IR["storage_location"] ."</td>";
                echo "<td class=" .  $IR["image_raw"] . "></td><td class=" . $IR["image_lv0"] ."></td>";
                echo "<td class=" .  $IR["image_lv2"] . "></td><td class=" . $IR["image_lv3"] ."></td>";
                echo "<td class=" .  $IR["image_rvb"] . "></td><td class=" . $IR["image_rvbi"] ."></td>";
                echo "<td class=" .  $IR["image_pan"] . "></td><td class=" . $IR["image_cir"] ."></td>";
                echo "<td><button type='button' id=Image_". $IR["id_"] ." value=" . $IR["id_"] . "></button>";
                echo "<td><input type='Checkbox' class='Dcheckbox' name=". $IR["id_"] . " value=" . $IR["id_"] . "></input>";
                echo "</tr>";
                
            }         
            ?>
                </tbody>
            </table>
            
            <!-- Hidden div for geometry -->
            <div id="SearchImageGeom" hidden>
            <?php

            //SET IMAGE GEOMETRY
            $Imagegeojson = array(
                'type'      => 'FeatureCollection',
                'features'  => array()
            );

            foreach($SearchImageResult_D as $GR) {
                $feature = ["type"=>"Feature","properties"=>["id"=>"Geom_Image_" . $GR['id_'],"bdl"=>$GR['bdl'],"disk"=>$GR["n_disk"],"datatype"=>"Image",
                                                            "image_raw"=>$GR["image_raw"],"image_lv0"=>$GR["image_lv0"],"image_lv2"=>$GR["image_lv2"],
                                                            "image_lv3"=>$GR["image_lv3"],"image_rvb"=>$GR["image_rvb"],"image_rvbi"=>$GR["image_rvbi"],
                                                            "image_pan"=>$GR["image_pan"],"image_cir"=>$GR["image_cir"],"name"=>"search"],
                                                            "geometry"=>json_decode($GR['geometry'])];
                array_push($Imagegeojson['features'], $feature);
                
            }
            echo json_encode($Imagegeojson);
            echo "</div>";
        }
    }
    if(isset($_POST['D_ortho_checker'])) {
        $CheckData_D = true;
        $SearchOrthoReq_D = "SELECT id_, bdl, n_disk, storage_location, ortho_tif, ortho_ecw, ortho_jpg, ortho_rvb, ortho_rvbi, ortho_infrared, ortho_8bit, ortho_16bit, ST_AsGeoJSON(ortho_geom) AS geometry  FROM public.prototype_table WHERE " . $Searchdata_D . "ortho_checker = true";

        if ($Sresult = pg_query($SearchOrthoReq_D)){
            while ($Srow = pg_fetch_assoc($Sresult)) {
                $SearchOrthoResult_D[$i] = $Srow;
                $i++;
            }
        }

        if($SearchOrthoResult_D != null) {
            ?>
            <h3> Orthoimage result </h3>
            <table>
                <thead>
                    <tr>
                        <th> N° DISK </th><th> Storage Location </th><th> TIF </th><th> ECW </th><th> JPG </th>
                        <th> RVB </th><th> RVBI </th><th> INFRARED </th><th> 8BIT </th><th> 16BIT </th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($SearchOrthoResult_D as $OR) {
                echo "<tr>";
                echo "<td>" .  $OR["n_disk"] . "</td><td>" . $OR["storage_location"] ."</td>";
                echo "<td class=" .  $OR["ortho_tif"] . "></td><td class=" . $OR["ortho_ecw"] ."></td>";
                echo "<td class=" .  $OR["ortho_jpg"] . "></td><td class=" . $OR["ortho_rvb"] ."></td>";
                echo "<td class=" .  $OR["ortho_rvbi"] . "></td><td class=" . $OR["ortho_infrared"] ."></td>";
                echo "<td class=" .  $OR["ortho_8bit"] . "></td><td class=" . $OR["ortho_16bit"] ."></td>";
                echo "<td><button type='button' id=Ortho_". $OR["id_"] ."></button>";
                echo "<td><input type='checkbox' class='Dcheckbox' name=". $OR["id_"] ." value='false'></input>";
                echo "</tr>";
            }         
            ?>
                </tbody>
            </table>

            <!-- Hidden div for geometry -->
            <div id="SearchOrthoGeom" hidden>

            <?php
            //SET ORTHO GEOMETRY
            $Orthogeojson = array(
                'type'      => 'FeatureCollection',
                'features'  => array()
            );

            foreach($SearchOrthoResult_D as $GR) {
                $feature = ["type"=>"Feature","properties"=>["id"=>"Geom_Ortho_" . $GR['id_'],"bdl"=>$GR['bdl'],"disk"=>$GR["n_disk"],"datatype"=>"Orthoimage",
                                                            "ortho_tif"=>$GR["ortho_tif"],"ortho_ecw"=>$GR["ortho_ecw"],"ortho_jpg"=>$GR["ortho_jpg"],
                                                            "ortho_rvb"=>$GR["ortho_rvb"],"ortho_rvbi"=>$GR["ortho_rvbi"],"ortho_infrared"=>$GR["ortho_infrared"],
                                                            "ortho_8bit"=>$GR["ortho_8bit"],"ortho_16bit"=>$GR["ortho_16bit"],"name"=>"search"],
                                                            "geometry"=>json_decode($GR['geometry'])];
                array_push($Orthogeojson['features'], $feature);

            }
            echo json_encode($Orthogeojson);
            echo "</div>";
        }
    }

    if(isset($_POST['D_lidar_checker'])) {
        $CheckData_D = true;
        $SearchLidarReq_D = "SELECT id_, bdl, n_disk, storage_location, lidar_raw_data, lidar_raw_georeferenced_data, lidar_raw_block_tiles, lidar_adjusted_data, lidar_adjusted_and_filtered_data, lidar_delivery, ST_AsGeoJSON(lidar_geom) AS geometry FROM public.prototype_table WHERE " . $Searchdata_D . "lidar_checker = true";

        if ($Sresult = pg_query($SearchLidarReq_D)){
            while ($Srow = pg_fetch_assoc($Sresult)) {
                $SearchLidarResult_D[$i] = $Srow;
                $i++;
            }
        }

        if($SearchLidarResult_D != null) {
            ?>
            <h3> Lidar result </h3>
            <table>
                <thead>
                    <tr>
                        <th> N° DISK </th><th> Storage Location </th><th> RAW </th><th> RAW GEO </th><th> RAW Block </th>
                        <th> Adjusted </th><th> Adjusted and filtered </th><th> Delivery </th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($SearchLidarResult_D as $LR) {
                echo "<tr>";
                echo "<td>" .  $LR["n_disk"] . "</td><td>" . $LR["storage_location"] ."</td>";
                echo "<td class=" .  $LR["lidar_raw_data"] . "></td><td class=" . $LR["lidar_raw_georeferenced_data"] ."></td>";
                echo "<td class=" .  $LR["lidar_raw_block_tiles"] . "></td><td class=" . $LR["lidar_adjusted_data"] ."></td>";
                echo "<td class=" .  $LR["lidar_adjusted_and_filtered_data"] . "></td><td class=" . $LR["lidar_delivery"] ."></td>";
                echo "<td><button type='button' id=Lidar_". $LR["id_"] ."></button>";
                echo "<td><input type='checkbox' class='Dcheckbox' name=". $LR["id_"] ." value='false'></input>";
                echo "</tr>";
            }         
            ?>
                </tbody>
            </table>
             
            <!-- Hidden div for geometry -->
            <div id="SearchLidarGeom" hidden>
            <?php

            //SET LIDAR GEOMETRY
            $Lidargeojson = array(
                'type'      => 'FeatureCollection',
                'features'  => array()
            );

            foreach($SearchLidarResult_D as $GR) {
                $feature = ["type"=>"Feature","properties"=>["id"=>"Geom_Lidar_" . $GR['id_'],"bdl"=>$GR["bdl"],"disk"=>$GR["n_disk"],"datatype"=>"Lidar",
                                                            "lidar_raw_data"=>$GR["lidar_raw_data"],"lidar_raw_georeferenced_data"=>$GR["lidar_raw_georeferenced_data"],
                                                            "lidar_raw_block_tiles"=>$GR["lidar_raw_block_tiles"],"lidar_adjusted_data"=>$GR["lidar_adjusted_data"],
                                                            "lidar_adjusted_and_filtered_data"=>$GR["lidar_adjusted_and_filtered_data"],"lidar_delivery"=>$GR["lidar_delivery"],
                                                            "name"=>"search"],
                                                            "geometry"=>json_decode($GR['geometry'])];
                array_push($Lidargeojson['features'], $feature);

            }
            echo json_encode($Lidargeojson);
            echo "</div>";
        }
    }

    if(isset($_POST['D_project_checker'])) {
        $CheckData_D = true;
        $SearchProjectReq_D = "SELECT id_, bdl, n_disk, storage_location, project_aoi, project_dgps, project_aet, project_tiling, project_others, ST_AsGeoJSON(project_geom) AS geometry FROM public.prototype_table WHERE " . $Searchdata_D . "project_checker = true";

        if ($Sresult = pg_query($SearchProjectReq_D)){
            while ($Srow = pg_fetch_assoc($Sresult)) {
                $SearchProjectResult_D[$i] = $Srow;
                $i++;
            }
        }

        if($SearchProjectResult_D != null) {
            ?>
            <h3> Project result </h3>
            <table>
                <thead>
                    <tr>
                        <th> N° DISK </th><th> Storage Location </th><th> AOI </th><th> DGPS </th><th> AET </th><th> Tiling </th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($SearchProjectResult_D as $PR) {
                echo "<tr>";
                echo "<td>" .  $PR["n_disk"] . "</td><td>" . $PR["storage_location"] ."</td>";
                echo "<td class=" .  $PR["project_aoi"] . "></td><td class=" . $PR["project_dgps"] ."></td>";
                echo "<td class=" .  $PR["project_aet"] . "></td><td class=" . $PR["project_tiling"] ."></td>";
                echo "<td><button type='button' id=Project_". $PR["id_"] ."></button>";
                echo "<td><input type='checkbox' class='Dcheckbox' name=". $PR["id_"] ." value='false'></input>";
                echo "</tr>";
            }         
            ?>
                </tbody>
            </table>
                                    
            <!-- Hidden div for geometry -->
            <div id="SearchProjectGeom" hidden>

            <?php
            //SET PROJECT GEOMETRY
            $Projectgeojson = array(
                'type'      => 'FeatureCollection',
                'features'  => array()
            );

            foreach($SearchProjectResult_D as $GR) {
                $feature = ["type"=>"Feature","properties"=>["id"=>"Geom_Project_" . $GR['id_'],"bdl"=>$GR['bdl'],"disk"=>$GR["n_disk"],"datatype"=>"Project",
                                                            "project_aoi"=>$GR["project_aoi"],"project_dgps"=>$GR["project_dgps"],"project_aet"=>$GR["project_aet"],
                                                            "project_tiling"=>$GR["project_tiling"],"name"=>"search"],
                                                            "geometry"=>json_decode($GR['geometry'])];
                array_push($Projectgeojson['features'], $feature);

            }
            echo json_encode($Projectgeojson);
            echo "</div>";
        }
    }

/**************************************************************************************************/
/************************************ IF NO DATA CHECK ********************************************/
    if($CheckData_D == false && $Searchdata_D != "") {

        $SearchImageReq_D = "SELECT id_, bdl, n_disk, storage_location, image_raw, image_lv0, image_lv2, image_lv3, image_rvb, image_rvbi, image_pan, image_cir, ST_AsGeoJSON(image_geom) AS geometry, image_checker FROM public.prototype_table WHERE " . substr($Searchdata_D,0,-4);

        if ($Sresult = pg_query($SearchImageReq_D)){
            while ($Srow = pg_fetch_assoc($Sresult)) {
                $SearchImageResult_D[$i] = $Srow;
                $i++;
            }
        }

        if($SearchImageResult_D != null) {
            ?>
            <h3> Image result </h3>
            <table>
                <thead>
                    <tr>
                        <th> N° DISK </th><th> Storage Location </th><th> RAW </th><th> LV0 </th><th> LV2 </th>
                        <th> LV3 </th><th> RVB </th><th> RVBI </th><th> PAN </th><th> CIR </th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($SearchImageResult_D as $IR) {
                $Icheck = $IR["image_checker"];
                if($Icheck == "t") {
                echo "<tr>";
                echo "<td>" .  $IR["n_disk"] . "</td><td>" . $IR["storage_location"] ."</td>";
                echo "<td class=" .  $IR["image_raw"] . "></td><td class=" . $IR["image_lv0"] ."></td>";
                echo "<td class=" .  $IR["image_lv2"] . "></td><td class=" . $IR["image_lv3"] ."></td>";
                echo "<td class=" .  $IR["image_rvb"] . "></td><td class=" . $IR["image_rvbi"] ."></td>";
                echo "<td class=" .  $IR["image_pan"] . "></td><td class=" . $IR["image_cir"] ."></td>";
                echo "<td><button type='button' id=Image_". $IR["id_"] ." value=" . $IR["id_"] . "></button>";
                echo "<td><input type='Checkbox' class='Dcheckbox' name=". $IR["id_"] . " value=" . $IR["id_"] . "></input>";
                echo "</tr>";
                }
            }         
            ?>
                </tbody>
            </table>

            <!-- Hidden div for geometry -->
            <div id="SearchImageGeom" hidden>
            <?php

            //SET IMAGE GEOMETRY
            $Imagegeojson = array(
                'type'      => 'FeatureCollection',
                'features'  => array()
            );

            foreach($SearchImageResult_D as $GR) {
                $feature = ["type"=>"Feature","properties"=>["id"=>"Geom_Image_" . $GR['id_'],"bdl"=>$GR['bdl'],"disk"=>$GR["n_disk"],"datatype"=>"Image",
                                                            "image_raw"=>$GR["image_raw"],"image_lv0"=>$GR["image_lv0"],"image_lv2"=>$GR["image_lv2"],
                                                            "image_lv3"=>$GR["image_lv3"],"image_rvb"=>$GR["image_rvb"],"image_rvbi"=>$GR["image_rvbi"],
                                                            "image_pan"=>$GR["image_pan"],"image_cir"=>$GR["image_cir"],"name"=>"search"],
                                                            "geometry"=>json_decode($GR['geometry'])];
                array_push($Imagegeojson['features'], $feature);
                
            }
            echo json_encode($Imagegeojson);
            echo "</div>";
        }
        
        $SearchOrthoReq_D = "SELECT id_, bdl, n_disk, storage_location, ortho_tif, ortho_ecw, ortho_jpg, ortho_rvb, ortho_rvbi, ortho_infrared, ortho_8bit, ortho_16bit, ST_AsGeoJSON(ortho_geom) AS geometry, ortho_checker FROM public.prototype_table WHERE " . substr($Searchdata_D,0,-4);

        if ($Sresult = pg_query($SearchOrthoReq_D)){
            while ($Srow = pg_fetch_assoc($Sresult)) {
                $SearchOrthoResult_D[$i] = $Srow;
                $i++;
            }
        }

        if($SearchOrthoResult_D != null) {
            ?>
            <h3> Orthoimage result </h3>
            <table>
                <thead>
                    <tr>
                        <th> N° DISK </th><th> Storage Location </th><th> TIF </th><th> ECW </th><th> JPG </th>
                        <th> RVB </th><th> RVBI </th><th> INFRARED </th><th> 8BIT </th><th> 16BIT </th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($SearchOrthoResult_D as $OR) {
                $Ocheck = $OR["ortho_checker"];
                if($Ocheck == "t") {
                    echo "<tr>";
                    echo "<td>" .  $OR["n_disk"] . "</td><td>" . $OR["storage_location"] ."</td>";
                    echo "<td class=" .  $OR["ortho_tif"] . "></td><td class=" . $OR["ortho_ecw"] ."></td>";
                    echo "<td class=" .  $OR["ortho_jpg"] . "></td><td class=" . $OR["ortho_rvb"] ."></td>";
                    echo "<td class=" .  $OR["ortho_rvbi"] . "></td><td class=" . $OR["ortho_infrared"] ."></td>";
                    echo "<td class=" .  $OR["ortho_8bit"] . "></td><td class=" . $OR["ortho_16bit"] ."></td>";
                    echo "<td><button type='button' id=Ortho_". $OR["id_"] ."></button>";
                    echo "<td><input type='checkbox' class='Dcheckbox' name=". $OR["id_"] ." value='false'></input>";
                    echo "</tr>";
                }
            }         
            ?>
                </tbody>
            </table>

            <!-- Hidden div for geometry -->
            <div id="SearchOrthoGeom" hidden>
            <?php

            //SET ORTHO GEOMETRY
            $Orthogeojson = array(
                'type'      => 'FeatureCollection',
                'features'  => array()
            );

            foreach($SearchOrthoResult_D as $GR) {
                $feature = ["type"=>"Feature","properties"=>["id"=>"Geom_Ortho_" . $GR['id_'],"bdl"=>$GR['bdl'],"disk"=>$GR["n_disk"],"datatype"=>"Orthoimage",
                                                            "ortho_tif"=>$GR["ortho_tif"],"ortho_ecw"=>$GR["ortho_ecw"],"ortho_jpg"=>$GR["ortho_jpg"],
                                                            "ortho_rvb"=>$GR["ortho_rvb"],"ortho_rvbi"=>$GR["ortho_rvbi"],"ortho_infrared"=>$GR["ortho_infrared"],
                                                            "ortho_8bit"=>$GR["ortho_8bit"],"ortho_16bit"=>$GR["ortho_16bit"],"name"=>"search"],
                                                            "geometry"=>json_decode($GR['geometry'])];
                array_push($Orthogeojson['features'], $feature);

            }
            echo json_encode($Orthogeojson);
            echo "</div>";
        }

        $SearchLidarReq_D = "SELECT  id_, bdl, n_disk, storage_location, lidar_raw_data, lidar_raw_georeferenced_data, lidar_raw_block_tiles, lidar_adjusted_data, lidar_adjusted_and_filtered_data, lidar_delivery, ST_AsGeoJSON(lidar_geom) AS geometry, lidar_checker  FROM public.prototype_table WHERE " . substr($Searchdata_D,0,-4);

        if ($Sresult = pg_query($SearchLidarReq_D)){
            while ($Srow = pg_fetch_assoc($Sresult)) {
                $SearchLidarResult_D[$i] = $Srow;
                $i++;
            }
        }

        if($SearchLidarResult_D != null) {
            ?>
            <h3> Lidar result </h3>
            <table>
                <thead>
                    <tr>
                        <th> N° DISK </th><th> Storage Location </th><th> RAW </th><th> RAW GEO </th><th> RAW Block </th>
                        <th> Adjusted </th><th> Adjusted and filtered </th><th> Delivery </th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($SearchLidarResult_D as $LR) {
                $Lcheck = $LR["lidar_checker"];
                if($Lcheck == "t") {
                echo "<tr>";
                echo "<td>" .  $LR["n_disk"] . "</td><td>" . $LR["storage_location"] ."</td>";
                echo "<td class=" .  $LR["lidar_raw_data"] . "></td><td class=" . $LR["lidar_raw_georeferenced_data"] ."></td>";
                echo "<td class=" .  $LR["lidar_raw_block_tiles"] . "></td><td class=" . $LR["lidar_adjusted_data"] ."></td>";
                echo "<td class=" .  $LR["lidar_adjusted_and_filtered_data"] . "></td><td class=" . $LR["lidar_delivery"] ."></td>";
                echo "<td><button type='button' id=Lidar_". $LR["id_"] ."></button>";
                echo "<td><input type='checkbox' class='Dcheckbox' name=". $LR["id_"] ." value='false'></input>";
                echo "</tr>";
                }
            }         
            ?>
                </tbody>
            </table>
            
            <!-- Hidden div for geometry -->
            <div id="SearchLidarGeom" hidden>
            <?php

            //SET LIDAR GEOMETRY
            $Lidargeojson = array(
                'type'      => 'FeatureCollection',
                'features'  => array()
            );

            foreach($SearchLidarResult_D as $GR) {
                $feature = ["type"=>"Feature","properties"=>["id"=>"Geom_Lidar_" . $GR['id_'],"bdl"=>$GR['bdl'],"disk"=>$GR["n_disk"],"datatype"=>"Lidar",
                                                            "lidar_raw_data"=>$GR["lidar_raw_data"],"lidar_raw_georeferenced_data"=>$GR["lidar_raw_georeferenced_data"],
                                                            "lidar_raw_block_tiles"=>$GR["lidar_raw_block_tiles"],"lidar_adjusted_data"=>$GR["lidar_adjusted_data"],
                                                            "lidar_adjusted_and_filtered_data"=>$GR["lidar_adjusted_and_filtered_data"],"lidar_delivery"=>$GR["lidar_delivery"],
                                                            "name"=>"search"],
                                                            "geometry"=>json_decode($GR['geometry'])];
                array_push($Lidargeojson['features'], $feature);

            }
            echo json_encode($Lidargeojson);
            echo "</div>";
        }

        $SearchProjectReq_D = "SELECT id_, bdl, n_disk, storage_location, project_aoi, project_dgps, project_aet, project_tiling, project_others, ST_AsGeoJSON(project_geom) AS geometry, project_checker FROM public.prototype_table WHERE " . substr($Searchdata_D,0,-4);

        if ($Sresult = pg_query($SearchProjectReq_D)){
            while ($Srow = pg_fetch_assoc($Sresult)) {
                $SearchProjectResult_D[$i] = $Srow;
                $i++;
            }
        }

        if($SearchProjectResult_D != null) {
            ?>
            <h3> Project result </h3>
            <table>
                <thead>
                    <tr>
                        <th> N° DISK </th><th> Storage Location </th><th> AOI </th><th> DGPS </th><th> AET </th><th> Tiling </th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($SearchProjectResult_D as $PR) {
                $Pcheck = $PR["project_checker"];
                if($Pcheck == "t") {
                echo "<tr>";
                echo "<td>" .  $PR["n_disk"] . "</td><td>" . $PR["storage_location"] ."</td>";
                echo "<td class=" .  $PR["project_aoi"] . "></td><td class=" . $PR["project_dgps"] ."></td>";
                echo "<td class=" .  $PR["project_aet"] . "></td><td class=" . $PR["project_tiling"] ."></td>";
                echo "<td><button type='button' id=Project_". $PR["id_"] ."></button>";
                echo "<td><input type='checkbox' class='Dcheckbox' name=". $PR["id_"] ." value='false'></input>";
                echo "</tr>";
                }
            }         
            ?>
                </tbody>
            </table>
                        
            <!-- Hidden div for geometry -->
            <div id="SearchProjectGeom" hidden>
            <?php

            //SET PROJECT GEOMETRY
            $Projectgeojson = array(
                'type'      => 'FeatureCollection',
                'features'  => array()
            );

            foreach($SearchProjectResult_D as $GR) {
                $feature = ["type"=>"Feature","properties"=>["id"=>"Geom_Project_" . $GR['id_'],"bdl"=>$GR['bdl'],"disk"=>$GR["n_disk"],"datatype"=>"Project",
                                                            "project_aoi"=>$GR["project_aoi"],"project_dgps"=>$GR["project_dgps"],"project_aet"=>$GR["project_aet"],
                                                            "project_tiling"=>$GR["project_tiling"],"name"=>"search"],
                                                            "geometry"=>json_decode($GR['geometry'])];
                array_push($Projectgeojson['features'], $feature);

            }
            echo json_encode($Projectgeojson);
            echo "</div>";
        }
    }
    ?>
    <input type="button" id="DeleteID" value="Delete">
    <?php
}
?>
</form>
