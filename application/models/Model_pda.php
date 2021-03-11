<?php
class Model_pda extends CI_Model
{


  public function listado(){



    $this->load->database();

    $query = $this->db->query("
    Select pda.IDPuntos_De_Atencion, pda.Nombre_Punto, es.NombreEstado ,rg.region, pda.Correlativo from  Puntos_de_Atencion as pda inner join Region rg  inner join Estados es
where pda.Region_id = rg.idRegion and pda.Estados_idEstados = es.idEstados ORDER BY pda.IDPuntos_De_Atencion;


      ");

    return $query->result();

  }


  public function correlativopda(){



    $this->load->database();

    $query = $this->db->query("

    SELECT MAX(IDPuntos_De_Atencion) + 1  AS IDPuntos_De_Atencion FROM Puntos_de_Atencion;

      ");

    return $query->result();

  }

  public function codigo(){



    $this->load->database();

    $query = $this->db->query("

    SELECT MAX(IDPuntos_De_Atencion)  AS IDPuntos_De_Atencion FROM Puntos_de_Atencion;

      ");

    return $query->result();

  }

  public function nombreultimopda(){



    $this->load->database();

    $query = $this->db->query("

      SELECT * FROM Puntos_de_Atencion WHERE IDPuntos_De_Atencion = (SELECT MAX(IDPuntos_De_Atencion) from Puntos_de_Atencion);

      ");

    return $query->result();

  }


  public function nombre($valor){

      $this->load->database();

      $query=$this->db->query("

        select Nombre from Usuarios where Dpi = '".$valor."';

      ");

      return $query->result();

  }


  public function tipo_region(){

      $this->load->database();

      $query=$this->db->query("

        select * from Region;

      ");

      return $query->result();

  }

  public function puntosdactivos(){

      $this->load->database();

      $query=$this->db->query("

       select IDPuntos_De_Atencion, Nombre_Punto, Estados_idEstados  from Puntos_de_Atencion where Estados_idEstados = 1;

      ");

      return $query->result();

  }

  public function puntpdaac(){

      $this->load->database();

      $query=$this->db->query("

      Select pda.IDPuntos_De_Atencion, pda.Nombre_Punto, es.NombreEstado ,rg.region, pda.Correlativo from  Puntos_de_Atencion as pda inner join Region rg  inner join Estados es
where pda.Region_id = rg.idRegion and pda.Estados_idEstados = es.idEstados and pda.Region_id = 1 and pda.Estados_idEstados = 1;

      ");

      return $query->result();

  }

  public function pdasr($id){

      $this->load->database();

      $query=$this->db->query("

      select Nombre_Punto from Puntos_de_Atencion where Region_id = '".$id."';

      ");

      return $query->result();

  }

  public function tipo_cargo(){

      $this->load->database();

      $query=$this->db->query("

        select * from Cargos;

      ");

      return $query->result();

  }

  public function pda(){

      $this->load->database();

      $query=$this->db->query("

        select  pda.IDPuntos_De_Atencion, pda.Nombre_Punto
         from Puntos_de_Atencion as pda inner join Region rg where pda.Region_id = rg.idRegion and rg.idRegion and pda.Estados_idEstados =1;

      ");

      return $query->result();

  }

  public function pdanuevo($id){

      $this->load->database();

      $query=$this->db->query("

      select pda.IDPuntos_De_Atencion, pda.Nombre_Punto
from Puntos_de_Atencion as pda inner join Region rg where pda.Region_id = rg.idRegion and rg.idRegion = '".$id."' and pda.Estados_idEstados =1;

      ");

      return $query->result();

  }



  public function estado(){

      $this->load->database();

      $query=$this->db->query("

      SELECT idEstados, NombreEstado FROM Estados LIMIT 2;


      ");

      return $query->result();

  }



  public function guardar($nombrepda, $tipo, $fecha,$rs){

    $this->load->database();

    $query = $this->db->query("

    insert into Puntos_de_Atencion(
     Nombre_Punto,
     Region_id,
      Estados_idEstados,
      FechaIngreso,
      Correlativo
     )values(
       '".$nombrepda."',
       '".$tipo."',
       '1',
       STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
       '".$rs."'
       )

    ");

  }

  public function update($idpda,$nombrepda,$estado,$fechamodi){

  $this->load->database();
  $query =  $this->db->query("
  update Puntos_de_Atencion
    set IDPuntos_De_Atencion='".$idpda."',
       Nombre_Punto= '".$nombrepda."',
       Estados_idEstados= '".$estado."',
       FechaModificacion = STR_TO_DATE('".$fechamodi."', '%d-%m-%Y %H:%i:%s')
       where IDPuntos_De_Atencion ='".$idpda."'
  ");
}


  public function selectindi($id){

  $this->load->database();

  $query = $this->db->query("


 Select pda.IDPuntos_De_Atencion, pda.Nombre_Punto, es.NombreEstado ,rg.region from  Puntos_de_Atencion as pda inner join Region rg  inner join Estados es
where pda.Region_id = rg.idRegion and pda.Estados_idEstados = es.idEstados and pda.IDPuntos_De_Atencion = '".$id."';

  ");

  return $query->result();



}

public function buscar($codigo){
  $this->load->database();
  $query = $this->db->query("


      Select pda.IDPuntos_De_Atencion, pda.Nombre_Punto, es.NombreEstado ,rg.region, pda.Correlativo from  Puntos_de_Atencion as pda inner join Region rg  inner join Estados es
  where pda.Region_id = rg.idRegion and pda.Estados_idEstados = es.idEstados and pda.Region_id = '".$codigo."';





    ");
  return $query->result();

}





}








 ?>
