
$(document).ready(function(){
  //activation de la boite modale
    $('.modal-trigger').leanModal();

    //patie de validation du commentaire(Ajax)
    $('.see_comment').click(function(){
        //recuperer l'id du bouton see_comment
        var id = $(this).attr('id');
        $.post('ajax/see_comment.php',{id:id},function(){

              $("#commentaire_"+id).hide();
        });  

    });
     //patie de suppression du commentaire(Ajax)
     $('.delete_comment').click(function(){
          //recuperer l'id du bouton delete_comment
            var id = $(this).attr('id');

            $.post('ajax/delete_comment.php',{id:id},function(){

            $("#commentaire_"+id).hide();
          });  
      
      });

});










































//For anyone that wants to use the latest version of Materialize, but doesn't want to
// refactor code, simply apply this to any page that loads a modal
(function($){
    $.fn.leanModal = function(options) {
      if( $('.modal').length > 0 ){
          $('.modal').modal(options);
      }
    };
  
    $.fn.openModal = function(options) {
      $(this).modal(options);
      $(this).modal('open');
    };
  
    $.fn.closeModal = function() {
      $(this).modal('close');
    };
  })(jQuery);
  //fin de reparation du bug de compatibilite
