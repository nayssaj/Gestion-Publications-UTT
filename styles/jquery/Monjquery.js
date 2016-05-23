       $('.Maverification').slideUp();
//idée=>>>//on fait un array on compte les auteurs et on affiche les éléments que l'on veut
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
        $('.auteur-origin').after().append("<tr><td><input class='form-control verif' type='text' placeholder='Lemercier' value='' name='nom[]'></td><td><input class='form-control verif' type='text' placeholder='Marc' value='' name='prenom[]'></td><td><input class='form-control verif Maorga' type='text' placeholder='UTT' value='' name='organisation[]'></td><td><input class='form-control verif' type='text' placeholder='tech-CICO' value='' name='departement[]'></td></tr>");
        //$('#B_aM').remove();
        //$('.auteur-origin').after().append('<tr><td><div class=" B_a" data-toggle="buttons"><label class="btn btn-primary B_aP">+</label><label class="btn btn-primary B_aM">-</label><div/><td/><tr/>');
        //$('.B_aP').remove();
        
    });
    $('.B_aM').on('click', function(){
        //$('.auteur-origin').after().text($('.auteur-origin').after().text().slice()); //supprime tout
        $('.auteur-origin').find('tr').last().remove(); //CA MARCHE !!!!
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
  
$('.submitjs').on('click', function () {//vérification à la validation de la page
    $('.Mondanger').hide();     
    $('.Moninfo').hide(); 
    $('.Monsucces').hide(); 
    var chercheErreur = 0;
    $(document).find('.verif').each(function(){
        if (! $(this).val()) { //le cas ou il y aurait des formulaires vides
            has_empty = true;
            $('.Mondanger').text("Attention ! il semblerait que vous ayez oublié de tout remplir.");
            $('.Mondanger').show();
            chercheErreur +=1;
        }      
    });
    var countUTT =0;
    $(document).find('.Maorga').each(function(){ //on cherche un auteur UTTien
      if($(this).val() === 'UTT'){
          countUTT+=1;
      }
    });
    if (countUTT<1){
        $('.Moninfo').text('Le formulaire ne peut pas être accepté si il n\'y a pas d\'auteur de l\'UTT');
        $('.Moninfo').show();
        chercheErreur +=1;
    }
    
    if(chercheErreur === 0){ //si le formulaire n'a pas de soucis alors on dévérouille la validation
          $('.Monsucces').text("Le formulaire est rempli et est pret à être envoyé.");
          $('.Monsucces').show();
          $('.submitnojs').prop('disabled', false);
    }
    
    
    $('.Maverification').slideDown();
  });
  
  $('.submitnojs').on('mouseenter',function(){
      var chercheErreur2 = 0;
    
    $(document).find('.verif').each(function(){
      if (! $(this).val()) { //le cas ou il y aurait des formulaires vides
          has_empty = true;
          chercheErreur2 +=1;
      }   
    });
    var countUTT =0;
    $(document).find('.Maorga').each(function(){ //on cherche un auteur UTTien
      if($(this).val() === 'UTT'){
          countUTT+=1;
      }
    });
    if (countUTT<1){
        chercheErreur2 +=1;
    }
      
    if(chercheErreur2 === 0){ //si le formulaire n'a pas de soucis alors on dévérouille la validation
          $('.submitnojs').prop('disabled', false);
    }
    else{
        $('.submitnojs').prop('disabled', true);
    }
    //$('.Maverification').slideDown();
  });