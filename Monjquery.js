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
    //fin script pour lieu et conférence
    
    
    //script pour afficher le formulaire avec les auteurs multiples
    $('.B_aP').on('click', function(){
        $('.B_aM').show();
        $('.auteur-origin').after().append("<tr><td><input class='form-control' type='text' placeholder='Lemercier' value='' name='nom[]'></td><td><input class='form-control' type='text' placeholder='Marc' value='' name='prenom[]'></td><td><input class='form-control' type='text' placeholder='UTT' value='' name='organisation[]'></td><td><input class='form-control' type='text' placeholder='tech-CICO' value='' name='departement[]'></td></tr>");
        //$('#B_aM').remove();
        //$('.auteur-origin').after().append('<tr><td><div class=" B_a" data-toggle="buttons"><label class="btn btn-primary B_aP">+</label><label class="btn btn-primary B_aM">-</label><div/><td/><tr/>');
        //$('.B_aP').remove();
        
    });
    $('.B_aM').on('click', function(){
        $('.auteur-origin').after().text($('.auteur-origin').after().text().slice()); //supprime tout
    });
    
    $('.submitjs').on('click', function () {  //c'est ici que l'on vérifie tout avant de laisser l'utilisateur valider.
    var $btn = $(this).button('loading');
    // business logic...
    $btn.button('reset');
  });