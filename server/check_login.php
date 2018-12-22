<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'Prueba');

if ($conexion->connect_error){
  echo "Error".$conexion->connect_error;
}else {
  //comprobar login
  try {
    $user= $_POST ['username'];
    $password= $_POST ['password'];
    //$user= "gaspar@mail.com";
    //$password= "123";

    $sql = "SELECT * FROM usuarios WHERE Usuario = ?";
    $resultado = $conexion->prepare($sql);
    $resultado-> bind_param("s",$user);
    $resultado->execute();

    $row = $resultado->get_result();


  if ($row->num_rows >0){
    while ($fila = $row->fetch_assoc()){
      if (password_verify($password,$fila['Contrasenia'])){
        $response['msg'] = 'OK';
        $_SESSION['id'] = $fila['Id_Usuario']; //id del usuario
      }else {
        $response['msg'] = 'No es la clave..';
      }
  }
  }else {
    $response['msg'] = "Usuario no esta registrado..";
  }


  } catch (\Exception $e) {
    alert ($e);
  }
}
echo json_encode($response);
$conexion->close();




 ?>
