<?php
//Para que cualquiera pueda acceder
header("Access-Control-Allow-Origin: *");
// Cabecera para que su contenido sea considerado como un objeto JSON 
header('Content-Type: application/json');


// $_GET permite obtener el string de la url
if($_GET['moneda']=='euro' || $_GET['moneda']=='dolar' || $_GET['moneda']=='bss'){
    include_once 'conexion.php';
    // Sentencia sql
    $sql = 'SELECT * FROM '.$_GET['moneda'];
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();
    $datos = $sentencia->fetchAll();//Tomar todos los datos de la bdd
    
}else{
    echo 'Solicitud no encontrada';
}
echo json_encode($datos);//Convertir los datos de la bdd a json
?>


