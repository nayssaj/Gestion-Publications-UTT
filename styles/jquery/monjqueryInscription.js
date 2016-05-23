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
   $('.Monvalider').prop('disabled', true); 
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
    