<?php
session_start();
$response = array();
  $arreglo = array();

$conexion = new mysqli('localhost', 'root', '', 'Prueba');

if ($conexion->connect_error){
  echo "Error".$conexion->connect_error;
}else {

$id = $_SESSION['id'];  //id del usuario
//consultar
$consulta = "SELECT * FROM eventos WHERE FK_Usuario = ".$id;

if ($resultado = $conexion->query($consulta)) {
  /* obtener un array asociativo */
    while ($fila = $resultado->fetch_assoc()) {

          $dato['id'] = $fila['Id_Eventos'];  //id del evento
          $dato['title'] = $fila['Titulo'];
          $dato['start'] = $fila['Fecha_Inicio'];
          $dato['hora_ini'] = $fila['Hora_Inicio'];
          $dato['end'] = $fila['Fecha_Fin'];
          $dato['hora_fin'] = $fila['Hora_Fin'];
          $dato['dia_com'] = $fila['Dia_Completo'];

          array_push($arreglo, $dato);
    }
$response['eventos']= $arreglo;
$response['msg'] = 'OK';
//echo "Se llamaron correctamente los Usuarios";
$response['acceso'] ="Se llamaron correctamente los Usuarios";
}

}
echo json_encode($response);
$conexion->close();

?>
