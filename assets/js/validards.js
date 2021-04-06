$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#tiposoli').val() == '' ){
            errores += '<p>Seleccione un tipo de solicitante(REGRESE A LA PANTALLA DATOS NUEVA SOLICITUD)</p>';
            $('#tiposoli').css("border-bottom-color", "#F14B4B")
        } else{
            $('#tiposoli').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#numfac').val() == '' ){
            errores += '<p>Ingrese un número de solicitud (REGRESE A LA PANTALLA DATOS NUEVA SOLICITUD)</p>';
            $('#numfac').css("border-bottom-color", "#F14B4B")
        } else{
            $('#numfac').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#tiposolid').val() == '' ){
            errores += '<p>Ingrese un tipo de solicitud (REGRESE A LA PANTALLA DATOS NUEVA SOLICITUD)</p>';
            $('#tiposolid').css("border-bottom-color", "#F14B4B")
        } else{
            $('#tiposolid').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#mensaje').val() == '' ){
            errores += '<p>Ingrese una descripció (REGRESE A LA PANTALLA DATOS NUEVA SOLICITUD)</p>';
            $('#mensaje').css("border-bottom-color", "#F14B4B")
        } else{
            $('#mensaje').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#numsoli').val() == '' ){
            errores += '<p>Ingrese un número de solicitud (REGRESE A LA PANTALLA DATOS NUEVA SOLICITUD)</p>';
            $('#numsoli').css("border-bottom-color", "#F14B4B")
        } else{
            $('#numsoli').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#tiposoporte').val() == '' ){
            errores += '<p>Seleccione un tipo de soporte</p>';
            $('#tiposoporte').css("border-bottom-color", "#F14B4B")
        } else{
            $('#tiposoporte').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#numsoporte').val() == '' ){
            errores += '<p>Ingrese un numero de soporte</p>';
            $('#numsoporte').css("border-bottom-color", "#F14B4B")
        } else{
            $('#numsoporte').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#telefono').val() == '' ){
            errores += '<p>Ingrese un número de telefono</p>';
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
