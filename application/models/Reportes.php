<?php
class Reportes extends CI_Model
{


  public function reportegeneral(){

    $this->load->database();
    $query = $this->db->query("

    select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
   tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,
   exp.Direccion, exp.Nombre, tiposop.Nombrets
   from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
   inner join Expediente exp inner join TipoSoporte tiposop
  where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
  and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
  and soli.Nosolicitud = exp.Correlativo and sc.TipoSoporte_idTipoSoporte = tiposop.idTipoSoporte order by soli.idSolicitud asc;

      ");
    return $query->result();

  }

  public function reporteporsolicitud($id){

    $this->load->database();
    $query = $this->db->query("

    select soli.idSolicitud, soli.Nosolicitud, soli.Descripcion, soli.Fechacreacion, est.Nombrestado, tsd.Abreviatura,
   tsd.NombreTipo, ts.Abreviaturats, ts.Tiposolicitante, sc.NumeroSoporte, sc.Telefono, sc.Correo, exp.Nit, exp.Correlativo,
   exp.Direccion, exp.Nombre, tiposop.Nombrets
   from Solicitud as soli inner join TipoSolicitud tsd inner join TipoSolicitante ts inner join SoporteContacto sc inner join Estados est
   inner join Expediente exp inner join TipoSoporte tiposop
  where soli.idTipoSolicitud = tsd.idTipoSolicitud and soli.idTipoSolicitante = ts.idTipoSolicitante
  and soli.idSolicitud = sc.Solicitud_idSolicitud and soli.Estados_idEstados = est.idEstados
  and soli.Nosolicitud = exp.Correlativo and sc.TipoSoporte_idTipoSoporte = tiposop.idTipoSoporte and soli.idSolicitud = '".$id."' order by soli.idSolicitud asc;

      ");
    return $query->result();

  }

  public function reportegeneralmuestras(){

    $this->load->database();
    $query = $this->db->query("

    select mu.idMuestra, mu.Presentacion, mu.Cantidad, tm.NombreMuestra, item.Diasvencimiento, item.Nombreitem, soli.Nosolicitud,
um.Nombreum, mu.FechaCreacion,mu.FechaModificacion, mu.Nombre_archivo, soli.idSolicitud, exp.Nit, exp.Nombre
from Muestra as mu inner join TipoMuestra tm inner join Umedida um inner join Solicitud soli
inner join TipoSolicitante ts inner join Expediente exp inner join Items item
where mu.TipoMuestra_idTipoMuestra = tm.idTipoMuestra and mu.Umedida_idUmedida = um.idUmedida
and mu.Solicitud_idSolicitud = soli.idSolicitud and  mu.Solicitud_idSolicitud = soli.idSolicitud = ts.idTipoSolicitante = exp.idExpediente
and mu.idItems = item.idItems order by mu.idMuestra asc;


      ");
    return $query->result();

  }

  public function reportepormuestra($id){

    $this->load->database();
    $query = $this->db->query("

    select mu.idMuestra, mu.Presentacion, mu.Cantidad, tm.NombreMuestra, item.Diasvencimiento, item.Nombreitem, soli.Nosolicitud,
um.Nombreum, mu.FechaCreacion,mu.FechaModificacion, mu.Nombre_archivo, soli.idSolicitud, exp.Nit, exp.Nombre
from Muestra as mu inner join TipoMuestra tm inner join Umedida um inner join Solicitud soli
inner join TipoSolicitante ts inner join Expediente exp inner join Items item
where mu.TipoMuestra_idTipoMuestra = tm.idTipoMuestra and mu.Umedida_idUmedida = um.idUmedida
and mu.Solicitud_idSolicitud = soli.idSolicitud and  mu.Solicitud_idSolicitud = soli.idSolicitud = ts.idTipoSolicitante = exp.idExpediente
and mu.idItems = item.idItems and mu.idMuestra = '".$id."' order by mu.idMuestra asc;


      ");
    return $query->result();

  }


}


 ?>
