<?php

require '../database.php';

$db=conectarDB();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nombre_producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock_disponible = $_POST['stock_disponible'];
    $categorias_idcategorias = $_POST['categorias_idcategorias'];
    $proveedor_idproveedor = $_POST['proveedor_idproveedor'];
    $sql = "INSERT INTO productos (nombre_producto, descripcion, precio, stock_disponible, categorias_idcategorias, proveedor_idproveedor)

    VALUES ('$nombre_producto', '$descripcion', '$precio', '$stock_disponible', '$categorias_idcategorias', '$proveedor_idproveedor')";

    $resultado = mysqli_query($db, $sql);
}

?>

<main class="contenedor">
<h1>Crear</h1>

<a href="/admin" class="boton boton-verde">Volver</a>


<form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php">
    <fieldset>
        <legend>Información General</legend>
        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" accept="image/jpeg, image/png">

        <label for="descripcion">Descripcion:</label>
        <textarea id="descripcion" name="descripcion"></textarea>
    </fieldset>

    <fieldset>
        <legend>Información de la propiedad</legend>

        <label for="habitaciones">Habitaciones:</label>
        <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej:3" min="1" max="9">

        <label for="wc">Baños:</label>
        <input type="number" id="wc" name="wc" placeholder="Ej:3" min="1" max="9">

        
        <label for="estacionamiento">Estacionamiento:</label>
        <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej:3" min="1" max="9">

    </fieldset>

    <fieldset>
        <legend>Vendedor</legend>

        <select name="vendedorId" id="">
            <option value="1">Juan</option>
            <option value="2">Julen</option>

        </select>
    </fieldset>

    <input type="submit" value="Crear Propiedad" class="boton boton-verde">



</form>

</main>
