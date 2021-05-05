
// Get ADD Field contains Project ID / BDL
let Add_pjID = document.getElementById('pjID');
Add_pjID.addEventListener('change', GetProjectLayer);


/*************************************************** AJAX ADD ********************************************************************************/
/****************************************** Get geometry of table project *********************************************************************/
function GetProjectLayer () {
    jsonLayer.clearLayers();

    //Create new FormData for send 'projectvalue' in Ajax.php Line 6
    let Projdata = new FormData();
    Projdata.append('Projectvalue', String(this.value));

    //Send Ajax to Aja.php
    fetch('Ajax.php', {
    method: 'post',
    body: Projdata
    })
    .then(res => res.json()) //Get result in .json
    .then(res => { 

    //pjName.innerText = res['project_name']; // Set result
    var ProjectLayer = L.geoJson(res, {
        style: style,
        onEachFeature: onEachFeature
        }).addTo(jsonLayer);

    map.fitBounds(ProjectLayer.getBounds(),{maxZoom:8});  
    });
}


/********************************************** SHP TO JSON GEOMETRY  **************************************************************************/


//Function for each type of geometry

let inGeoImg = document.getElementById('ImageGeom');
let iGeoR = document.getElementById('RIGeom');

inGeoImg.addEventListener('change', e => {
    e.preventDefault();
    if (inGeoImg.files.length == 3) {
    let data = new FormData();
    data.append('shp[]', inGeoImg.files[0]);
    data.append('shp[]', inGeoImg.files[1]);
    data.append('shp[]', inGeoImg.files[2]);
    fetch('upload.php', {
        method: 'post',
        body: data
    })
    .then(r => r.text())
    .then(r => {
        iGeoR.value = r;
    })
    } else {
    console.log('Missing files. Need shp, shx and dbf')
    }
});


let inGeoOrtho = document.getElementById('OrthoGeom');
let oGeoR = document.getElementById('ROGeom');

inGeoOrtho.addEventListener('change', e => {
    e.preventDefault();
    if (inGeoOrtho.files.length == 3) {
    let data = new FormData();
    data.append('shp[]', inGeoOrtho.files[0]);
    data.append('shp[]', inGeoOrtho.files[1]);
    data.append('shp[]', inGeoOrtho.files[2]);
    fetch('upload.php', {
        method: 'post',
        body: data
    })
    .then(r => r.text())
    .then(r => {
        oGeoR.value = r;
    })
    } else {
    console.log('Missing files. Need shp, shx and dbf')
    }
});


let inGeoLidar = document.getElementById('LidarGeom');
let lGeoR = document.getElementById('RLGeom');

inGeoLidar.addEventListener('change', e => {
    e.preventDefault();
    if (inGeoLidar.files.length == 3) {
    let data = new FormData();
    data.append('shp[]', inGeoLidar.files[0]);
    data.append('shp[]', inGeoLidar.files[1]);
    data.append('shp[]', inGeoLidar.files[2]);
    fetch('upload.php', {
        method: 'post',
        body: data
    })
    .then(r => r.text())
    .then(r => {
        lGeoR.value = r;
    })
    } else {
    console.log('Missing files. Need shp, shx and dbf')
    }
});


let inGeoProj = document.getElementById('ProjectGeom');
let pGeoR = document.getElementById('RPGeom');

inGeoProj.addEventListener('change', e => {
    e.preventDefault();
    if (inGeoProj.files.length == 3) {
    let data = new FormData();
    data.append('shp[]', inGeoProj.files[0]);
    data.append('shp[]', inGeoProj.files[1]);
    data.append('shp[]', inGeoProj.files[2]);
    fetch('upload.php', {
        method: 'post',
        body: data
    })
    .then(r => r.text())
    .then(r => {
        pGeoR.value = r;
    })
    } else {
    console.log('Missing files. Need shp, shx and dbf')
    }
});



/*************************************************** AJAX DELETE ********************************************************************************/
/********************************************** DELETE LINE SELECTED  **************************************************************************/

/*  Change value of Search Checkbox on event 'change' */
let DCheckbox = document.querySelectorAll("#Delete input[class='Dcheckbox']");
DCheckbox.forEach(element => {
    element.addEventListener('change', function() {
        if(this.checked) {
            //Change value of checbox
            this.value = "true";

            //Set red color to all lines as the same id of line checked
            SameCheck = document.querySelectorAll("#Delete input[name='" + this.name + "']");
            let CheckLine = document.querySelectorAll("tr[value='Line_" + this.name + "']");
            CheckLine.forEach(element => {
                element.style.backgroundColor = '#f2e4a1';
            });
        }
        else {
            this.value = "false";

            //Set red color to all lines as the same id of line checked
            SameCheck = document.querySelectorAll("#Delete input[name='" + this.name + "']");
            let CheckLine = document.querySelectorAll("tr[value='Line_" + this.name + "']");
            CheckLine.forEach(element => {
                element.style.backgroundColor = 'white';
            });
        }
    })
});


/* Send delete request in Ajax -> Ajax.php Line 30*/
let SenDelete = document.getElementById("DeleteID");
if(SenDelete) {
    SenDelete.addEventListener('click', DeletElement);
}

// For each checkbox where valu=true => Delete line with id_ (set in name of checbox) in API table
function DeletElement(){
    DCheckbox.forEach(function(ele) {
        if(ele.value == "true") {

            let Deldata = new FormData();
            Deldata.append('DeleteLine', ele.name);
            //Send DeleteLine
            fetch('Ajax.php', {
            method: 'post',
            body: Deldata
            })
            
        }
    })
    document.location.reload();

}
