$(document).ready(function(){

      $('#btnSend').click(function(){

          var errores = '';

          // Validado Region ==============================
          if( $('#sigcor').val() == '' ){
              errores += '<p>Ingrese siglas para un nuevo tipo queja</p>';
              $('#sigcor').css("border-bottom-color", "#F14B4B")
          } else{
              $('#sigcor').css("border-bottom-color", "#d1d1d1")
          }

          // Validado Nombre ==============================
          if( $('#mensaje').val() == '' ){
              errores += '<p>Ingrese una Descripcion para el tipo de queja a crear</p>';
              $('#mensaje').css("border-bottom-color", "#F14B4B")
          } else{
              $('#mensaje').css("border-bottom-color", "#d1d1d1")
          }


          // ENVIANDO MENSAJE ============================
          if( errores == '' == false){
              var mensajeModal = '<div class="modal_wrap">'+
                                      '<div class="mensaje_modal">'+
                                          '<h3>Errores encontrados</h3>'+
                                          errores+
                                          '<span id="btnClose">Cerrar</span>'+
                                      '</div>'+
                                  '</div>'

              $('body').append(mensajeModal);
          }

          // CERRANDO MODAL ==============================
          $('#btnClose').click(function(){
              $('.modal_wrap').remove();
          });
      });

  });
