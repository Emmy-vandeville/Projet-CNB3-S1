$(function () {
  //on cache tous les éléments
  $('.panel').hide();
  //au click sur h2 on réalise la suite de commandes suivantes
  $('article h2').click(function(){
    //si le detail du h2 cliqué est caché alors :
    if($(this).next('.panel').is(':hidden')){
      //on fait apparaitre l'article
      $(this).next('.panel').slideDown();
      //on change l'icone
      //$(this).children('i').removeClass('fa-caret-down').addClass('fa-caret-up');
    }
    //sinon s'il est affiché on le cache
    else{
      $(this).next('.panel').slideUp();
      //et on change d'icone
      //$(this).children('i').removeClass('fa-caret-up').addClass('fa-caret-down');
    }
  })
});
