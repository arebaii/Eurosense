
<<<<<<< HEAD
//Set map
let map = L.map('Map').setView([50, 10], 4);

//ADD Leaflet layer -> Basemap with 2 types of layers.
=======
let map = L.map('Map').setView([50, 10], 4);


//applique la couche récupéré sur featlet provider.
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
var basemaps = {
	Places: L.tileLayer.wms('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'    
    }),
    Topography: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
        layers: 'TOPO-WMS'
    })
};

//Layer
var jsonLayer = L.layerGroup();
jsonLayer.addTo(map);

//Add Base Map
L.control.layers(basemaps).addTo(map);

basemaps.Places.addTo(map);

<<<<<<< HEAD
// Set layer geometry for project
=======
// intialise le geojson
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
var ProjectLayer = L.geoJson("", {
    style: style,
    onEachFeature: onEachFeature
});


<<<<<<< HEAD
/******************************** PROPRIETY OF LAYER ********************************/

//Function to set style to layer
function style(feature) {
    return {
        fillColor: '#8d0000',
        weight: 1,
        opacity: 0.7,
        color: '#8d0000',
=======
//Function to set style to layer
function style(feature) {
    return {
        fillColor: 'red',
        weight: 3,
        opacity: 0.6,
        color: 'red',
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
        fillOpacity: 0.3
    };
}


<<<<<<< HEAD
//ADD POPUP ON CLICK for each geometry
function functionOnclick (event){
    var layer = event.target;

    //Set content for Search geometry => different content for each type of geometry
    if(layer.feature.properties.name == "search") {

        let id = layer.feature.properties.id.slice(-1);
        let SelectedLine = document.querySelectorAll("tr[value='Line_" + id + "']");
        let AllLine = document.querySelectorAll("tr[class='AllLine']");

        AllLine.forEach(element => {
            element.style.backgroundColor = 'white';
        })
        
        if(SelectedLine) {
            SelectedLine.forEach(element => {
                element.style.backgroundColor = '#009a3f';
            });
        }   
        
        if(layer.feature.properties.datatype == "Image") {
            var content= "<h3><span> BDL : " + layer.feature.properties.bdl + "</span>" +
                        "<span STYLE='padding:0 0 0 60px;'> Type : Image </span></h3>" +
                        "<table><thead><tr><th class='table_first' > DISK </th><th> RAW </th><th class='table_second'> LV0 </th>" + 
                        "<th class='table_second'> LV2 </th><th class='table_second'> LV3 </th><th class='table_second'> RGB </th>" +
                        "<th class='table_second'> RGBI </th><th class='table_second'> PAN </th><th class='table_second'> CIR </th></tr></thead>"+
                        "<tbody><tr><td>" + layer.feature.properties.disk + "</td>" +
                        "<td class=" + layer.feature.properties.image_raw + "></td>" +
                        "<td class=" + layer.feature.properties.image_lv0 + "></td>" + 
                        "<td class=" + layer.feature.properties.image_lv2 + "></td>" + 
                        "<td class=" + layer.feature.properties.image_lv3 + "></td>" + 
                        "<td class=" + layer.feature.properties.image_rvb + "></td>" + 
                        "<td class=" + layer.feature.properties.image_rvbi + "></td>" + 
                        "<td class=" + layer.feature.properties.image_pan + "></td>" + 
                        "<td class=" + layer.feature.properties.image_cir + "></td>" + 
                        "</tr></tbody></table>";  

              
            
        }
        if(layer.feature.properties.datatype == "Orthoimage") {
            var content= "<h3><span> BDL : " + layer.feature.properties.bdl + "</span>" +
                        "<span STYLE='padding:0 0 0 60px;'> Type : Orthoimage </span></h3>" +
                        "<table><thead><tr><th> DISK </th><th> TIF </th><th> ECW </th><th> JPG </th>" +
                        "<th> RGB </th><th> RGBI </th><th> NIR </th><th> 8BIT </th><th> 16BIT </th></tr></thead>"+
                        "<tbody><tr><td>" + layer.feature.properties.disk + "</td>" +
                        "<td class=" + layer.feature.properties.ortho_tif + "></td>" +
                        "<td class=" + layer.feature.properties.ortho_ecw + "></td>" + 
                        "<td class=" + layer.feature.properties.ortho_jpg + "></td>" + 
                        "<td class=" + layer.feature.properties.ortho_rvb + "></td>" + 
                        "<td class=" + layer.feature.properties.ortho_rvbi + "></td>" + 
                        "<td class=" + layer.feature.properties.ortho_infrared + "></td>" + 
                        "<td class=" + layer.feature.properties.ortho_8bit + "></td>" + 
                        "<td class=" + layer.feature.properties.ortho_16bit + "></td>" + 
                        "</tr></tbody></table>";  
        }
        if(layer.feature.properties.datatype == "Lidar") {
            var content= "<h3><span> BDL : " + layer.feature.properties.bdl + "</span>" +
                        "<span STYLE='padding:0 0 0 60px;'> Type : Lidar </span></h3>" +
                        "<table><thead><tr><th> DISK </th><th> RAW </th><th> RGEO </th><th> RBlock </th>" +
                        "<th> Adj </th><th> Adj&Fil </th><th> Deli </th>"+
                        "<tbody><tr><td>" + layer.feature.properties.disk + "</td>" +
                        "<td class=" + layer.feature.properties.lidar_raw_data + "></td>" +
                        "<td class=" + layer.feature.properties.lidar_raw_georeferenced_data + "></td>" + 
                        "<td class=" + layer.feature.properties.lidar_raw_block_tiles + "></td>" + 
                        "<td class=" + layer.feature.properties.lidar_adjusted_data + "></td>" + 
                        "<td class=" + layer.feature.properties.lidar_adjusted_and_filtered_data + "></td>" + 
                        "<td class=" + layer.feature.properties.lidar_delivery + "></td>" + 
                        "</tr></tbody></table>";            
        }
        if(layer.feature.properties.datatype == "Project") {
            var content= "<h3><span> BDL : " + layer.feature.properties.bdl + "</span>" +
                        "<span STYLE='padding:0 0 0 60px;'> Type : Project </span></h3>" +
                        "<table><thead><tr><th> DISK </th><th> AOI </th><th> DGPS </th><th> AET </th><th> Tiling </th>" +
                        "</tr></thead>"+
                        "<tbody><tr><td>" + layer.feature.properties.disk + "</td>" +
                        "<td class=" + layer.feature.properties.project_aoi + "></td>" +
                        "<td class=" + layer.feature.properties.project_dgps + "></td>" + 
                        "<td class=" + layer.feature.properties.project_aet + "></td>" + 
                        "<td class=" + layer.feature.properties.project_tiling + "></td>" + 
                        "</tr></tbody></table>";  
        }
    }

    //Set content for Add geometry
    else {
        var content ="<h2> Name : " + layer.feature.properties.name + "</h2>"+
                    "<h2> BDL : " + layer.feature.properties.id + "</h2>";
    }
    L.popup()
    .setLatLng(layer.getCenter())
    .setContent(content)
=======

//Test fonction
//ajoute l'alerte avec comme donnée l'élément nom de l'event
function functionOnclick (event){
    var layer = event.target;
    console.log(layer.feature.properties.name);
    L.popup()
    .setLatLng(layer.getCenter())
    .setContent("<h2> project_name :" + layer.feature.properties.name + "</h2>"+
                "<h2> project_id : " + layer.feature.properties.id + "</h2>")
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
    .addTo(jsonLayer);
}


<<<<<<< HEAD
// Set HOVER function 
=======

/*Ajout d'intéraction :
accès au calque qui a été survolé via e.target, 
définissons une épaisse bordure grise sur le calque comme effet de surbrillance, 
en l'amenant également à l'avant afin que la bordure ne soit pas en conflit avec les états proches 
(mais pas pour IE , Opera ou Edge, car ils ont des problèmes pour faire bringToFront au survol de la souris). */

>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
<<<<<<< HEAD
=======
        color: 'blue',
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
        fillOpacity: 0.6
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
}


<<<<<<< HEAD
//Reset style to target of event
function resetHighlight(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 3,
        fillOpacity: 0.3
    });
}

