<?php //Programa paara probar la conexion con la base de datos
$link = 'mysql:host=localhost;dbname=paginacion'; //Link de la base de datis
$user = 'root';
$password = 'root';

try{
    $pdo = new PDO($link, $user, $password);//Objeto de base de datos
    // echo ' Conectado ';
    
}
catch(PDOException $e){//Mensaje de error
    print "Error!: " .$e->getMessage() . "<br/>";
    die();//Fin de programa
}
?>