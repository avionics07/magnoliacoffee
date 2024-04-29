<?php
session_start();

$auth = $_SESSION['login'];
if (!$auth) {
    header('Location: /index.php');
}

// CONECTAR A LA BASE DE DATOS
require '../admin/database.php';
$db = conectarDB();

// DESDE INSERTAR PRODUCTO
$accionResultado = $_GET['resultado'] ?? null;


//----------

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        //ELIMINAR ARCHIVO DE LA IMAGEN
         $query= "SELECT imagen FROM productos WHERE idproducto = ${id}";

         $resultado = mysqli_query($db, $query);
         $propiedad = mysqli_fetch_assoc($resultado);

         unlink('../imagenesProductos/' . $propiedad['imagen']);

        //ELIMINAR EL PRODUCTO
        $query = "DELETE FROM productos WHERE idproducto = ${id}";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {    
            header('Location: /admin?resultado=3');
        }
    }
}


// ESCRIBIR EL QUERY
$query = "SELECT * FROM productos";
//CONSULTAR A LA BASE DE DATOS
$resultado = mysqli_query($db, $query);




include '../includes/templates/header.php';

?>

<main class="contenedor">
    <h1>Administrador Magnolia Coffee</h1>
    <?php if (intval($accionResultado) == 1) : ?>
        <p class="alerta exito">Producto insertado correctamente</p>
    <?php endif; ?>
    <?php if (intval($accionResultado) == 3) : ?>
        <p class="alerta exito">Producto eliminado correctamente</p>
    <?php endif; ?>

    <a href="../admin/productos/insertar.php" class="boton boton-verde">Insertar Productos</a>
    <a href="/index.php" class="boton boton-rojo">Volver</a>

    <table class="propiedades">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombre Producto</td>
                <td>Imagen</td>
                <td>Precio</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody> <!--- MOSTRAR LOS RESULTADOS DE LA CONSULTA A LA DB -->
            <?php while ($producto = mysqli_fetch_assoc($resultado)) : ?>
                <tr>
                    <td><?php echo $producto['idproducto']; ?> </td>
                    <td><?php echo $producto['nombre_producto']; ?> </td>
                    <td><img src="/imagenesProductos/<?php echo $producto['imagen']; ?> " class="imagen-tabla" alt="imagenProducto"></td>
                    <td><?php echo $producto['precio']; ?> €</td>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $producto['idproducto']; ?>">

                            <input type="submit" value="Borrar" class="boton boton-rojo">
                        </form>
                        <a href="/admin/productos/borrar.php?id=<?php echo $producto['idproducto']; ?>" class="boton boton-amarillo"></a>
                    </td>
                </tr>
            <?php endwhile; ?>

        </tbody>
    </table>

</main>


<?php

// cerrar la conexion

mysqli_close($db);


include '../includes/templates/footer.php';
