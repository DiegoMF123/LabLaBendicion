$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#tiposoli').val() == '' ){
            errores += '<p>Seleccione un tipo de solicitante</p>';
            $('#tiposoli').css("border-bottom-color", "#F14B4B")
        } else{
            $('#tiposoli').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#numfac').val() == '' ){
            errores += '<p>Ingrese un número de solicitud</p>';
            $('#numfac').css("border-bottom-color", "#F14B4B")
        } else{
            $('#numfac').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#tiposolid').val() == '' ){
            errores += '<p>Ingrese un tipo de solicitud</p>';
            $('#tiposolid').css("border-bottom-color", "#F14B4B")
        } else{
            $('#tiposolid').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#mensaje').val() == '' ){
            errores += '<p>Ingrese una descripción</p>';
            $('#mensaje').css("border-bottom-color", "#F14B4B")
        } else{
            $('#mensaje').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#numsoli').val() == '' ){
            errores += '<p>Ingrese un número de solicitud</p>';
            $('#numsoli').css("border-bottom-color", "#F14B4B")
        } else{
            $('#numsoli').css("border-bottom-color", "#d1d1d1")
        }




        // ENVIANDO MENSAJE ============================
        if( errores == '' == false){
            var mensajeModal = '<div class="modal_wrap">'+
                                    '<div class="mensaje_modal">'+
                                        '<h3>Errores Detectatos</h3>'+
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
