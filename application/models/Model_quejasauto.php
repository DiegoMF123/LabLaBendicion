<?php
class Model_quejasauto extends CI_Model{

  public function guardar($sigcor,$desc,$fecha,$rs){

    $this->load->database();

    $query = $this->db->query("

    insert into Tipo_Queja(
     Correlativo,
     FechaCreacion,
      Estados_idEstados,
      Descripcion
     )values(
       '".$sigcor."-".$rs."',
       STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
       '1',
      '".$desc."'
       )

    ");

  }
  public function verificars($verificar){

      $this->load->database();

      $query = $this->db->query("

      select count(Correlativo) from Tipo_Queja where Correlativo like '%".$verificar."%'

      ");
        return $query->result();

  }

  public function listadoq(){

    $this->load->database();

    $query = $this->db->query("

    select tq.idTipo_Queja, tq.Correlativo, est.NombreEstado, tq.Descripcion
    from Tipo_Queja as tq inner join Estados est where tq.Estados_idEstados = est.idEstados;

    ");
      return $query->result();

  }

  public function selectidlistadoq($id){

    $this->load->database();

    $query = $this->db->query("

    select tq.idTipo_Queja, tq.Correlativo, est.NombreEstado, tq.Descripcion
from Tipo_Queja as tq inner join Estados est where tq.Estados_idEstados = est.idEstados and tq.idTipo_Queja = '".$id."';

    ");
      return $query->result();

  }

  public function update($id,$estado,$desc,$fechamodifi){

  $this->load->database();
  $query =  $this->db->query("
  update Tipo_Queja
    set idTipo_Queja= '".$id."',
       FechaModificacion= STR_TO_DATE('".$fechamodifi."', '%d-%m-%Y %H:%i:%s'),
       Estados_idEstados= '".$estado."',
       Descripcion = '".$desc."'
       where idTipo_Queja ='".$id."'
  ");
}

public function idqueja(){



  $this->load->database();

  $query = $this->db->query("

  SELECT MAX(idTipo_Queja) + 1  AS id FROM Tipo_Queja;

    ");

  return $query->result();

}

public function siglas(){



  $this->load->database();

  $query = $this->db->query("

  SELECT * FROM Tipo_Queja WHERE idTipo_Queja = (SELECT MAX(idTipo_Queja) from Tipo_Queja);

    ");

  return $query->result();

}
public function descripcion(){



  $this->load->database();

  $query = $this->db->query("

  SELECT * FROM Tipo_Queja WHERE idTipo_Queja = (SELECT MAX(idTipo_Queja) from Tipo_Queja);

    ");

  return $query->result();

}






}


 ?>
