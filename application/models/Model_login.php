<?php
class Model_Login extends CI_Model
{

  public function login($user,$pass){

    $this->load->database();
    $query = $this->db->query("
        select Dpi, Usuario, Password, Nombre, idTipo_Usuariofk from Usuarios
        where Usuario ='".$user."'
        and Password='".$pass."'
      ");
    return $query->result();

  }

  public function id(){

    $this->load->database();
    $query = $this->db->query("
        SELECT MAX(idDetalleQueja) AS id FROM Detalle_De_Queja;
      ");
    return $query->result();

  }

}


 ?>
