$('.submitnojs').on('mousedown', function () {//vérification à la validation de la page
  $(document).find('.btn-danger').each(function(){
      $(this).closest('tr').remove();
  });
});

$('.R1').on('click',function(){
    $(".arg1").attr("placeholder", "Prénom");
    $(".arg2").attr("placeholder", "Nom");
    $(".laaction").get(0).setAttribute('action', 'index.php?controleur=publicationCategorie&action=publicationsChercheurNom');
});
$('.R2').on('click',function(){
    $(".arg1").attr("placeholder", "Laboratoire");
    $(".arg2").attr("placeholder", "Année");
    $(".laaction").get(0).setAttribute('action', 'index.php?controleur=publicationCategorie&action=publicationsLaboratoire');
});
$('.R3').on('click',function(){
    $(".arg1").attr("placeholder", "Prénom");
    $(".arg2").attr("placeholder", "Nom");
    $(".laaction").get(0).setAttribute('action', 'index.php?controleur=publication&action=publicationsExterieures');
});
$('.R4').on('click',function(){
    $(".arg1").attr("placeholder", "Prénom");
    $(".arg2").attr("placeholder", "Nom");
    $(".laaction").get(0).setAttribute('action', 'index.php?controleur=auteur&action=coAuteur');
});


