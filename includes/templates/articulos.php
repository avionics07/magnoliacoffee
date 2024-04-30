
<?php

// IMPORTAR LA CONEXION
require '/xampp2/htdocs/magnoliacoffee/admin/database.php';
$db = conectarDB();
// CONSULTAR BD

$query = "SELECT * FROM productos LIMIT ${limite}";

// OBTENER RESULTADO

$resultado = mysqli_query($db, $query);


?>





<div class="contenedor-articulos">
    <?php while ($articulo = mysqli_fetch_assoc($resultado)):       ?>
    <div class="articulo">
        
        
    

        <div class="contenido-articulo">
            <img loading="lazy" src="/imagenesProductos/<?= $articulo['imagen'] ?>" alt="incapto cafe">
            <h3><?php echo $articulo['nombre_producto'] ?></h3>
            <p><?php echo $articulo['descripcion'] ?></p>
            <p class="precio"><?php echo $articulo['precio'] . '€' ?></p>
            </p>
            <a class="boton boton-verde" href="carrito.php" class="btn">Comprar</a>
        </div> <!--.contenido-articulo-->
        
    </div> <!--.articulo-->

 <?php endwhile; ?>

</div> <!--.contenedor-articulos-->

<?php
// CERRAR LA CONEXION

mysqli_close($db);


?>