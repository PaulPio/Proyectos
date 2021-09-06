<?php
    // Llamar al archivo php que conecta con la base de datos
    include_once 'conexion.php';

    //Sentencia sql
    $sql = 'SELECT * FROM articulos';
    //Preparar setencia sql
    $sentencia = $pdo->prepare($sql);
    // Ejecutar sentencia sql
    $sentencia->execute();
    // Obtener todos los resultados de la bdd
    $resultado=$sentencia->fetchAll();

    $articulo_x_pagina = 3;//Todos los articulos que queremos por pagina 
    $total_arts = $sentencia->rowCount();//Para saber la cantidad de articulos que hay en la bdd
    $paginas = ceil($total_arts/$articulo_x_pagina); //Para saber el numero de paginas que hay que colocar en la paginacion
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container my-5">

    <h1 class="mb-5">Paginacion</h1>

    <?php
        // En caso de que no se encuentre ningun valor asociado al get
        if(!$_GET){
            header('location:index.php?pagina=1');
        }
        // En caso de que la variable asociada al get de pagina sea mayor o menor al numero de paginas establecidas
        if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
            header('location:index.php?pagina=1');  
        }

        $iniciar = ($_GET['pagina']-1)*$articulo_x_pagina;
        

        //Sentencia sql en la que solo se obtienen 3 articulos de la bdd usando el limit
        $sql_articulos = 'SELECT * FROM articulos LIMIT :inicar,:narticulos';
        //Preparar setencia sql
        $sentencia_arts = $pdo->prepare($sql_articulos);
        //Para hacer inserciones repetidas usando la funcion bin Param que funciona con un placehoder. una variable 
        // y un parametro opcional que le diga al php que la variable es un int
        $sentencia_arts->bindParam(':inicar', $iniciar, PDO::PARAM_INT);
        $sentencia_arts->bindParam(':narticulos', $articulo_x_pagina, PDO::PARAM_INT);        
        // Ejecutar sentencia sql
        $sentencia_arts->execute();
        // Obtener todos los resultados de la bdd
        $resultado_arts = $sentencia_arts->fetchAll();

?>

    <!-- Ciclo for en php para colocar la cantidad de articulos deseada -->
    <?php foreach($resultado_arts as $articulo): ?>
        <div class="alert alert-primary" role="alert">
        <?php echo $articulo['titulo'] //Para obtener los datos de la columna articulo de la bdd?>
        </div>  
    <?php endforeach?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : ''?>"><a class="page-link" href="index.php?pagina=<?php echo$_GET['pagina']-1?>">
            Previous
            </a>
            </li>
        <!-- Ciclo for para que solo esten disponibles el numero de paginas que se deseen -->
            <?php for($i=1; $i<=$paginas;$i++):?>
            <li class="page-item <?php echo $_GET['pagina']==$i ? 'active' : ''?>">
                <a class="page-link" href="index.php?pagina=<?php echo $i?>"> <?php echo $i?></a></li>
            
                <?php endfor ?>
            <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled' : ''?>"><a class="page-link" href="index.php?pagina=<?php echo$_GET['pagina']+1?>">Next</a></li>
        </ul>
    </nav>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
