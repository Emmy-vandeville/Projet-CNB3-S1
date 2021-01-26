'use strict';
let idSelected = [];

//Sélectionne ou désélectionne une image
function selectionner(){
  if(this.classList.contains("selected")){
    this.classList.remove("selected");

    //Enlever des id mises dans un tableau en JS
    let index = idSelected.indexOf(parseInt(this.getElementsByTagName('img')[0].id));
    if (index !== -1) {
      idSelected.splice(index, 1);
    }
  }
  else{
    this.classList.add("selected");

    //Récupération des id mises dans un tableau en JS
    idSelected.push(parseInt(this.getElementsByTagName('img')[0].id));
  }

  let formId = document.getElementById('jsonId');
  formId.value = JSON.stringify(idSelected);


console.log(formId.value);
}

//
// Code principal
//

document.addEventListener('DOMContentLoaded', function(){

  let balises = document.getElementsByClassName('element');
  for (let balise of balises) {
    balise.addEventListener("click", selectionner);
  }

})
