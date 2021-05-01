
//Set map
let map = L.map('Map').setView([50, 10], 4);

//ADD Leaflet layer -> Basemap with 2 types of layers.
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

// Set layer geometry for project
var ProjectLayer = L.geoJson("", {
    style: style,
    onEachFeature: onEachFeature
});


//Function to set style to layer
function style(feature) {
    return {
        fillColor: 'red',
        weight: 3,
        opacity: 0.6,
        color: 'red',
        fillOpacity: 0.3
    };
}


//ADD POPUP ON CLICK for each geometry
function functionOnclick (event){
    var layer = event.target;

    //Set content for Search geometry => different content for each type of geometry
    if(layer.feature.properties.name == "search") {
        if(layer.feature.properties.datatype == "Image") {
            var content= "<h3><span> BDL : " + layer.feature.properties.bdl + "</span>" +
                        "<span STYLE='padding:0 0 0 60px;'> Type : Image </span></h3>" +
                        "<table><thead><tr><th> N° DISK </th><th> RAW </th><th> LV0 </th><th> LV2 </th>" +
                        "<th> LV3 </th><th> RVB </th><th> RVBI </th><th> PAN </th><th> CIR </th></tr></thead>"+
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
                        "<table><thead><tr><th> N° DISK </th><th> TIF </th><th> ECW </th><th> JPG </th>" +
                        "<th> RVB </th><th> RVBI </th><th> INFRARED </th><th> 8BIT </th><th> 16BIT </th></tr></thead>"+
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
                        "<table><thead><tr><th> N° DISK </th><th> RAW </th><th> LV0 </th><th> LV2 </th>" +
                        "<th> LV3 </th><th> RVB </th><th> RVBI </th><th> PAN </th><th> CIR </th></tr></thead>"+
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
        if(layer.feature.properties.datatype == "Project") {
            var content= "<h3><span> BDL : " + layer.feature.properties.bdl + "</span>" +
                        "<span STYLE='padding:0 0 0 60px;'> Type : Project </span></h3>" +
                        "<table><thead><tr><th> N° DISK </th><th> TIF </th><th> ECW </th><th> JPG </th>" +
                        "<th> RVB </th><th> RVBI </th><th> INFRARED </th><th> 8BIT </th><th> 16BIT </th></tr></thead>"+
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


    }

    //Set content for Add geometry
    else {
        var content ="<h2> Name : " + layer.feature.properties.name + "</h2>"+
                    "<h2> BDL : " + layer.feature.properties.id + "</h2>";
    }
    L.popup()
    .setLatLng(layer.getCenter())
    .setContent(content)
    .addTo(jsonLayer);
}


/* Set HOVER function */
function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
        fillOpacity: 0.6
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
}


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
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: functionOnclick
    });
}

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