//Add event to layers
function onEachFeature(feature, layer) {
=======
//Lorsqu'on enlevé la souris de l'éléement -> resetStyle
function resetHighlight(e) {
    ProjectLayer.resetStyle(e.target);
}

//Applique les évenement de souris
function onEachFeature(feature, layer) {

    //test log pour chaque nom de feature et les couches/calque associé
    console.log(feature.properties.name, layer);

    //sur chaqu'un des calques on applique les événements :
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: functionOnclick
    });
}


<<<<<<< HEAD

/************************************* ADD GEOMETRY OF RESEARCH *****************************************************/
//Add Image Geometry of research result
let Search_ImageGeom = document.getElementById('SearchImageGeom');
if(Search_ImageGeom) {
    let IGEOM = JSON.parse(Search_ImageGeom.innerText);
    var ImageLayer = L.geoJson(IGEOM, {
        style: style,
        onEachFeature: onEachFeature
        }).addTo(jsonLayer);
    //Set id for research
    ImageLayer.eachLayer(function (layer) {
        layer._path.id = 'Geom_Image_' + layer.feature.properties.id;
    });
}

//Add OrthoImage Geometry of research result
let Search_OrthoGeom = document.getElementById('SearchOrthoGeom');
if(Search_OrthoGeom) {
    let OGEOM = JSON.parse(Search_OrthoGeom.innerText);
    var OrthoLayer = L.geoJson(OGEOM, {
        style: style,
        onEachFeature: onEachFeature
        }).addTo(jsonLayer);
    //Set id for research
    OrthoLayer.eachLayer(function (layer) {
        layer._path.id = 'Geom_Ortho_' + layer.feature.properties.id;
    });
}


