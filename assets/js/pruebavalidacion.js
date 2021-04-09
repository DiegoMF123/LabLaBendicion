$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#tipodemuestra').val() == '' ){
            errores += '<p>Elija un tipo de muestra</p>';
            $('#tipodemuestra').css("border-bottom-color", "#F14B4B")
        } else{
            $('#tipodemuestra').css("border-bottom-color", "#d1d1d1")
        }
        // Validado Correo ==============================
        if( $('#mensaje').val() == '' ){
            errores += '<p>Ingresa una descripción para tu presentación</p>';
            $('#mensaje').css("border-bottom-color", "#F14B4B")
        } else{
            $('#mensaje').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#cantunid').val() == '' ){
            errores += '<p>Selecciona una cantidad de unidades</p>';
            $('#dcantunidpi').css("border-bottom-color", "#F14B4B")
        } else{
            $('#cantunid').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#unidadmed').val() == '' ){
            errores += '<p>Ingrese una unidad de medida</p>';
            $('#unidadmed').css("border-bottom-color", "#F14B4B")
        } else{
            $('#unidadmed').css("border-bottom-color", "#d1d1d1")
        }
        // Validado Mensaje ==============================
        if( $('#archivo').val() == '' ){
            errores += '<p>Adjunte un archivo</p>';
            $('#archivo').css("border-bottom-color", "#F14B4B")
        } else{
            $('#archivo').css("border-bottom-color", "#d1d1d1")
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
