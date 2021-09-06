<?php
session_start();//Para iniicar sesion

if(isset($_SESSION['admin'])){
    echo 'Bienvenido '.$_SESSION['admin'];
    echo '<br><a href="cerrar.php">Cerrar sesion</a>';
}
else{
    header('location:index.php');
}