let Search_LidarGeom = document.getElementById('SearchLidarGeom');
if(Search_LidarGeom) {
    let LGEOM = JSON.parse(Search_LidarGeom.innerText);
    var LidarLayer = L.geoJson(LGEOM, {
        style: style,
        onEachFeature: onEachFeature
        }).addTo(jsonLayer);
    //Set id for research
    LidarLayer.eachLayer(function (layer) {
        layer._path.id = 'Geom_Lidar_' + layer.feature.properties.id;
    });
}

let Search_ProjectGeom = document.getElementById('SearchProjectGeom');
if(Search_ProjectGeom) {
    let PGEOM = JSON.parse(Search_ProjectGeom.innerText);
    var ProjectLayer = L.geoJson(PGEOM, {
        style: style,
        onEachFeature: onEachFeature
        }).addTo(jsonLayer);
    //Set id for research
    ProjectLayer.eachLayer(function (layer) {
        layer._path.id = 'Geom_Project_' + layer.feature.properties.id;
    });
}


/************************************* ZOOM TO GEOMETRY *****************************************************/
//Research elemement with event 'click' on buton
let TableLine = document.querySelectorAll("#Search button[type='button']");
let TableLine_D = document.querySelectorAll("#Delete button[type='button']");

//For each Line add an event Click
TableLine.forEach(function ReSearchGeom(line) {
    line = document.getElementById(line.getAttribute('id'));
    line.addEventListener('click', getLayer);

    //Set Research id with attribute of click evenement
    function getLayer () {
        var geom =  `Geom_${this.getAttribute('id')}`;

        //Research in each layers if layer id = click line
        jsonLayer.eachLayer(function (layers) {
            layers.eachLayer(function(layer){    
                //set zoom to bounds en style      
                if(layer.feature.properties['id'] == geom) {
                        layer.setStyle({weight: 1, color: "#009a3f",fillColor: '#009a3f'});
                        map.fitBounds(layer.getBounds(),{maxZoom:9}); 
                }
                //reset style
                else {
                    layer.setStyle({weight: 1, color: "#8d0000",fillColor: '#8d0000'});
                }
            });
        })
      };
});

//For each Line add an event Click
TableLine_D.forEach(function ReSearchGeom(line) {
    line = document.getElementById(line.getAttribute('id'));
    line.addEventListener('click', getLayer);

    //Set Research id with attribute of click evenement
    function getLayer () {
        var geom =  `Geom_${this.getAttribute('id')}`;

        //Research in each layers if layer id = click line
        jsonLayer.eachLayer(function (layers) {
            layers.eachLayer(function(layer){    
                //set zoom to bounds en style      
                if(layer.feature.properties['id'] == geom) {
                        layer.setStyle({color: "green",fillColor: 'green'});
                        map.fitBounds(layer.getBounds(),{maxZoom:8}); 
                }
                //reset style
                else {
                    layer.setStyle({color: "red",fillColor: 'red'});
                }
            });
        })
      };
});




=======
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
