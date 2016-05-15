
$('.Monvalider').prop('disabled', true);

$('.Monvalider').on('mouseenter',function(){
    var nbErreur =0;
    $(document).find('input[type!="hidden"]').each(function(){
      if (!$(this).val()) {
          nbErreur +=1;
      }
      if(nbErreur === 0){
        $('.Monvalider').prop('disabled', false);
    }
    });
    
    
});

$('.Monreinit').on('click',function(){
   $('.Monvalider').prop('disabled', true); 
});