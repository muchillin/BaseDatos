<?php
session_start();
$response = array();
$arreglo = array();

$conexion = new mysqli('localhost', 'root', '', 'Prueba');
if ($conexion->connect_error){
  echo "Error".$conexion->connect_error;
}else {

$id_usuario = '"'.$_SESSION['id'].'"';
$id_evento = '"'.$_POST['id'].'"';


$start_date = '"'.$_POST ['start_date'].'"';
$start_hour = '"'.$_POST ['start_hour'].'"';
$end_date = '"'.$_POST ['end_date'].'"';
$end_hour= '"'.$_POST ['end_hour'].'"';

// print($start_date);
// print($start_hour);
// print($end_date);
// print($end_hour);
//update

$consulta = "UPDATE eventos SET Fecha_Inicio = $start_date  WHERE Id_Eventos = $id_evento";


if ($resultado = $conexion->query($consulta)) {
  $response['msg'] = 'OK';
}

}
echo json_encode($response);
$conexion->close();

 ?>
