<?php
class Model_Login extends CI_Model
{

  public function login($user,$pass){

    $this->load->database();
    $query = $this->db->query("
        select Nombre, Usuario, Password, TipoUsuario_idTipoUsuario from Usuarios
        where Usuario ='".$user."'
        and Password='".$pass."'
      ");
    return $query->result();

  }



}


 ?>
