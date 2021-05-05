<<<<<<< HEAD
// validates the sending of the form if the mandatory fields are filled
=======
// Validation de formulaire Si il n'y a rien dans le champ project id et disque : le bouton valider est indisponible
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7

var form_add = document.getElementById("Add-FORM");
let submit = form_add.elements['validate'];
form_add.addEventListener('input', Validate);

<<<<<<< HEAD
=======

>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
function Validate () {
  
  var field_BDL = form_add.elements["bdl"];
  var field_DiskN = form_add.elements["n_disk"];

<<<<<<< HEAD
  var form_OK = true;

=======
  console.log('ok');

  var form_OK = true;

  // si le champ ne contient pas de caractères OU
  // si il n'est pas composé que de nombres
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
  if(field_BDL.value == '') {
    form_OK = false;
  }

<<<<<<< HEAD
=======

>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
  if(field_DiskN.value == ''){
    form_OK = false;
  }

<<<<<<< HEAD
=======
  // Au final, on empeche l'envoi du formulaire si form_OK est faux
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
  if (!form_OK) {
    submit.disabled=true;
  }
  else {
    submit.disabled=false;
  }
<<<<<<< HEAD
}
=======
}
>>>>>>> 5316ba74bf989ba975f61ec85a706d1deced87c7
