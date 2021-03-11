$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#dpi').val() == '' ){
            errores += '<p>Ingrese DPI</p>';
            $('#dpi').css("border-bottom-color", "#F14B4B")
        } else{
            $('#dpi').css("border-bottom-color", "#d1d1d1")
        }

        // Validado Correo ==============================
        if( $('#nombre').val() == '' ){
            errores += '<p>Ingrese un nombre</p>';
            $('#nombre').css("border-bottom-color", "#F14B4B")
        } else{
            $('#nombre').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#rol').val() == '' ){
            errores += '<p>Elija un rol</p>';
            $('#rol').css("border-bottom-color", "#F14B4B")
        } else{
            $('#rol').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#usuario').val() == '' ){
            errores += '<p>Ingrese una usuario</p>';
            $('#usuario').css("border-bottom-color", "#F14B4B")
        } else{
            $('#usuario').css("border-bottom-color", "#d1d1d1")
        }
        // Validado Mensaje ==============================
        if( $('#password').val() == '' ){
            errores += '<p>Ingrese un password</p>';
            $('#password').css("border-bottom-color", "#F14B4B")
        } else{
            $('#password').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#cofirmarusername').val() == '' ){
            errores += '<p>No ha confirmado el usuario ingresado</p>';
            $('#cofirmarusername').css("border-bottom-color", "#F14B4B")
        } else{
            $('#cofirmarusername').css("border-bottom-color", "#d1d1d1")
        }

        if( $('#confirmarpassword').val() == '' ){
            errores += '<p>No ha confirmado la contraseña ingresada</p>';
            $('#confirmarpassword').css("border-bottom-color", "#F14B4B")
        } else{
            $('#confirmarpassword').css("border-bottom-color", "#d1d1d1")
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
