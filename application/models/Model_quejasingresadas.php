<?php
class Model_quejasingresadas extends CI_Model{

  public function listadoquejas($user){



    $this->load->database();

    $query = $this->db->query("
    select dq.idDetalleQueja, dq.Nombre, dq.Correo_Electronico, dq.Telefono, dq.Nombre_Empleado, dq.Detalle_queja, dq.Fecha,
  qj.Descripcion, mi.Nombre_Metodo, pda.Nombre_Punto, dq.Correlativo, est.NombreEstado, usu.Nombre, dq.nombre_archivo
  from Detalle_De_Queja as dq inner join Tipo_Queja qj inner join Metodo_Ingreso mi inner join Puntos_de_Atencion pda
  inner join Estados est inner join Usuarios usu where dq.idTipo_Queja = qj.idTipo_Queja and dq.idMetodo_Ingreso = mi.idMetodo_Ingreso and
  dq.IDPuntos_De_Atencionfk = pda.IDPuntos_De_Atencion and dq.Estados_idEstados = est.idEstados and dq.Usuarios_Dpi = usu.Dpi and dq.Usuarios_Dpi = '".$user."';


      ");

    return $query->result();

  }

  public function siglas(){



    $this->load->database();

    $query = $this->db->query("

    SELECT * FROM Detalle_De_Queja WHERE idDetalleQueja = (SELECT MAX(idDetalleQueja) from Detalle_De_Queja);

      ");

    return $query->result();

  }
  public function correlativo(){



    $this->load->database();

    $query = $this->db->query("

    SELECT MAX(idDetalleQueja) + 1  AS id FROM Detalle_De_Queja;

      ");

    return $query->result();

  }


  public function guardar($cbox1,$nombre,$correo,$telefono,$pda,$nombredos,$desc,$fecha,$user,$rs,$nombrearch){

    $this->load->database();

    $query = $this->db->query("

    insert into Detalle_De_Queja(
     Nombre,
	 Correo_Electronico,
	 Telefono,
	 Nombre_Empleado,
	 Detalle_queja,
      Fecha,
      idTipo_Queja,
      idMetodo_Ingreso,
      IDPuntos_De_Atencionfk,
      Correlativo,
      Estados_idEstados,
      Usuarios_Dpi,
      nombre_archivo,
      Ingreso_queja,
      Estado_externo
     )values(
       '".$nombre."',
       '".$correo."',
       '".$telefono."',
       '".$nombredos."',
       '".$desc."',
       STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
       '1',
       '".$cbox1."',
        '".$pda."',
       '".$rs."',
       '3',
      '".$user."',
      '".$nombrearch."',
      'Menu aplicación',
      'Presentada'
      )

    ");

  }

  public function guardarcuentaha($nombre,$correo,$telefono,$pda,$nombredos,$desc,$fecha,$user,$rs,$nombrearch){

    $this->load->database();

    $query = $this->db->query("

    insert into Detalle_De_Queja(
     Nombre,
	 Correo_Electronico,
	 Telefono,
	 Nombre_Empleado,
	 Detalle_queja,
      Fecha,
      idTipo_Queja,
      idMetodo_Ingreso,
      IDPuntos_De_Atencionfk,
      Correlativo,
      Estados_idEstados,
      Usuarios_Dpi,
      nombre_archivo,
      Ingreso_queja,
      Estado_externo
     )values(
       '".$nombre."',
       '".$correo."',
       '".$telefono."',
       '".$nombredos."',
       '".$desc."',
       STR_TO_DATE('".$fecha."', '%d-%m-%Y %H:%i:%s'),
       '1',
       '6',
        '".$pda."',
       '".$rs."',
       '3',
      '".$user."',
      '".$nombrearch."',
      'Portal',
      'Presentada'
      )

    ");

  }

}



 ?>
