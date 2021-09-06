<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Registro de usuarios</h3>
    <!-- Formulario de user y password -->
    <form action="agregar_usuario.php" method="post">
        <input type="text" name="nombre_usuario" placeholder="Ingresa usuario">
        <input type="text" name="contrasena" placeholder="Ingresa contrasena">
        <input type="text" name="contrasena2" placeholder="Ingresa nuevamente la contrasena">
        <button type="submit">Guardar</button>
    </form>
<!-- Login de usuarios -->
    <h3>Login</h3>
    <form action="login.php" method="post">
        <input type="text" name="nombre_usuario" placeholder="Ingresa usuario">
        <input type="text" name="contrasena" placeholder="Ingresa contrasena">
        
        <button type="submit">Guardar</button>
    </form>
</body>
</html>