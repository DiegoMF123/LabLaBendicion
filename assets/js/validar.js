$(document).ready(function(){

      $('#btnSend').click(function(){

          var errores = '';

          // Validado Region ==============================
          if( $('#tipo').val() == '' ){
              errores += '<p>Seleccione una Region</p>';
              $('#tipo').css("border-bottom-color", "#F14B4B")
          } else{
              $('#tipo').css("border-bottom-color", "#d1d1d1")
          }

          // Validado Nombre ==============================
          if( $('#nombrepda').val() == '' ){
              errores += '<p>Ingrese un nombre para el punto de atención</p>';
              $('#nombrepda').css("border-bottom-color", "#F14B4B")
          } else{
              $('#nombrepda').css("border-bottom-color", "#d1d1d1")
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
