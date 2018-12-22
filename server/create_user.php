<?php
//conexion
$conexion = new mysqli('localhost', 'root', '', 'Prueba');
if ($conexion->connect_error){
  echo "Error".$conexion->connect_error;
}else {

//insertar
$insert = $conexion->prepare('INSERT INTO usuarios (Id_Usuario, Nombre, Apellido, Fecha_Nac, Usuario, Contrasenia) VALUES (?,?,?,?,?,?)');
$insert->bind_param("issdss", $Id, $Nombre, $Apellido, $Fecha_Nac, $Usuario, $Pass_cifrado);

$Id="1";
$Nombre="Melchor";
$Apellido="Oro";
$Fecha_Nac="12/04/1901";
$Usuario="melchor@mail.com";
$Pass_cifrado = password_hash("123",PASSWORD_DEFAULT);

$insert->execute();

$Id="2";
$Nombre="Gaspar";
$Apellido="Incienso";
$Fecha_Nac="12/04/1901";
$Usuario="gaspar@mail.com";
$Pass_cifrado = password_hash("123",PASSWORD_DEFAULT);

$insert->execute();

$Id="3";
$Nombre="Baltazr";
$Apellido="Mirra";
$Fecha_Nac="12/04/1901";
$Usuario="baltazar@mail.com";
$Pass_cifrado = password_hash("123",PASSWORD_DEFAULT);

$insert->execute();

echo "Se insertaron correctamente los Usuarios";
}

$conexion->close();
 ?>
