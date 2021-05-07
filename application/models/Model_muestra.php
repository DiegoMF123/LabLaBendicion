<?php
class Model_Muestra extends CI_Model
{

  public function datosmuestra(){

    $this->load->database();
    $query = $this->db->query("
    select mu.idMuestra, mu.Presentacion, mu.Cantidad, tm.NombreMuestra, item.idItems, item.Nombreitem,item.Diasvencimiento, soli.Nosolicitud,
      um.Nombreum, mu.FechaCreacion,mu.FechaModificacion, mu.Nombre_archivo, soli.idSolicitud, exp.Nit
      from Muestra as mu inner join TipoMuestra tm inner join Umedida um inner join Solicitud soli
      inner join TipoSolicitante ts inner join Expediente exp inner join Items item
      where mu.TipoMuestra_idTipoMuestra = tm.idTipoMuestra and mu.Umedida_idUmedida = um.idUmedida
      and mu.Solicitud_idSolicitud = soli.idSolicitud and  mu.Solicitud_idSolicitud = soli.idSolicitud = ts.idTipoSolicitante = exp.idExpediente
      and mu.idItems = item.idItems;
      ");
    return $query->result();
  }

  public function datosmuestraporid($codigomuestra){

    $this->load->database();
    $query = $this->db->query("
    select mu.idMuestra, mu.Presentacion, mu.Cantidad, tm.NombreMuestra,
    um.Nombreum, mu.FechaCreacion, mu.Nombre_archivo, soli.idSolicitud, exp.Nit, exp.Correlativo
    from Muestra as mu inner join TipoMuestra tm inner join Umedida um inner join Solicitud soli inner join TipoSolicitante ts inner join Expediente exp
    where mu.TipoMuestra_idTipoMuestra = tm.idTipoMuestra and mu.Umedida_idUmedida = um.idUmedida
    and mu.Solicitud_idSolicitud = soli.idSolicitud and  mu.Solicitud_idSolicitud = soli.idSolicitud = ts.idTipoSolicitante = exp.idExpediente and mu.idMuestra = '".$codigomuestra."';


      ");
    return $query->result();
  }

  public function datamuestraid($idMuestra){

    $this->load->database();
    $query = $this->db->query("
    select mu.idMuestra, mu.Presentacion, mu.Cantidad, tm.NombreMuestra,
      um.Nombreum, mu.FechaCreacion, mu.Nombre_archivo, soli.idSolicitud, exp.Nit, exp.Correlativo, tsp.Abreviatura, ts.Abreviaturats
      from Muestra as mu inner join TipoMuestra tm inner join Umedida um inner join Solicitud soli
      inner join TipoSolicitante ts inner join Expediente exp inner join TipoSoporte tsp
      where mu.TipoMuestra_idTipoMuestra = tm.idTipoMuestra and mu.Umedida_idUmedida = um.idUmedida
      and mu.Solicitud_idSolicitud = soli.idSolicitud
      and  mu.Solicitud_idSolicitud = soli.idSolicitud = ts.idTipoSolicitante = exp.idExpediente
      and mu.Solicitud_idSolicitud = soli.idSolicitud = ts.idTipoSolicitante = tsp.idTipoSoporte and mu.idMuestra = '".$idMuestra."';


      ");
    return $query->result();
  }


    public function muestradatos(){
      $this->load->database();
      $query = $this->db->query("
      select mu.idMuestra, mu.Presentacion, mu.Cantidad, tm.NombreMuestra,
      um.Nombreum, mu.FechaCreacion, mu.Nombre_archivo, soli.idSolicitud, exp.Nit, exp.Correlativo
      from Muestra as mu inner join TipoMuestra tm inner join Umedida um inner join Solicitud soli inner join TipoSolicitante ts inner join Expediente exp
      where mu.TipoMuestra_idTipoMuestra = tm.idTipoMuestra and mu.Umedida_idUmedida = um.idUmedida
      and mu.Solicitud_idSolicitud = soli.idSolicitud and  mu.Solicitud_idSolicitud = soli.idSolicitud = ts.idTipoSolicitante = exp.idExpediente;

        ");
      return $query->result();


    }


    public function ultimamuestra(){



    $this->load->database();

    $query = $this->db->query("

      SELECT * FROM Muestra WHERE idMuestra = (SELECT MAX(idMuestra) from Muestra);

      ");

    return $query->result();

  }

  public function tipomuestra(){

    $this->load->database();
    $query = $this->db->query("
    Select * from TipoMuestra

      ");
    return $query->result();
  }

  public function umedida(){

    $this->load->database();
    $query = $this->db->query("
    Select * from Umedida

      ");
    return $query->result();
  }

  public function guardar($tipodemuestra,$presentacion,$cantunid,$unidadmed,$fecha,$nombre,$tamanio,$tipo,$id){
      $this->load->database();
      $query=$this->db->query("
        insert into Muestra (
        Presentacion,
        Cantidad,
        TipoMuestra_idTipoMuestra,
        Umedida_idUmedida,
        Nombre_archivo,
        FechaCreacion,
        tamanio,
        tipo,
        Solicitud_idSolicitud,
        idItems
        )values(
        '".$presentacion."',
        '".$cantunid."',
        '".$tipodemuestra."',
        '".$unidadmed."',
        '".$nombre."',
        STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
        '".$tamanio."',
        '".$tipo."',
        '".$id."',
        5
      );

      ");

  }

  public function mostrare($id){
    $this->load->database();
    $query = $this->db->query("
    select idMuestra,Nombre_archivo
    from Muestra
    where idMuestra='".$id."'
      ");

    return $query->result();

  }


  public function delete($id){
        $this->load->database();
        $query = $this->db->query("
        delete from Muestra
        where idMuestra ='".$id."'
        ");
      //  return $query->result();
    }


  public function busquedafiltro($numerosolicitud){
    $this->load->database();
    $query=$this->db->query("
    select mu.idMuestra, mu.Presentacion, mu.Cantidad, tm.NombreMuestra, item.idItems, item.Nombreitem,item.Diasvencimiento, soli.Nosolicitud,
      um.Nombreum, mu.FechaCreacion,mu.FechaModificacion, mu.Nombre_archivo, soli.idSolicitud, exp.Nit
      from Muestra as mu inner join TipoMuestra tm inner join Umedida um inner join Solicitud soli
      inner join TipoSolicitante ts inner join Expediente exp inner join Items item
      where mu.TipoMuestra_idTipoMuestra = tm.idTipoMuestra and mu.Umedida_idUmedida = um.idUmedida
      and mu.Solicitud_idSolicitud = soli.idSolicitud and  mu.Solicitud_idSolicitud = soli.idSolicitud = ts.idTipoSolicitante = exp.idExpediente
      and mu.idItems = item.idItems and mu.Solicitud_idSolicitud = '".$numerosolicitud."';
    ");
    return $query->result();
  }

  public function busquedafiltroporitem($noitem){
    $this->load->database();
    $query=$this->db->query("
    select mu.idMuestra, mu.Presentacion, mu.Cantidad, tm.NombreMuestra, item.idItems, item.Nombreitem,item.Diasvencimiento, soli.Nosolicitud,
        um.Nombreum, mu.FechaCreacion,mu.FechaModificacion, mu.Nombre_archivo, soli.idSolicitud, exp.Nit
        from Muestra as mu inner join TipoMuestra tm inner join Umedida um inner join Solicitud soli
        inner join TipoSolicitante ts inner join Expediente exp inner join Items item
        where mu.TipoMuestra_idTipoMuestra = tm.idTipoMuestra and mu.Umedida_idUmedida = um.idUmedida
        and mu.Solicitud_idSolicitud = soli.idSolicitud and  mu.Solicitud_idSolicitud = soli.idSolicitud = ts.idTipoSolicitante = exp.idExpediente
        and mu.idItems = item.idItems and mu.idItems = '".$noitem."';
    ");
    return $query->result();
  }


  public function items(){
    $this->load->database();
    $query = $this->db->query("
    SELECT * FROM Items LIMIT 0,4 ;
      ");

    return $query->result();

  }

// Asociar items
  public function asociaritems($codigomuestra,$items,$fechamodifi){
    $this->load->database();
    $query = $this->db->query("
    update Muestra
      set idMuestra='".$codigomuestra."',
         FechaModificacion = STR_TO_DATE('".$fechamodifi."', '%d-%m-%Y %H:%i:%s'),
         idItems= '".$items."'
         where idMuestra ='".$codigomuestra."'
      ");

  }

  public function deasociaritems($codigomuestra,$fechamodifi){
    $this->load->database();
    $query = $this->db->query("
    update Muestra
      set idMuestra='".$codigomuestra."',
         FechaModificacion = STR_TO_DATE('".$fechamodifi."', '%d-%m-%Y %H:%i:%s'),
         idItems= 5
         where idMuestra ='".$codigomuestra."'
      ");

  }









}


 ?>
