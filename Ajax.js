
// Get ADD Field contains Project ID / BDL
let Add_pjID = document.getElementById('pjID')
Add_pjID.addEventListener('change', GetProjectLayer);

// Write name project id  ____________> Delete ?
let pjName = document.getElementById(`bdlName`);
pjName.innerText ="ok";


// Get Search Field contains Project ID / BDL  +   Div where result is write
let Search_pjID = document.getElementById('Search_pjID')
let Search_Result = document.getElementById('Search-Result')
Search_pjID.addEventListener('change', GetMissionData);


/*************************************************** AJAX ADD ********************************************************************************/
/****************************************** Get geometry of table project *********************************************************************/
function GetProjectLayer () {
    jsonLayer.clearLayers();

    // Create new FormData for send 'projectvalue' in Ajax.php
    let Projdata = new FormData();
    Projdata.append('Projectvalue', String(this.value));

    // commande ajax servant a appeler le résultat de la requette appliqué dans Ajax.php
    fetch('Ajax.php', {
    method: 'post',
    body: Projdata
    })
    .then(res => res.json()) //récupére le fichier résultat .json
    .then(res => { 
    //pjName.innerText = res['project_name']; //Appliqque le résultat

    var ProjectLayer = L.geoJson(res, {
        style: style,
        onEachFeature: onEachFeature
        }).addTo(jsonLayer);

    map.fitBounds(ProjectLayer.getBounds(),{maxZoom:8});  

    });
}



/*************************************************** AJAX SEARCH ******************************************************************************/
/****************************************** Get element of table prototype *******************************************************************/
/************ ----->   TO DO   ******* Get and send geometry of table prototype **************************************************************/
/************ ----->   TO DO   ********* Get and send geometry of table project **************************************************************/
function GetMissionData () {

    // Create new FormData for send 'MissionData' in Ajax.php
    let Missiondata = new FormData();
    Missiondata.append('MissionData', String(this.value));

    // commande ajax servant a appeler le résultat de la requette appliqué dans Ajax.php
    fetch('Ajax.php', {
    method: 'post',
    body: Missiondata
    })
    .then(res => res.json()) //récupére le fichier résultat .json
    .then(res => { 
    
    console.log(res);
    WriteJson(res,Search_Result);
    });
    
}


/*************************************************** SEND SARCH ELEMENT ---> INNEHTML ***********************************************************************/
function WriteJson(json,element) {
    element.innerHTML = "<h1> Result of Research : </h1>" +
                        "<h2> Data </h2>" +
                        "<p class=" + Verif(json.properties.Data.bdl) + "> ProjectID : " + json.properties.Data.bdl + "</p>" +
                        "<p class=" + Verif(json.properties.Data.country) + "> Country : " + json.properties.Data.country + "</p>" +
                        "<p class=" + Verif(json.properties.Data.mission_date) + "> mission_date : " + json.properties.Data.mission_date + "</p>" +
                        "<p class=" + Verif(json.properties.Data.n_disk) + "> n_disk : " + json.properties.Data.n_disk + "</p>" +
                        "<h2> Image Data </h2>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_start) + "> Image Start : " + json.properties.Image_Data.image_start + "</p>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_end) + "> Image End : " + json.properties.Image_Data.image_end + "</p>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_raw) + "> Image RAW : " + json.properties.Image_Data.image_raw + "</p>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_lv0) + "> Image LVL0 : " + json.properties.Image_Data.image_lv0 + "</p>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_lv2) + "> Image LVL2 : " + json.properties.Image_Data.image_lv2 + "</p>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_lv3) + "> Image LVL3 : " + json.properties.Image_Data.image_lv3 + "</p>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_rvb) + "> Image RVB : " + json.properties.Image_Data.image_rvb + "</p>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_rvbi) + "> Image RVBI : " + json.properties.Image_Data.image_rvbi + "</p>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_pan) + "> Image PAN : " + json.properties.Image_Data.image_pan + "</p>" +
                        "<p class=" + Verif(json.properties.Image_Data.image_cir) + "> Image CIR : " + json.properties.Image_Data.image_cir + "</p>" +
                        "<h2> OrthoImage Data </h2>" +
                        "<p class=" + Verif(json.properties.Ortho_Data.ortho_tif) + "> Ortho TIF : " + json.properties.Ortho_Data.ortho_tif + "</p>" +
                        "<p class=" + Verif(json.properties.Ortho_Data.ortho_ecw) + "> Ortho ECW : " + json.properties.Ortho_Data.ortho_ecw + "</p>" +
                        "<p class=" + Verif(json.properties.Ortho_Data.ortho_jpg) + "> Ortho JPG : " + json.properties.Ortho_Data.ortho_jpg + "</p>" +
                        "<p class=" + Verif(json.properties.Ortho_Data.ortho_rvb) + "> Ortho RVB : " + json.properties.Ortho_Data.ortho_rvb + "</p>" +
                        "<p class=" + Verif(json.properties.Ortho_Data.ortho_rvbi) + "> Ortho RVBI : " + json.properties.Ortho_Data.ortho_rvbi + "</p>" +
                        "<p class=" + Verif(json.properties.Ortho_Data.ortho_infrared) + "> Ortho INFRARED : " + json.properties.Ortho_Data.ortho_infrared + "</p>" +
                        "<p class=" + Verif(json.properties.Ortho_Data.ortho_8bit) + "> Ortho 8bytes : " + json.properties.Ortho_Data.ortho_8bit + "</p>" +
                        "<p class=" + Verif(json.properties.Ortho_Data.ortho_16bit) + "> Ortho 16bytes : " + json.properties.Ortho_Data.ortho_16bit + "</p>" +
                        "<h2> Lidar Data </h2>" +
                        "<p class=" + Verif(json.properties.Lidar_Data.lidar_lidar) + "> Lidar : " + json.properties.Lidar_Data.lidar_lidar + "</p>"         
};
/****************** Class=>Verification ********************************/
function Verif(aVal) {
    if(aVal != "False") {
        return "True";
    } else {
        return "False";
    }
}


