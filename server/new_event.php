<?php
session_start();
$response = array();
$arreglo = array();

$conexion = new mysqli('localhost', 'root', '', 'Prueba');
if ($conexion->connect_error){
  echo "Error".$conexion->connect_error;
}else {

$id = '"'.$_SESSION['id'].'"'; //id del usuario

$titulo = '"'.$_POST ['titulo'].'"';
$start_date = '"'.$_POST ['start_date'].'"';
$start_hour = '"'.$_POST ['start_hour'].'"';
$end_date = '"'.$_POST ['end_date'].'"';
$end_hour= '"'.$_POST ['end_hour'].'"';
$allDay = '"'.$_POST ['allDay'].'"';

//insertar
$consulta = "INSERT INTO eventos (Titulo, Fecha_Inicio, Hora_Inicio, Fecha_Fin, Hora_Fin, Dia_Completo, FK_Usuario) VALUES
($titulo, $start_date, $start_hour, $end_date, $end_hour, $allDay, $id)";

if ($resultado = $conexion->query($consulta)) {
//echo "Se insertaron correctamente los Usuarios";

$response['msg'] = 'OK';


}

}
echo json_encode($response);
$conexion->close();

?>
