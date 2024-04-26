<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnolia Coffee</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<?php
    session_start();

    require '../admin/database.php';
    $db = conectarDB();
    $query = "SELECT * FROM productos";
    $resultado = mysqli_query($db, $query);


    include '../includes/templates/header.php';

?>

<main class="contenedor">
    <h1>Administrador Magnolia Coffee</h1>
    
    <a href="../admin/productos/insertar.php" class="boton boton-verde">Insertar Productos</a>
    <a href="/admin/productos/borrar.php" class="boton boton-rojo">Borrar Productos</a>
    <a href="/index.php" class="boton boton-verde">Volver</a>
</main>


<?php
    include '../includes/templates/footer.php';

?>