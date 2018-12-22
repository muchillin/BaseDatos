<?php
session_start();
$response = array();
$arreglo = array();

$conexion = new mysqli('localhost', 'root', '', 'Prueba');
if ($conexion->connect_error){
  echo "Error".$conexion->connect_error;
}else {

$id_usuario = '"'.$_SESSION['id'].'"';
//$id_evento = '"'.$_POST['Id_Eventos'].'"';
//$dato['id'] = $fila['Id_Eventos'];
$id_evento = '"'.$_POST['id'].'"';


$consulta="DELETE FROM eventos WHERE Id_Eventos =".$id_evento." AND FK_Usuario =".$id_usuario;


if ($resultado = $conexion->query($consulta)) {
  $response['msg'] = 'OK';
}

}
echo json_encode($response);
$conexion->close();

 ?>
