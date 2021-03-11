<?php

class Model_Userpda extends CI_Model
{


  public function userpda(){

    $this->load->database();
    $query = $this->db->query("
    select usu.idUsuarios_pda, usu.Correo, us.Nombre, us.Dpi, cg.Nombre_Cargo, pda.Nombre_Punto, est.NombreEstado, tp.Tipo
         from Usuarios_Por_Pda as usu inner join Usuarios us inner join Cargos cg inner join Puntos_de_Atencion pda inner join Estados est inner join  Tipo_Usuario tp
         where usu.Usuarios_Dpi = us.Dpi and usu.Cargos_idCargos = cg.idCargos and usu.IDPuntos_De_Atencionfk = pda.IDPuntos_De_Atencion and usu.Estados_idEstados = est.idEstados
         and usu.IDPuntos_De_Atencionfk = pda.IDPuntos_De_Atencion and usu.Usuarios_Dpi = us.Dpi = tp.idTipo_Usuario;
      ");
    return $query->result();


  }

  public function puntodeatencionbuscar(){

    $this->load->database($idregion);
    $query = $this->db->query("
    Select pda.IDPuntos_De_Atencion, pda.Nombre_Punto, rg.region from  Puntos_de_Atencion as pda inner join Region rg
  on pda.Region_id = rg.idRegion and pda.Region_id = '".$idregion."';

      ");
    return $query->result();


  }



  public function selectindi($id){

  $this->load->database();

  $query = $this->db->query("


  select usu.idUsuarios_pda, usu.Correo, us.Nombre, us.Dpi, cg.Nombre_Cargo, pda.Nombre_Punto, rg.region, est.NombreEstado, tp.Tipo
       from Usuarios_Por_Pda as usu inner join Usuarios us inner join Cargos cg inner join Puntos_de_Atencion pda inner join Estados est inner join Region rg inner join  Tipo_Usuario tp
       where usu.Usuarios_Dpi = us.Dpi and usu.Cargos_idCargos = cg.idCargos and usu.IDPuntos_De_Atencionfk = pda.IDPuntos_De_Atencion and usu.Estados_idEstados = est.idEstados
       and usu.IDPuntos_De_Atencionfk = pda.IDPuntos_De_Atencion = rg.idRegion and usu.Usuarios_Dpi = us.Dpi = tp.idTipo_Usuario and usu.idUsuarios_pda ='".$id."';

  ");

  return $query->result();



}


public function buscar($codigo){
  $this->load->database();
  $query = $this->db->query("

  select usu.idUsuarios_pda, usu.Correo, us.Nombre, us.Dpi, cg.Nombre_Cargo, pda.Nombre_Punto, rg.region, est.NombreEstado, tp.Tipo
from Usuarios_Por_Pda as usu inner join Usuarios us inner join Cargos cg inner join Puntos_de_Atencion pda inner join Estados est inner join Region rg inner join  Tipo_Usuario tp
where usu.Usuarios_Dpi = us.Dpi and usu.Cargos_idCargos = cg.idCargos and usu.IDPuntos_De_Atencionfk = pda.IDPuntos_De_Atencion and usu.Estados_idEstados = est.idEstados
and usu.IDPuntos_De_Atencionfk = pda.IDPuntos_De_Atencion = rg.idRegion and usu.Usuarios_Dpi = us.Dpi = tp.idTipo_Usuario and usu.IDPuntos_De_Atencionfk = '".$codigo."'

    ");
  return $query->result();

}


public function guardar($pda,$dpi,$correo,$cargo,$fecha){

  $this->load->database();

  $query = $this->db->query("

  insert into Usuarios_Por_Pda(
   Correo,
   FechaCreacion,
   IDPuntos_De_Atencionfk,
    Cargos_idCargos,
    Estados_idEstados,
    Usuarios_Dpi
   )values(
     '".$correo."',
     STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
     '".$pda."',
     '".$cargo."',
     '1',
     '".$dpi."'
     )

  ");

}


public function update($id,$correo,$cargo,$estado,$fechamodi){

$this->load->database();
$query =  $this->db->query("
update Usuarios_Por_Pda
  set Correo= '".$correo."',
     Cargos_idCargos = '".$cargo."',
     Estados_idEstados= '".$estado."',
     FechaModificacion = STR_TO_DATE('".$fechamodi."', '%d-%m-%Y %H:%i:%s')
     where idUsuarios_pda ='".$id."'
");
}



}




 ?>
