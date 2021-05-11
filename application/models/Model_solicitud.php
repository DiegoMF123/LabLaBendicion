<?php
class Model_Solicitud extends CI_Model
{

  public function datosSolicitud(){
    $this->load->database();
    $query = $this->db->query("

      select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion,soli.Observaciones, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
       tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
       from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
       inner join Expediente exp
      where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
      and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
      and soli.Nosolicitud = exp.Correlativo and soli.idEstadosE = 1 order by soli.idSolicitud asc;



      ");
    return $query->result();
  }

  public function datosSolicitudusuario($user){
    $this->load->database();
    $query = $this->db->query("

      select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion,soli.Observaciones, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
       tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
       from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
       inner join Expediente exp
      where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
      and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
      and soli.Nosolicitud = exp.Correlativo and soli.idEstadosE = 1 and soli.Usuarios_idUsuarios = '".$user."' order by soli.idSolicitud asc;



      ");
    return $query->result();
  }

  public function sidSolicitud($id){
    $this->load->database();
    $query = $this->db->query("

    select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
    tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
    from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
    inner join Expediente exp
   where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
   and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
   and soli.Nosolicitud = exp.Correlativo and soli.idSolicitud = '".$id."' order by soli.idSolicitud asc;


      ");
    return $query->result();
  }



  public function tiposolicitante(){

    $this->load->database();
    $query = $this->db->query("
    Select * from TipoSolicitante

      ");
    return $query->result();
  }

  public function tiposolicitud(){

    $this->load->database();
    $query = $this->db->query("
    Select * from TipoSolicitud

      ");
    return $query->result();
  }

  public function buscarsoli($numsoli){

    $this->load->database();
    $query=$this->db->query("

    select NIT, Nombre from Expediente where Correlativo = '".$numsoli."'

    ");
    return $query->result();
  }

  public function tiposoporte(){
     $this->load->database();
     $query=$this->db->query("

     select * from TipoSoporte

     ");
     return $query->result();
  }

  public function guardartsoli($tiposoli,$numsoli,$tiposolid,$desc,$fecha,$idusuario){

    $this->load->database();

    $query = $this->db->query("

    insert into Solicitud(
    Nosolicitud,
    Descripcion,
    Fechacreacion,
    idTipoSolicitud,
    idTipoSolicitante,
    Estados_idEstados,
    Usuarios_idUsuarios,
    idEstadosE
     )values(
       '".$numsoli."',
       '".$desc."',
       STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
       '".$tiposoli."',
       '".$tiposolid."',
       '4',
       '".$idusuario."',
       '1'
       )

    ");



  }

  public function guardarsopcon($tiposoporte,$numsoporte,$telefono,$email,$rs){

    $this->load->database();

    $query = $this->db->query("

    insert into SoporteContacto(
      NumeroSoporte,
      Telefono,
      Correo,
      TipoSoporte_idTipoSoporte,
      Solicitud_idSolicitud
     )values(
       '".$numsoporte."',
       '".$telefono."',
       '".$email."',
       '".$tiposoporte."',
       '".$rs."'
       )

    ");

  }


  public function codigosolisoporte(){



    $this->load->database();

    $query = $this->db->query("

         SELECT MAX(idSolicitud) + 1  AS idSolicitud FROM Solicitud;

      ");

  return $query->result();

  }

  public function numerosolicitud(){



    $this->load->database();

    $query = $this->db->query("

         SELECT MAX(idSolicitud)  AS idSolicitud FROM Solicitud;

      ");

  return $query->result();

  }

  public function expediente(){
    $this->load->database();
    $query = $this->db->query("
    select Correlativo, Nit, Nombre from Expediente
      ");
    return $query->result();


  }


  public function nombrenit($valor){
      $this->load->database();

      $query=$this->db->query("

        select Nit, Nombre from Expediente where Correlativo = '".$valor."';

      ");

      return $query->result();

  }

  public function estado(){
      $this->load->database();

      $query=$this->db->query("

        SELECT * FROM Estados LIMIT 3,10 ;

      ");

      return $query->result();

  }

  public function estadodocumento(){
      $this->load->database();

      $query=$this->db->query("

        SELECT * FROM Estados LIMIT 2,2;

      ");

      return $query->result();

  }

  public function mostrardatoseditar($id){
    $this->load->database();
    $query = $this->db->query("

    select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Observaciones, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
  tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo
  from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
 where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
 and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados and soli.idSolicitud= '".$id."';



      ");
    return $query->result();
  }


public function update($id,$estado,$fechamodifi){

$this->load->database();
$query =  $this->db->query("
update Solicitud
  set idSolicitud='".$id."',
     Fechamodificacion = STR_TO_DATE('".$fechamodifi."', '%d-%m-%Y %H:%i:%s'),
     Estados_idEstados= '".$estado."'
     where idSolicitud ='".$id."'
");
}

public function updatestadodos($id,$estado,$fechamodifi,$observaciones){

$this->load->database();
$query =  $this->db->query("
update Solicitud
  set idSolicitud='".$id."',
     Fechamodificacion = STR_TO_DATE('".$fechamodifi."', '%d-%m-%Y %H:%i:%s'),
     Estados_idEstados= '".$estado."',
     Observaciones= '".$observaciones."'
     where idSolicitud ='".$id."'
");
}

public function eliminarsolicitud($id){
      $this->load->database();
      $query = $this->db->query("
      update Solicitud
        set idSolicitud='".$id."',
           	idEstadosE= 2
           where idSolicitud ='".$id."'
      ");

  }
  //--------------------FILTROS-----------------------------------
  //--------------------USUARIOS-----------------------------------
  public function usuarioasignacion(){

    $this->load->database();
    $query = $this->db->query("
    Select * from Expediente

      ");
    return $query->result();
  }
    //--------------------ESTADO SOLICITUD-----------------------------------
  public function estadosolicitud(){

    $this->load->database();
    $query = $this->db->query("
    SELECT * FROM Estados LIMIT 3,10 ;

      ");
    return $query->result();
  }



  //--------------------Boton Consultar-----------------------------------
  public function busquedafiltroEstado($estado){
  $this->load->database();
  $query=$this->db->query("

  select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
  tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
  from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
  inner join Expediente exp
  where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
  and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
  and soli.Nosolicitud = exp.Correlativo  AND soli.Estados_idEstados = '".$estado."'
  ");
  return $query->result();
  }

  public function busquedafiltroExpendiente($noexpediente){
  $this->load->database();
  $query=$this->db->query("

  select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
  tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
  from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
  inner join Expediente exp
  where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
  and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
  and soli.Nosolicitud = exp.Correlativo  AND soli.Nosolicitud = '".$noexpediente."'

    ");
  return $query->result();
  }

  public function busquedafiltroSolicitud($nosolicitud){
  $this->load->database();
  $query=$this->db->query("

  select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
  tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
  from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
  inner join Expediente exp
  where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
  and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
  and soli.Nosolicitud = exp.Correlativo  AND soli.idSolicitud = '".$nosolicitud."'

  ");
  return $query->result();
  }

  public function busquedafiltroTipoSolicitud($tiposolid){
  $this->load->database();
  $query=$this->db->query("
  select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
  tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
  from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
  inner join Expediente exp
  where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
  and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
  and soli.Nosolicitud = exp.Correlativo  AND soli.idTipoSolicitud = '".$tiposolid."'

  ");
  return $query->result();
  }

  public function busquedafiltroSoporte($nosoporte){
  $this->load->database();
  $query=$this->db->query("
  select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
  tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
  from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
  inner join Expediente exp
  where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
  and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
  and soli.Nosolicitud = exp.Correlativo  AND sc.NumeroSoporte = '".$nosoporte."'

  ");
  return $query->result();
  }

  public function busquedafiltroNit($nit){
  $this->load->database();
  $query=$this->db->query("
  select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
  tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
  from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
  inner join Expediente exp
  where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
  and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
  and soli.Nosolicitud = exp.Correlativo  AND exp.Nit = '".$nit."'
  ");
  return $query->result();
  }

  public function busquedafiltroUsuarioAsigna($usuarioAsignacion){
  $this->load->database();
  $query=$this->db->query("
  select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
  tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,  exp.Direccion, exp.Nombre
  from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
  inner join Expediente exp
  where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
  and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
  and soli.Nosolicitud = exp.Correlativo  AND exp.idExpediente = '".$usuarioAsignacion."'
  ");
  return $query->result();
  }






}



 ?>
