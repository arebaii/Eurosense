// validates the sending of the form if the mandatory fields are filled

var form_add = document.getElementById("Add-FORM");
let submit = form_add.elements['validate'];
form_add.addEventListener('input', Validate);

function Validate () {
  
  var field_BDL = form_add.elements["bdl"];
  var field_DiskN = form_add.elements["n_disk"];

  var form_OK = true;

  if(field_BDL.value == '') {
    form_OK = false;
  }

  if(field_DiskN.value == ''){
    form_OK = false;
  }

  if (!form_OK) {
    submit.disabled=true;
  }
  else {
    submit.disabled=false;
  }
}
