<?php
class Model_User extends CI_Model
{

    public function mostrardpi(){
      $this->load->database();
      $query = $this->db->query("
      select Dpi, Nombre
  from Usuarios
        ");
      return $query->result();


    }


  public function user(){

    $this->load->database();
    $query = $this->db->query("
    select usu.Dpi, usu.Usuario, usu.Password, usu.Nombre, tp.Tipo
from Usuarios as usu inner join Tipo_Usuario tp where idTipo_Usuariofk = tp.idTipo_Usuario;
      ");
    return $query->result();

  }

  public function selectid($id){

  $this->load->database();

  $query = $this->db->query("

  select usu.Dpi, usu.Usuario, usu.Password, usu.Nombre, tp.Tipo
from Usuarios as usu inner join Tipo_Usuario tp where idTipo_Usuariofk = tp.idTipo_Usuario and usu.Dpi ='".$id."';





  ");

  return $query->result();



}



  public function tipo_rol(){

      $this->load->database();

      $query=$this->db->query("

        select * from Tipo_Usuario;

      ");

      return $query->result();

  }



public function guardar($dpi,$nombre,$tipo,$usuario,$password,$fecha){

  $this->load->database();

  $query = $this->db->query("

  insert into Usuarios(
   Dpi,
   Usuario,
   Password,
   FechaCreacion,
   Nombre,
   idTipo_Usuariofk
   )values(
     '".$dpi."',
     '".$usuario."',
     '".$password."',
     STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
     '".$nombre."',
     '".$tipo."'
     )

  ");

}


public function update($dpi,$nombre,$tipo,$usuario,$password,$fechamodi){

$this->load->database();
$query =  $this->db->query("
update Usuarios
  set Dpi='".$dpi."',
     Usuario= '".$usuario."',
     Password= '".$password."',
     FechaModificacion = STR_TO_DATE('".$fechamodi."', '%d-%m-%Y %H:%i:%s'),
     Nombre = '".$nombre."',
     idTipo_Usuariofk = '".$tipo."'
     where Dpi ='".$dpi."'

");

}




}



 ?>
