<?php
session_start();
//Esta pagina es solo para probar si ya inicio sesion el user, en caso de no haber iniciado sesion, 
// entonces el user no entra y es redirigido a la pagina de registro.php

if(isset($_SESSION['admin'])){
    echo 'Bienvenido '.$_SESSION['admin'];
    echo '<br><a href="cerrar.php">Cerrar sesion</a>';
}
else{
    header('location:registro.php');
}