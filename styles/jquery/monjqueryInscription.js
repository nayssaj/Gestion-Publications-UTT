$('.Monvalider').prop('disabled', true);

$('.Monvalider').on('mouseenter',function(){
    var nbErreur =0;
    $(document).find('.verif').each(function(){
      if (!$(this).val()) {
          nbErreur +=1;
      }
    });
    if(nbErreur === 0){
        $('.Monvalider').prop('disabled', false); //on active le bouton si tous les champs sont remplis
    }
    else{
        $('.Monvalider').prop('disabled', true);
    }
});
//$('.Monvalider').on('mouseleave',function(){
//    var nbErreur =0;
//    $(document).find('input[type!="hidden"]').each(function(){
//      if ($(this).val() === "") {
//          nbErreur +=1;
//      }
//    });
//    if(nbErreur !== 0){
//        $('.Monvalider').prop('disabled', true); //on active le bouton si tous les champs sont remplis
//    }    
//});


$('.Monverif').on('click',function(){
      $('.Mondanger').hide();     
      $('.Moninfo').hide(); 
      $('.Monsucces').hide();
    var chercheErreur = 0;
   
    $(document).find('.verif').each(function(){
      if (! $(this).val()) { //le cas ou il y aurait des formulaires vides
          //has_empty = true;
          $('.Mondanger').text("Attention ! il semblerait que vous ayez oublié de tout remplir.");
          $('.Mondanger').show();
          chercheErreur +=1;
      }
    });
    if(chercheErreur === 0){ //si le formulaire n'a pas de soucis alors on dévérouille la validation
          $('.Monsucces').text("Le formulaire est rempli et est prêt à être envoyé.");
          $('.Monsucces').show();
          $('.Monvalider').prop('disabled', true); 

    }
    
    $('.Maverification').slideDown();

});

    $('.Mondanger').on('click', function () { //destruction de l'annotation quand on clique dessus
     $('.Maverification').slideUp();
      $('.Mondanger').hide();     
      $('.Moninfo').hide(); 
      $('.Monsucces').hide(); 
    });
    $('.Moninfo').on('click', function () { //destruction de l'annotation quand on clique dessus
     $('.Maverification').slideUp();
      $('.Mondanger').hide();     
      $('.Moninfo').hide(); 
      $('.Monsucces').hide(); 
    });
    $('.Monsucces').on('click', function () { //destruction de l'annotation quand on clique dessus
     $('.Maverification').slideUp();
      $('.Mondanger').hide();     
      $('.Moninfo').hide(); 
      $('.Monsucces').hide(); 
    });
    