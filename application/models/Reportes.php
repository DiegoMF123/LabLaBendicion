<?php
class Reportes extends CI_Model
{


  public function reporte($id){

    $this->load->database();
    $query = $this->db->query("

    Select * from VuelosPendientes where IdVuelosPendientes =  '". $id ."'

      ");
    return $query->result();

  }




}


 ?>
