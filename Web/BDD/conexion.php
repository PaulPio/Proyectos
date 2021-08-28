<?php //Programa paara probar la conexion con la base de datos
$link = 'mysql:host=localhost;dbname=yt_colores'; //Link de la base de datis
$user = 'root';
$password = 'root';

try{
    $pdo = new PDO($link, $user, $password);//Objeto de base de datos
    // echo 'Conectado';
    //Ciclo for para leer los datos de la base de datos
    // foreach($pdo->query('SELECT * from colores') as $fila) {
    //     print_r($fila);
    // }
}
catch(PDOException $e){//Mensaje de error
    print "Error!: " .$e->getMessage() . "<br/>";
    die();//Fin de programa
}
?>