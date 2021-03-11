$(document).ready(function(){

      $('#btnSend').click(function(){

          var errores = '';

          // Validado Region ==============================
          if( $('#cbox1').val() == '' ){
              errores += '<p>Seleccione un método de ingreso</p>';
              $('#cbox1').css("border-bottom-color", "#F14B4B")
          } else{
              $('#cbox1').css("border-bottom-color", "#d1d1d1")
          }

          // Validado Nombre ==============================
          if( $('#nombre').val() == '' ){
              errores += '<p>Ingrese un nombre</p>';
              $('#nombre').css("border-bottom-color", "#F14B4B")
          } else{
              $('#nombre').css("border-bottom-color", "#d1d1d1")
          }

          if( $('#correo').val() == '' ){
              errores += '<p>Ingrese un correo</p>';
              $('#correo').css("border-bottom-color", "#F14B4B")
          } else{
              $('#correo').css("border-bottom-color", "#d1d1d1")
          }

          if( $('#telefono').val() == '' ){
              errores += '<p>Ingrese un telefono</p>';
              $('#telefono').css("border-bottom-color", "#F14B4B")
          } else{
              $('#telefono').css("border-bottom-color", "#d1d1d1")
          }

          if( $('#nombre').val() == '' ){
              errores += '<p>Ingrese un Nombre</p>';
              $('#nombre').css("border-bottom-color", "#F14B4B")
          } else{
              $('#nombre').css("border-bottom-color", "#d1d1d1")
          }

          if( $('#pda').val() == '' ){
              errores += '<p>Seleccione una oficina / agencia</p>';
              $('#pda').css("border-bottom-color", "#F14B4B")
          } else{
              $('#pda').css("border-bottom-color", "#d1d1d1")
          }

          if( $('#mensaje').val() == '' ){
              errores += '<p>Ingrese una descripción para su queja</p>';
              $('#mensaje').css("border-bottom-color", "#F14B4B")
          } else{
              $('#mensaje').css("border-bottom-color", "#d1d1d1")
          }



          // ENVIANDO MENSAJE ============================
          if( errores == '' == false){
              var mensajeModal = '<div class="modal_wrap">'+
                                      '<div class="mensaje_modal">'+
                                          '<h3>Debe llenar estos campos obligatoriamente!</h3>'+
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
