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
        $query = "SELECT imagen FROM productos WHERE idproducto = ${id}";

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

function getCategoriaNombre($categoriaId)
{
    switch ($categoriaId) {
        case 1:
            return "Grano";
        case 2:
            return "Molido";
        case 3:
            return "Cafeteras";
        case 4:
            return "Accesorios";
        default:
            return "No Definido";
    }
}




include '../includes/templates/header.php';

?>

<body class="body-admin">


    <main class="contenedor">
        <h1>Administrador Magnolia Coffee</h1>
        <?php if (intval($accionResultado) == 1) : ?>
            <p class="alerta exito">Producto Insertado Correctamente</p>
            <br>
        <?php endif; ?>
        <?php if (intval($accionResultado) == 2) : ?>
            <p class="alerta exito">Producto Actualizado Correctamente</p>
            <br>
        <?php endif; ?>
        <?php if (intval($accionResultado) == 3) : ?>
            <p class="alerta exito">Producto Eliminado Correctamente</p>
            <br>
        <?php endif; ?>

        <a href="../admin/productos/insertar.php" class="boton boton-verde">Insertar Productos</a>
        <a href="/index.php" class="boton boton-rojo">Volver</a>

        <table class="propiedades">
            <thead style="text-align: center; border: 1px solid black; border-radius: 5px;">
                <tr>

                    <td>Nombre Producto</td>
                    <td>Categoria</td>
                    <td>Imagen</td>
                    <td>Precio</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody> <!--- MOSTRAR LOS RESULTADOS DE LA CONSULTA A LA DB -->
                <?php while ($producto = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>

                        <td><?php echo $producto['nombre_producto']; ?> </td>
                        <td><?php echo getCategoriaNombre($producto['categorias_idcategorias']) ?> </td>
                        <td><img src="/imagenesProductos/<?php echo $producto['imagen']; ?> " class="imagen-tabla" alt="imagenProducto"></td>
                        <td><?php echo $producto['precio']; ?> €</td>
                        <td>
                            <form method="POST" class="w-100">

                                <input type="hidden" name="id" value="<?php echo $producto['idproducto']; ?>">

                                <input type="submit" value="Borrar" class="boton boton-rojo">
                                <a href="/admin/productos/actualizar.php?id=<?php echo $producto['idproducto']; ?>" type="submit" value="Actualizar" class="boton boton-verde">Actualizar</a>

                                <a href="/admin/productos/borrar.php?id=<?php echo $producto['idproducto']; ?>" class="boton boton-amarillo"></a>
                            </form>

                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </main>
</body>

<?php

// cerrar la conexion

mysqli_close($db);


include '../includes/templates/footer.php';
