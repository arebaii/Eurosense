
<?php 

<<<<<<< HEAD
=======

>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
include "Connect.php";

/*************************************************** AJAX ADD ********************************************************************************/
/****************************************** Get geometry of table project *********************************************************************/
if(isset($_POST['Projectvalue'])) {

    $PJ = $_POST['Projectvalue'];

    $requeteBDL = 'SELECT project_id,project_name,ST_AsGeoJSON(ST_Transform(geom,4326)) AS geometry FROM "Project"'." WHERE project_id LIKE '$PJ'";

    $resultBDL = pg_query($requeteBDL);

    $arr = pg_fetch_array($resultBDL, 0, PGSQL_ASSOC);

    $geometry=$arr['geometry']=json_decode($arr['geometry']);
    $projectid=$arr['project_id'];
    $projectname=$arr['project_name'];

    $featureBDL = ["type"=>"Feature","properties"=>["id"=>$projectid,"name"=>$projectname],"geometry"=>$geometry];

    echo json_encode($featureBDL);
};



<<<<<<< HEAD
/*************************************************** AJAX EDIT ********************************************************************************/
/********************************************** SEND REQUETE TO BDD ***************************************************************************/
if(isset($_POST['DeleteLine'])) {

    $DR = $_POST['DeleteLine'];
    $DeleteReq = "DELETE FROM public.prototype_table WHERE id_ = " . $DR;
    pg_query($DeleteReq);
};

=======


/*************************************************** AJAX SEARCH ******************************************************************************/
/****************************************** Get element of table prototype *******************************************************************/
/************ ----->   TO DO   ******* Get and send geometry of table prototype **************************************************************/
/************ ----->   TO DO   ********* Get and send geometry of table project **************************************************************/

if(isset($_POST['MissionData'])) {

    $MD = $_POST['MissionData'];

    $requeteMD = 'SELECT * FROM prototype_table'." WHERE bdl LIKE '$MD'";

    $resultMD = pg_query($requeteMD);

    while ($row = pg_fetch_assoc($resultMD)) {
        $MissionData[$i] = $row;
        $i++;
    }

    $newArr = array_values($MissionData)[0];
    
    $Field = array('bdl','country','mission_date','n_disk'); // Field obligatoire
    $checkImg = array('image_start','image_end','image_raw','image_lv0','image_lv2','image_lv3','image_rvb','image_rvbi','image_pan','image_cir','image_geom'); // Field Image
    $checkOrtho = array('ortho_tif','ortho_ecw','ortho_jpg','ortho_rvb','ortho_rvbi','ortho_infrared','ortho_8bit','ortho_16bit','ortho_geom'); // Field Orthoimage
    $checkLidar = array('lidar_lidar');

    $featureData = ["bdl"=>"","country"=>"","mission_date"=>"","n_disk"=>""];
    $featureImageData = ["image_start"=>"","image_end"=>"","image_raw"=>"","image_lv0"=>"","image_lv2"=>"","image_lv3"=>"","image_rvb"=>"","image_rvbi"=>"","image_pan"=>"","image_cir"=>"","image_geom"=>""];
    $featureOrthoData = ["ortho_tif"=>"","ortho_ecw"=>"","ortho_jpg"=>"","ortho_rvb"=>"","ortho_rvbi"=>"","ortho_infrared"=>"","ortho_8bit"=>"","ortho_16bit"=>"","ortho_geom"=>""];
    $featureLidarData = ["lidar_lidar"=>""];
    
    foreach($Field as $aVal) {
        if($newArr[$aVal] != "") {
            $featureData[$aVal] = $newArr[$aVal];
        }
        else {
            $featureData[$aVal] = "False";
        }
    }
    
    foreach($checkImg as $aVal) {
        if($newArr[$aVal] != "") {
            if($newArr[$aVal] == 't') {
                $featureImageData[$aVal] = "True";
            } else {
                $featureImageData[$aVal] = $newArr[$aVal];
            }
        }
        else {
            $featureImageData[$aVal] = "False";
        }
    }
    
    foreach($checkOrtho as $aVal) {
        if($newArr[$aVal] != "") {
            if($newArr[$aVal] == 't') {
                $featureOrthoData[$aVal] = "True";
            } else {
                $featureOrthoData[$aVal] = $newArr[$aVal];
            }
        }
        else {
            $featureOrthoData[$aVal] = "False";
        }
    }
    
    foreach($checkLidar as $aVal) {
        if($newArr[$aVal] != "") {
            if($newArr[$aVal] == 't') {
                $featureLidarData[$aVal] = "True";
            } else {
                $featureLidarData[$aVal] = $newArr[$aVal];
            }
        }
        else {
            $featureLidarData[$aVal] = "False";
        }
    }
    
    $feature = ["type"=>"Feature","properties"=>["Data"=>$featureData,"Image_Data"=>$featureImageData,"Ortho_Data"=>$featureOrthoData,"Lidar_Data"=>$featureLidarData]];
    

    /*
    $requeteProj = 'SELECT project_id,project_name,ST_AsGeoJSON(ST_Transform(geom,4326)) AS geometry FROM "Project"'." WHERE project_id LIKE '$MD'";

    $resultProj = pg_query($requeteProj);

    $arr = pg_fetch_array($resultProj, 0, PGSQL_ASSOC);

    $geometry=$arr['geometry']=json_decode($arr['geometry']);
    $projectid=$arr['project_id'];
    $projectname=$arr['project_name'];

    $featureProj = ["type"=>"Feature","properties"=>["id"=>$projectid,"name"=>$projectname],"geometry"=>$geometry];
    */

    echo json_encode($feature);

};
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
?>