
let map = L.map('Map').setView([50, 10], 4);


//applique la couche récupéré sur featlet provider.
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

// intialise le geojson
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



//Test fonction
//ajoute l'alerte avec comme donnée l'élément nom de l'event
function functionOnclick (event){
    var layer = event.target;
    console.log(layer.feature.properties.name);
    L.popup()
    .setLatLng(layer.getCenter())
    .setContent("<h2> project_name :" + layer.feature.properties.name + "</h2>"+
                "<h2> project_id : " + layer.feature.properties.id + "</h2>")
    .addTo(jsonLayer);
}



/*Ajout d'intéraction :
accès au calque qui a été survolé via e.target, 
définissons une épaisse bordure grise sur le calque comme effet de surbrillance, 
en l'amenant également à l'avant afin que la bordure ne soit pas en conflit avec les états proches 
(mais pas pour IE , Opera ou Edge, car ils ont des problèmes pour faire bringToFront au survol de la souris). */

function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
        color: 'blue',
        fillOpacity: 0.6
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
}


//Lorsqu'on enlevé la souris de l'éléement -> resetStyle
function resetHighlight(e) {
    ProjectLayer.resetStyle(e.target);
}

//Applique les évenement de souris
function onEachFeature(feature, layer) {

    //test log pour chaque nom de feature et les couches/calque associé
    console.log(feature.properties.name, layer);

    //sur chaqu'un des calques on applique les événements :
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: functionOnclick
    });
}


