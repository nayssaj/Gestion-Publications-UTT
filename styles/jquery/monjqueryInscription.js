$('.Monvalider').prop('disabled', true);

$('.Monvalider').on('mouseenter',function(){
    var nbErreur =0;
    $(document).find('input[type!="hidden"]').each(function(){
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


$('.Monreinit').on('click',function(){
   $('.Monvalider').prop('disabled', true); 
});