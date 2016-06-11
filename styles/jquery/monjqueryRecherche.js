$('.submitnojs').on('mousedown', function () {//vérification à la validation de la page
  $(document).find('.btn-danger').each(function(){
      $(this).closest('tr').remove();
  });
});

$('.R1').on('click',function(){
    $(".arg1").attr("placeholder", "Prénom");
    $(".arg2").attr("placeholder", "Nom");
});
$('.R2').on('click',function(){
    $(".arg1").attr("placeholder", "Laboratoire");
    $(".arg2").attr("placeholder", "Année"); 
});
$('.R3').on('click',function(){
    $(".arg1").attr("placeholder", "Prénom");
    $(".arg2").attr("placeholder", "Nom");
});
$('.R4').on('click',function(){
    $(".arg1").attr("placeholder", "Prénom");
    $(".arg2").attr("placeholder", "Nom");
});