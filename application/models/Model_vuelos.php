<?php
class Model_Vuelos extends CI_Model
{

    public function buscarPorCodigoVuelo($codigoVuelo)
    {
        $this->load->database();
        $query = $this->db->query("

        select * from VuelosPendientes where CodigoVuelo = '" . $codigoVuelo . "'
        
        ");
        return $query->result();
    }

    public function vuelos()
    {
        $this->load->database();
        $query = $this->db->query("

        select * from VuelosPendientes
        
        ");
        return $query->result();
    }
}
?>