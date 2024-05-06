<?php

$mensaje = "";

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {
        case 'Agregar':

            if (is_numeric(openssl_decrypt($_POST['idproducto'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['idproducto'], COD, KEY);
                $mensaje = "OK ID correcto" . $ID;
            } else {
                $mensaje = "ID incorrecto" . $ID;
            }

            if (is_string(openssl_decrypt($_POST['nombre_producto'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre_producto'], COD, KEY);
            } else {
                $mensaje = "NOMBRE incorrecto";
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
            } else {
                $mensaje = "PRECIO incorrecto";
                break;
            }

            if (!isset($_SESSION['CARRITO'])) {
                $articulo = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO
                );
                $_SESSION['CARRITO'][0] = $articulo;
            } else {
                $numeroArticulos = count($_SESSION['CARRITO']);
                $articulo = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO
                );
                $_SESSION['CARRITO'][$numeroArticulos] = $articulo;
            }

            $mensaje = print_r($_SESSION, true);

            break;
            case "Eliminar":
                $idProducto = openssl_decrypt($_POST['idproducto'], COD, KEY);
                if(is_numeric($idProducto)){
                    $ID = $idProducto;
                    $carritoActualizado = array();


                    foreach($_SESSION['CARRITO'] as $indice => $articulo){
                        if($articulo['ID'] != $ID){
                            $carritoActualizado[] = $articulo;
                        }
                    }

                    $_SESSION['CARRITO'] = $carritoActualizado;

                    echo '<script>alert ("Articulo eliminado")</script>';
                } else {
                    $mensaje = "ID incorrecto";
                    echo '<script>alert ("Articulo eliminado")</script>';
                }

            break;
    }
}
