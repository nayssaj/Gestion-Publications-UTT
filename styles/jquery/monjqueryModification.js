       $('.Maclass').on('click',function(){ //script pour le lieu et les conférences
        if( $('.Maclass').val() === "CI" || $('Maclass').val() === "CF"){
            $('.conf').css({'display':'inline'});
        }
        if($('.Maclass').val() !== "CI" && $('Maclass').val() !== "CF"){ 
            $('.conf').css({'display':'none'});
            $('.conf').val("");
        }
    });
       $('.Maclass').on('click',function(){ //script pour le lieu et les conférences
        if( $('.Maclass').val() === "CF" || $('Maclass').val() === "CF"){
            $('.conf').css({'display':'inline'});
        }
    });
