
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

/*************************************************** AJAX DELETE ********************************************************************************/
/********************************************** DELETE LINE SELECTED  **************************************************************************/

/*  Change value of Search Checkbox on event 'change' */
let DCheckbox = document.querySelectorAll("#Delete input[class='Dcheckbox']");
DCheckbox.forEach(element => {
    element.addEventListener('change', function() {
        if(this.checked) {
            this.value = "true";
        }
        else {
            this.value = "false";
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


