$(function(){
    // cacher tous les élements qui ont la classe panel
    let allPanels = $(".panel").hide();
    // On déplie le 1er élement de classe panel
    $(".panel:first").show();
    // actions au click sur le lien du h2
    $(".toggleDetail").click(function(){
        // si on ne clique pas sur l'element déjà déplié
        if ($(this).parent().next().is(':hidden')){
            // on replie les elemnts de classe panel
            allPanels.slideUp();
            //On déplie l'element cliqué
            $(this).parent().next().slideDown();
        }
    });

});
