    //script pour le drag and drop 
//$("#sort tbody").sortable().disableSelection();
//script pour le lieu et les conférences
    if( $('.Maclass').val() === "CI" || $('Maclass').val() === "CF"){
        $('.conf').css({'display':'inline'});
    }
    if($('.Maclass').val() !== "CI" && $('Maclass').val() !== "CF"){ 
        $('.conf').css({'display':'none'});
        $('.conf').val("");
    }
    
$('.Maclass').on('click',function(){ //script pour le lieu et les conférences
    if( $('.Maclass').val() === "CF" || $('Maclass').val() === "CF"){
        $('.conf').css({'display':'inline'});
    }
}); //la partie lieu marche correctement

  $('.submitnojs').on('mouseenter',function(){
      var chercheErreur2 = 0;
    
    $(document).find('.verif').each(function(){
      if (! $(this).val()) { //le cas ou il y aurait des formulaires vides
          has_empty = true;
          chercheErreur2 +=1;
      }   
    });
    $(document).find('.TITRE').each(function(){
        if (! $(this).val()) { //le cas ou il y aurait des formulaires vides
          //has_empty = true;
  //        $('.Mondanger').text("Attention ! il semblerait que vous ayez oublié de tout remplir.");
    //      $('.Mondanger').show();
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

  
  $('.submitjs').on('click', function () {//vérification à la validation de la page
    var chercheErreur = 0;
      $('.Mondanger').hide();     
      $('.Moninfo').hide(); 
      $('.Monsucces').hide(); 
   
    $(document).find('.TITRE').each(function(){
        if (! $(this).val()) { //le cas ou il y aurait des formulaires vides
          //has_empty = true;
          $('.Mondanger').text("Attention ! il semblerait que vous ayez oublié de tout remplir.");
          $('.Mondanger').show();
          chercheErreur +=1;
      }
    });
    var countUTT =0;
    $(document).find('.Maorga').each(function(){
        //on cherche un auteur UTTien
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
          $('.Monsucces').text("Le formulaire est rempli et est prêt à être envoyé.");
          $('.Monsucces').show();
          $('.submitnojs').prop('disabled', false);
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
    
    
$changements = 0;  
 $('.B_aP1').on('click', function(){
        $('.auteur-origin').after().append("<tr><td><label class='fa fa-bars'></label></td><td><input class='TITRE form-control' type='text' placeholder='Lemercier' value='' name='nom[]'></td><td><input class='TITRE form-control' type='text' placeholder='Marc' value='' name='prenom[]'></td><td><input class='TITRE form-control Maorga' type='text' placeholder='UTT' value='' name='organisation[]'></td><td><input class='TITRE form-control' type='text' placeholder='tech-CICO' value='' name='departement[]'></td><td><input class='TITRE form-control suppr' type='hidden' value='non' name='supprimer[]' readonly></td><td><div><label class='btn btn-primary B_aM2 glyphicon glyphicon-trash'></label></div></td></tr>");
        $changements+=1;
        $('.B_aP1').hide();
        if ($changements > 0){
            //$('.B_aM1').show();
            $('.B_aP1').show();
        }
 });
    
$('.B_aM1').hide();    

$('.B_aM1').on('click', function(){
        $('.auteur-origin').find('tr').last().remove(); //CA MARCHE !!!!
        $changements-=1;
        $('.B_aM1').hide();
        if ($changements > 0){
            $('.B_aP1').show();
            $('.B_aM1').show();
        }
    }); 

  
  $('.submitnojs').on('mousedown', function () {//vérification à la validation de la page
      $(document).find('.btn-danger').each(function(){
          //$(this).closest('tr').remove();
      });
  });

$(document).on('click','.B_aM2' ,function(){
        //$('.auteur-origin').find('tr').prev().remove();
        if($(this).hasClass("btn-primary")){
            $(this).closest('tr').find('.sup').val("true");
            $(this).removeClass("btn-primary");
            $(this).addClass("btn-danger");
        }
        else{
            //$(".suppr").val('non');
            $(this).closest('tr').find('.sup').val("false");
            $(this).removeClass("btn-danger");
            $(this).addClass("btn-primary");
        }
      
}); 
