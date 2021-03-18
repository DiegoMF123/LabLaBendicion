<?php
class Model_Solicitud extends CI_Model
{

  public function tiposolicitante(){

    $this->load->database();
    $query = $this->db->query("
    Select * from TipoSolicitante

      ");
    return $query->result();


  }



}



 ?>
