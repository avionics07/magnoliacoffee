<?php


include '../includes/templates/header.php';
?>

<?php
include '../includes/templates/navBar.php';
?>

<body>
    <section class="molido">

        <h2>Cafe Molido</h2>

        <?php

        // IMPORTAR LA CONEXION
        require '/xampp2/htdocs/magnoliacoffee/admin/database.php';
        $db = conectarDB();
        // CONSULTAR BD
        $limite = 6;
        $query = "SELECT * FROM productos WHERE categorias_idcategorias='2' LIMIT ${limite} ";



        // OBTENER RESULTADO

        $resultado = mysqli_query($db, $query);


        // ENCRIPTAR INFORMACION DEL CARRITO
        define("KEY", "magnoliacoffe");
        define("COD", "AES-128-ECB");

        //INCLUIR CARRITO
        include '../tienda/carrito.php';

        ?>

        <?php 
            if($mensaje =! ""){ ?> 
                <div class="alert alert-success">
                <?php echo $mensaje; ?>
                    <a href="/mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
        </div>

        <?php } ?>



        <div class="contenedor-articulos">


            <?php while ($articulo = mysqli_fetch_assoc($resultado)) :       ?>
                <div class="articulo">




                    <div class="contenido-articulo">
                        <img class="imagen-articulo" loading="lazy" src="/imagenesProductos/<?= $articulo['imagen'] ?>" alt="imagen articulo">
                        <h3><?php echo $articulo['nombre_producto'] ?></h3>
                        <p><?php echo $articulo['descripcion'] ?></p>
                        <p class="precio"><?php echo $articulo['precio'] . '€' ?></p>
                        </p>

                        <form action="" method="POST">
                            <input type="hidden" name="idproducto" id="idproducto" value="<?php echo openssl_encrypt($articulo['idproducto'], COD, KEY) ?>">
                            <input type="hidden" name="nombre_producto" id="nombre_producto" value="<?php echo openssl_encrypt($articulo['nombre_producto'], COD, KEY) ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($articulo['precio'], COD, KEY) ?>">
                            <input type="hidden" name="descripcion" id="descripcion" value="<?php echo openssl_encrypt($articulo['descripcion'], COD, KEY) ?>">
                            <button class="boton boton-verde" 
                            name="btnAccion" 
                            type="submit" 
                            value="Agregar">Añadir al carrito</button>

                        </form>

                    </div> <!--.contenido-articulo-->

                </div> <!--.articulo-->

            <?php endwhile; ?>

        </div> <!--.contenedor-articulos-->

        <?php
        // CERRAR LA CONEXION

        mysqli_close($db);


        ?>

    </section>

    <?php
    include '../includes/templates/footer.php';
    ?>

    <script src="/build/js/bundle.min.js"></script>

</body>

</html>