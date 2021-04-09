<?php
class Model_Muestra extends CI_Model
{

  public function datosmuestra(){

    $this->load->database();
    $query = $this->db->query("
    select mu.idMuestra, mu.Presentacion, mu.Cantidad, tm.NombreMuestra, um.Nombreum, mu.FechaCreacion, mu.Nombre_archivo
    from Muestra as mu inner join TipoMuestra tm inner join Umedida um
    where mu.TipoMuestra_idTipoMuestra = tm.idTipoMuestra and mu.Umedida_idUmedida = um.idUmedida;


      ");
    return $query->result();
  }

  public function tipomuestra(){

    $this->load->database();
    $query = $this->db->query("
    Select * from TipoMuestra

      ");
    return $query->result();
  }

  public function umedida(){

    $this->load->database();
    $query = $this->db->query("
    Select * from Umedida

      ");
    return $query->result();
  }

  public function guardar($tipodemuestra,$presentacion,$cantunid,$unidadmed,$fecha,$nombre,$tamanio,$tipo){
      $this->load->database();
      $query=$this->db->query("
        insert into Muestra (
        Presentacion,
        Cantidad,
        TipoMuestra_idTipoMuestra,
        Umedida_idUmedida,
        Nombre_archivo,
        FechaCreacion,
        tamanio,
        tipo
        )values(
        '".$presentacion."',
        '".$cantunid."',
        '".$tipodemuestra."',
        '".$unidadmed."',
        '".$nombre."',
        STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
        '".$tamanio."',
        '".$tipo."'
      );

      ");

  }

  public function mostrare($id){
    $this->load->database();
    $query = $this->db->query("
    select idMuestra,Nombre_archivo
    from Muestra
    where idMuestra='".$id."'
      ");

    return $query->result();

  }



}


 ?>
