<?php
    include_once '../files/conexion.php';

//Toamr datos del post
$usuario_nuevo = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

//Para hacer el comando para leer los datos de la tabla en la columna nombres y verificar si el user existe
$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
//Para preparar la sentencia de comando
$sentencia=$pdo->prepare($sql);
//Para ejecutar el comadno
$sentencia->execute(array($usuario_nuevo));
//Para tomar los datos de esa columna y compararlos con el nombre de usuario que introdujo el user
$resultado = $sentencia->fetch();

var_dump($resultado);

if( $resultado){
    echo 'Existe el user';
    die();
}
//Hash de contraseña
$contrasena =  password_hash($contrasena, PASSWORD_DEFAULT); 

if(password_verify($contrasena2, $contrasena)){
    echo "Contrasena valida!!<br>";

    //Se inserta el comando que agregara los nuevos datos a la bdd
    $sql_agregar = 'INSERT INTO usuarios (nombre,contrasena) VALUES (?,?)';
    //Se preparan los datos
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    //SE agregan los datos a la bdd y se usa una condicional para saber si se agrego o no
    if($sentencia_agregar->execute(array($usuario_nuevo,$contrasena))){
        echo 'Agregado<br>';
    }else{
        echo 'No Agregado<br>';
    }
    //Cerramos la sesion
    $sentencia_agregar = null;
    $pdo = null;
    //Volvemos al archivo
    // header('location:index.php');
}else{
    echo "Contrasena no valida!!";
}
