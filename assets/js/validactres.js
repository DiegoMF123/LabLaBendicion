$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#region').val() == '' ){
            errores += '<p>Elija un region</p>';
            $('#region').css("border-bottom-color", "#F14B4B")
        } else{
            $('#region').css("border-bottom-color", "#d1d1d1")
        }

        // Validado Correo ==============================
        if( $('#pda').val() == '' ){
            errores += '<p>Elija un punto de atención activo</p>';
            $('#pda').css("border-bottom-color", "#F14B4B")
        } else{
            $('#pda').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#dpi').val() == '' ){
            errores += '<p>Ingrese un DPI</p>';
            $('#dpi').css("border-bottom-color", "#F14B4B")
        } else{
            $('#dpi').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#correo').val() == '' ){
            errores += '<p>Ingrese un correo</p>';
            $('#correo').css("border-bottom-color", "#F14B4B")
        } else{
            $('#correo').css("border-bottom-color", "#d1d1d1")
        }
        // Validado Mensaje ==============================
        if( $('#cargo').val() == '' ){
            errores += '<p>Elija un cargo</p>';
            $('#cargo').css("border-bottom-color", "#F14B4B")
        } else{
            $('#cargo').css("border-bottom-color", "#d1d1d1")
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
