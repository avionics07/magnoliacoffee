<?php

include './includes/templates/header.php';


$auth = $_SESSION['login'];
if (!$auth) {
    header('Location: /login.php');
}

?>

<body class="body-admin">


    <br>

    <h3>Lista del Carrito</h3>
    <picture>
        <source srcset="/build/img/carrito.jpg" type="image/jpeg">
        <img class="imagen-contacto" loading="lazy" src="/build/img/carrito.jpg" alt="Imagen Carrito" style="width: 60rem">

    </picture>
    <?php
    // ENCRIPTAR INFORMACION DEL CARRITO

    define("KEY", "magnoliacoffe");
    define("COD", "AES-128-ECB");

    include './tienda/carrito.php';




    if (!empty($_SESSION['CARRITO'])) { ?>

        <div class="alert alert-success alerta exito" role="alert">

            <?php echo ($mensaje) ?>


        </div>

        <table class="contenedor">
            <tbody>
                <tr>
                    <th width="40px" class="text-center">Descripcion</th>
                    <th width="20px" class="text-center">Precio</th>
                    <th width="20px" class="text-center">Total</th>
                    <th width="5px"></th>
                </tr>
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['CARRITO'] as $indice => $articulo) { ?>
                    <tr>
                        <td width="40px" class="text-center" width="200px"><?php echo $articulo['NOMBRE'] ?></td>
                        <td width="15px" class="text-center"><?php echo $articulo['PRECIO'] ?>€ </td>
                        <td width="20px" class="text-center"></td>
                        <td width="20px" class="text-center">--</th>
                        <td width="5px">

                            <form action="" method="POST">
                                <input type="hidden" name="idproducto" id="idproducto" value="<?php echo openssl_encrypt($articulo['ID'], COD, KEY) ?>">

                                <button class="boton boton-rojo" type="submit" name="btnAccion" value="Eliminar">Eliminar
                                </button>

                            </form>
                        </td>


                    </tr>
                    <?php $total = $total + $articulo['PRECIO']; ?>
                <?php } ?>
                <tr>
                    <td colspan="3" align="right">
                        <h3>Total</h3>
                    </td>
                    <td align="right">
                        <h3> <?php echo number_format($total, 2); ?>€</h3>
                    </td>
                    <td></td>

                </tr>

                <tr>
                    <td colspan="5">
                        <form action="pagar.php" method="POST">

                            <div class="alert alert-success">
                                <div class="form-group">
                                    <label for="my-input">Correo de contacto:</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Su email" required>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">
                                    Los articulos se enviaran a este correo>
                                </small>

                            </div>

                            <button class="boton boton-verde" type="submit" value="proceder" name="btnAccion">
                                Proceda al pago ->
                            </button>

                        </form>




                    </td>
                </tr>

            </tbody>
        </table>

    <?php } else { ?>
        <div class="alert alerta error">
            <p class="contenedor" style="font-size: 3rem; text-align: center">No hay productos en el carrito</p>
        </div>
    <?php } ?>

</body>
<?php


include './includes/templates/footer.php';

?>