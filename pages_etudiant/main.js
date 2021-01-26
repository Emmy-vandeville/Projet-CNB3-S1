'use strict';
let idSelected = [];
let nbselection = 0;

//Sélectionne ou désélectionne une image
function selectionner(){
  if(this.classList.contains("selected")){
    this.classList.remove("selected");
    nbselection -= 1;
    //Enlever des id mises dans un tableau en JS
    let index = idSelected.indexOf(parseInt(this.getElementsByTagName('img')[0].id));
    if (index !== -1) {
      idSelected.splice(index, 1);
    }
  }
  else{
    this.classList.add("selected");
    nbselection += 1;

    //Récupération des id mises dans un tableau en JS
    idSelected.push(parseInt(this.getElementsByTagName('img')[0].id));
    
  }

  
  let formId = document.getElementById('jsonId');
  formId.value = JSON.stringify(idSelected);
  document.querySelector("#total span").textContent = nbselection;

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
