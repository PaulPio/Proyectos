<?php
session_start();//Para iniicar sesion

$login = 'Paul';
$_SESSION['admin'] = $login;//Para guardar el admin

if(isset($_SESSION['admin'])){
    header('location:index.php');
}

 