    $('.Maclass').on('click',function(){
        if($('.Maclass').val() === "CI" || $('Maclass').val() === "CF"){
            $('.conf').css({'display':'inline'});
        }
        else{$('.conf').css({'display':'none'});
            $('.conf').val("");}
    });

    $('.btn-warning').on('mouseenter',function(){
      $(this).closest('.conf').show();
    });
    
    $('.btn-warning').on('click',function(){
        $('this').closest('.conf').css({'display':'inline'});
    });
