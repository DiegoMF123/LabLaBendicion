$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#function-data').val() == '' ){
            errores += '<p>Ingresa el número de muestra para realizar la busqueda</p>';
            $('#function-data').css("border-bottom-color", "#F14B4B")
        } else{
            $('#function-data').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#items').val() == '' ){
            errores += '<p>Selecciona items a asociar</p>';
            $('#items').css("border-bottom-color", "#F14B4B")
        } else{
            $('#items').css("border-bottom-color", "#d1d1d1")
        }

        // ENVIANDO MENSAJE ============================
        if( errores == '' == false){
            var mensajeModal = '<div class="modal_wrap">'+
                                    '<div class="mensaje_modal">'+
                                        '<h3>Errores Detectados</h3>'+
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
