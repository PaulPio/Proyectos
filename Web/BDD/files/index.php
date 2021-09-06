<?php
include_once "conexion.php";//Usar el otro archivo
include '../form/login.php';
$sql_leer = 'SELECT * FROM colores';//Para seleccionar los datos de la bdd

$gsent = $pdo->prepare($sql_leer);//Para guardar los datos de la bdd
$gsent->execute();

$resultado = $gsent->fetchAll();//Para devolver un array con los datos de la bdd

// Agregar elementos
if($_POST){//Para que corra cuando se llame al metodo post
    $color = $_POST['color'];//Se toma los datos del input
    $descripcion = $_POST['descripcion'];//Se toma los datos del input
    //Se inserta el comando que agregara los nuevos datos a la bdd
    $sql_agregar = 'INSERT INTO colores (color,descripcion) VALUES (?,?)';
    //Se preparan los datos
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    //SE agregan los datos a la bdd
    $sentencia_agregar->execute(array($color,$descripcion));

    //Cerramos la sesion
    $sentencia_agregar = null;
    $pdo = null;
    //Volvemos al archivo
    header('location:index.php');
}

if($_GET){
    $id = $_GET['id'];//Para obtener el id necesario para saber que se va a cambiar
    $sql_unico = 'SELECT * FROM colores WHERE id=?';//Para seleccionar los datos de la bdd

    $gsent_unico = $pdo->prepare($sql_unico);//Para guardar los datos de la bdd
    $gsent_unico->execute(array($id));//Para ejecutar el cambio

    $resultado_unico = $gsent_unico->fetch();//Para devolver un array con los datos de la bdd

}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Database practice con bootstrap</title>
  </head>
  <body>
      <div class="container mt-5">
          <div class="row">
                <div class="col-md-6">
                    <!-- Ciclo for each diseñado para mostrar los datos en la bdd. Los : al final de la sentencia del ciclo son para que vaya corriendo el ciclo dato por dato -->
                    <?php foreach($resultado as $dato):
                        ?>

                    <div class="alert alert-<?php echo $dato['color'] ?> text-uppercase" role="alert">
                        <?php echo $dato['color'] //Para leer los colores del array?>
                        - <?php echo $dato['descripcion'] //Para leer las descripciones de los colores del array?>
                        <a id="trash" onclick="return confirm('¿Desea confirmar la operacion?')" href="eliminar.php?id=<?php echo $dato['id']?>" class = "float-end">
                            <i class="fas fa-trash"></i>
                        </a>
                        <a href="index.php?id=<?php echo $dato['id']?>" class = "me-3 float-end">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>

                    <?php endforeach?>
                </div>
                <div class="col-md-6">
                    <?php if(!$_GET):?>
                        <h2>Agregar elementos</h2>
                        <form method="POST">
                        <input type="text" class = "form-control" name="color">
                        <input type="text" class = "form-control mt-3" name="descripcion">
                        <button class = "btn btn-primary mt-3">Agregar</button>
                    </form>
                    <?php endif?>
                    <!-- Editar elementos -->
                    <?php if($_GET):?>
                        <h2>Editar elementos</h2>
                        <form method="GET" action="editar.php">
                            <!-- Para llevar los datos del elemento seleccionado a los input, asi como tambien llevar el id al get -->
                        <input value="<?php echo $resultado_unico['color']?>" type="text" class = "form-control" name="color">
                        <input value="<?php echo $resultado_unico['descripcion']?>"type="text" class = "form-control mt-3" name="descripcion">
                        <input value="<?php echo $resultado_unico['id']?>"type="text" class = "d-none" name="id">
                        
                        <button class = "btn btn-primary mt-3">Agregar</button>
                    </form>
                    <?php endif?>
                </div>
          </div>
        
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
<?php
    //Cerramos la sesion
    $sentencia_agregar = null;
    $pdo = null;
?>
