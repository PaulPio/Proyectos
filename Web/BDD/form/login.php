<?php
session_start();

include_once '../files/conexion.php';
//Tomar los datos del registro con un post
$usuario_login = $_POST['nombre_usuario'];
$contrasena_login = $_POST['contrasena'];

echo '<pre>';

function verificar_user($user,$pdo){//Para hacer el comando para leer 
    // los datos de la tabla en la columna nombres y verificar si el user existe
$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
//Para preparar la sentencia de comando
$sentencia=$pdo->prepare($sql);
//Para ejecutar el comadno
$sentencia->execute(array($user));
//Para tomar los datos de esa columna y compararlos con el nombre de usuario que introdujo el user
return $sentencia->fetch();
}

$resultado=verificar_user($usuario_login,$pdo);

if(!$resultado){
    echo 'El user no ha sido registrado';
    die();
}


//PAra verificicar si las contraseñas son las mismas a traves de la funcion password_verify
if(password_verify($contrasena_login, $resultado['contrasena'])){
//    Las contrasena son iguales
    $_SESSION['admin'] = $usuario_login;//Iniciar sesion
    header('location:restringido.php');

}else{
// Las contrasena no son iguales

}
