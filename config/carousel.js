'use strict';

/***********************************************************************************/
/* ********************************* DONNEES CARROUSEL *****************************/
/***********************************************************************************/

// Codes des touches du clavier.
const TOUCHE_GAUCHE = 37;
const TOUCHE_DROITE = 39;
// Constante pour paramétrer la vitesse du carrousel
const DELAI = 3000;

// La liste des slides du carrousel sous forme de tableau d'objets.
const slides =
[
  {
    image: '../carousel/ISA1.jpg', 
  },
  {
    image: '../carousel/vaches.jpg',
  },
  {
    image: '../carousel/isa.jpeg',
  },
  {
    image: '../carousel/isa2.jpg',
  },
  {
    image: '../carousel/isa3.jpg',
  },
  {
    image: '../carousel/isa4.jpg',
  },
];
let maxSlides = slides.length;

// Objet contenant l'état du carrousel.
let carousel;

// Génération de la navigation
let nav = document.querySelector('.carousel-nav');
nav.innerHTML = '';
for (let i = 1; i<= maxSlides;i++){
  let span = document.createElement('span');
  span.setAttribute('class','dot');
  span.setAttribute('data-number',i);
  nav.appendChild(span);
}
/***********************************************************************************/
/* ******************************** FONCTIONS CARROUSEL ****************************/
/***********************************************************************************/

function next()
{
    // Passage à la slide suivante.
    console.log('next');
    carousel.index++;
    // test si fin de liste
    if(carousel.index >= maxSlides){
      carousel.index = 0;
    }
    refresh();
}

function previous()
{
  // Passage à la slide précédente.
  console.log('previous');
  carousel.index--;
    // test si fin de liste
    if(carousel.index < 0){
      carousel.index = maxSlides-1;
    }
    refresh();
}

function keyUp(event)
{
  // intercepter les touches du clavier
  switch(event.keyCode){
    case TOUCHE_GAUCHE:
      //slide précedante
      previous();
      break;
    case TOUCHE_DROITE:
      //slide suivante
      next();
      break;
  }
}

function gotoSlide()
{
  console.log(this);
  let index = this.dataset.number - 1;
  if (index !== carousel.index){
    carousel.index = index;
    refresh();
  }
}

function start()
{
  // Démarrage du carrousel
  carousel.timer = window.setInterval(next, DELAI);

}

function stop()
{
  // Arrêt du carrousel
  carousel.timer = window.clearInterval(carousel.timer);
  carousel.timer = null;
}

function refresh()
{
  // Affichage du carrousel
  let sliderimage = document.querySelector("#carousel img");

  //modifier source image
  sliderimage.src = slides[carousel.index].image;

  // modifier texte du carousel

  
}

//
// CODE PRINCIPAL
//

document.addEventListener('DOMContentLoaded', function()
{
  // Definition du carousel comme un objet
  carousel = new Object;
  carousel.index = 0; // on commence à la première slide, élement 0 du tableau
  carousel.timer = null; // initialisation du timer

  //Définition des écouteurs d'évenements
  document.getElementById("previous").addEventListener("click",previous);
  document.getElementById("next").addEventListener("click",next);
  document.getElementById("carousel-item").addEventListener('mouseover',stop);
  document.getElementById("carousel-item").addEventListener('mouseleave',start);
  document.addEventListener("keyup",keyUp);

  // Ajouter un écouteur d'évenement sur chaque élement de la navigation de slides
  let dots = document.querySelectorAll('.carousel-nav .dot');
  for (let i = 0; i< maxSlides; i++){
    dots[i].addEventListener('click',gotoSlide);    
  }

  // Démarrage du carousel
  start();
  refresh();


});
