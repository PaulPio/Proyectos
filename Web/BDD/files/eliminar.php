<?php
include_once 'conexion.php';
//Obtener la id en el url
$id = $_GET['id'];
//Sentencia para eliminar de la bdd
$sql_eliminar = 'DELETE from colores WHERE id=?';
//Preparar el sql
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
//Ejecutar el comando
$sentencia_eliminar->execute(array($id));
//Volver al index
header('location:index.php');
?>