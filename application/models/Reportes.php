<?php
class Reportes extends CI_Model
{


  public function reportegeneral(){

    $this->load->database();
    $query = $this->db->query("

    select soli.idSolicitud, soli.Nosolicitud, exp.Nit, soli.Descripcion, soli.Fechacreacion, soli.Fechacreacion, tsd.Abreviatura,
        tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte,tips.Nombrets, sc.Telefono, sc.Correo, est.Nombrestado, exp.Nombre, us.Nombre
        from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est inner join Expediente exp inner join Usuarios us inner join TipoSoporte tips
       where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
       and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados and soli.idTipoSolicitante = ts.idTipoSolicitante = exp.idExpediente and soli.Usuarios_idUsuarios = us.idUsuarios
       and soli.idTipoSolicitante =  ts.idTipoSolicitante = tips.idTipoSoporte;

      ");
    return $query->result();

  }


}


 ?>
