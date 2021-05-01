// Validation de formulaire Si il n'y a rien dans le champ project id et disque : le bouton valider est indisponible

var form_add = document.getElementById("Add-FORM");
let submit = form_add.elements['validate'];
form_add.addEventListener('input', Validate);

function Validate () {
  
  var field_BDL = form_add.elements["bdl"];
  var field_DiskN = form_add.elements["n_disk"];

  console.log('ok');

  var form_OK = true;

  // si le champ ne contient pas de caractères OU
  // si il n'est pas composé que de nombres
  if(field_BDL.value == '') {
    form_OK = false;
  }


  if(field_DiskN.value == ''){
    form_OK = false;
  }

  // Au final, on empeche l'envoi du formulaire si form_OK est faux
  if (!form_OK) {
    submit.disabled=true;
  }
  else {
    submit.disabled=false;
  }
}

/*
var form_search = document.getElementById("Search-FORM");
let submit = form_search.elements['validate'];
search_add.addEventListener('input', Validate);
*/