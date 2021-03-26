$(document).ready(function(){

      $('#btnSend').click(function(){

          var errores = '';

          // Validado Region ==============================
          if( $('#tiposoporte').val() == '' ){
              errores += '<p>Seleccione un tipo de soporte</p>';
              $('#tiposoporte').css("border-bottom-color", "#F14B4B")
          } else{
              $('#tiposoporte').css("border-bottom-color", "#d1d1d1")
          }

          // Validado Nombre ==============================
          if( $('#numsoporte').val() == '' ){
              errores += '<p>Ingrese el número de soporte</p>';
              $('#numsoporte').css("border-bottom-color", "#F14B4B")
          } else{
              $('#numsoporte').css("border-bottom-color", "#d1d1d1")
          }

          if( $('#telefono').val() == '' ){
            errores += '<p>Ingrese un numero de teléfono(●	Se permite el ingreso de números positivos de hasta 8 cifras )</p>';
            $('#telefono').css("border-bottom-color", "#F14B4B")
        } else{
            $('#telefono').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#email').val() == '' ){
            errores += '<p>Ingrese un email</p>';
            $('#email').css("border-bottom-color", "#F14B4B")
        } else{
            $('#email').css("border-bottom-color", "#d1d1d1")
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
