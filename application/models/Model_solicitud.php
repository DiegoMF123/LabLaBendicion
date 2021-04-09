<?php
class Model_Solicitud extends CI_Model
{

  public function datosSolicitud(){
    $this->load->database();
    $query = $this->db->query("

    select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombre, tsd.Abreviatura,
  tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo
  from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
 where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
 and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados;



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

  public function guardartsoli($tiposoli,$numsoli,$tiposolid,$desc,$fecha){

    $this->load->database();

    $query = $this->db->query("

    insert into Solicitud(
    Nosolicitud,
    Descripcion,
    Fechacreacion,
    idTipoSolicitud,
    idTipoSolicitante,
    Estados_idEstados
     )values(
       '".$numsoli."',
       '".$desc."',
       STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
       '".$tiposoli."',
       '".$tiposolid."',
       '3'
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

        SELECT * FROM Estados LIMIT 2,10 ;

      ");

      return $query->result();

  }

  public function mostrardatoseditar($id){
    $this->load->database();
    $query = $this->db->query("

    select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombre, tsd.Abreviatura,
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

public function eliminarsolicitud($id){
      $this->load->database();
      $query = $this->db->query("
      delete from Solicitud
      where idSolicitud ='".$id."'
      ");

  }



}



 ?>
