<?php
//Programa para recibir datos a traves del metodo get, este metodo recupera los datos de la url de la pagina

//Para guardar los datos que se van a agregar a la bdd-----------------
$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];
//-----------------------------------

//Llamar al otro archivo
include_once 'conexion.php';
//Sentencia de comando para editar la tabla
$sql_editar = 'UPDATE colores SET color=?,descripcion=? WHERE id=?';
//Preparar el sql
$sentencia_editar = $pdo->prepare($sql_editar);
//Ejecutar el cambio
$sentencia_editar->execute(array($color,$descripcion,$id));
//Para volvel al index
header('location:index.php');