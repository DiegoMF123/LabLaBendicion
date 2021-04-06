var tabla;

function init(){
    mostrarform(false);
    listar();

    $("#formulario").on("submit",function(e)
	{
		guardar(e);
    });


    $.post("../controlador/alumno.php?op=selectDepartamento",function(r){
        $("#cbx_departamento").html(r);
        $('#cbx_departamento').selectpicker("refresh");
    });

    // listar provincia
    $(document).ready(function(){
        $("#cbx_departamento").change(function(){

            $('#iddistrito').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
            $("#cbx_departamento option:selected").each(function(){
                idTipoSolicitante= $(this).val();
                $.post("../controlador/alumno.php?op=selectProvincia", { idTipoSolicitante:idTipoSolicitante},function(data){
                    $("#cbx_provincia").html(data);
                });
            });
        });
    });

    // listar distrito
    $(document).ready(function(){
        $("#cbx_provincia").change(function(){
            $("#cbx_provincia option:selected").each(function(){
                idprovincia= $(this).val();
                $.post("../controlador/alumno.php?op=selectDistrito", { idprovincia:idprovincia},function(data){
                    $("#iddistrito").html(data);
                });
            });
        });
    });

}
