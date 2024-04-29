<?php

session_start();

$auth = $_SESSION['login'];
if(!$auth){
    header('Location: /index.php');
}

require '../database.php';

$db = conectarDB();



//Array con mensajes de errores




//Obtener categorias y proveedores para usar en el formulario
$sqlCategorias = "SELECT idcategoria, nombre_categoria FROM categorias ORDER BY nombre_categoria ASC";
$resultadoCategorias = mysqli_query($db, $sqlCategorias);
$categorias = mysqli_fetch_all($resultadoCategorias, MYSQLI_ASSOC);

$sqlProveedores = "SELECT idproveedor, nombre_proveedor FROM proveedores ORDER BY nombre_proveedor ASC";
$resultadoProveedores = mysqli_query($db, $sqlProveedores);
$proveedores = mysqli_fetch_all($resultadoProveedores, MYSQLI_ASSOC);



$errores = [];

$nombre_producto='';
$descripcion='';
$stock_disponible='';
$precio='';


//EJECUTAR CONSULTA
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";



    $nombre_producto = mysqli_real_escape_string($db, $_POST['nombre_producto']);
    $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']); 
    $stock_disponible = mysqli_real_escape_string($db ,$_POST['stock_disponible']); 
    $categorias_idcategorias = mysqli_real_escape_string($db ,$_POST['categorias_idcategorias']);
    $proveedores_idproveedor = mysqli_real_escape_string($db ,$_POST['proveedores_idproveedor']);


    //Asignar Files hacia una variable

    $imagen = $_FILES['imagen'];

    


;

    if(!$nombre_producto) {
        $errores[] = "Debes añadir el nombre del articulo";
    }

    if(strlen($descripcion) < 30) {
        $errores[] = "Debes añadir una descripción de minimo 50 caractertes";
    }

    if(!$stock_disponible) {
        $errores[] = "Falta el Stock disponible";
    }

    if(!$precio) {
        $errores[] = "El precio es obligatorio";
    }


    if(!$imagen['name']) {
        $errores[] = "Debes añadir la imagen del articulo";
    }

    // Validar por tamaño de la imagen

    $medida = 1000*1000;
    if($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada";
    }

    // Revisar que el arreglo de errores este vacio y ejecutar consulta si lo esta

    if (empty($errores)) {

        // Crear carpeta para subir imagenes
        $carpetaImagenes = '../../imagenesProductos';

        if(!is_dir($carpetaImagenes)) {  
            mkdir($carpetaImagenes);
        }

        $nombreImagen = md5( uniqid( rand(), true ) ).".jpg";


        //Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen);
    

        $sql = "INSERT INTO productos (nombre_producto, descripcion, precio, imagen, stock_disponible, categorias_idcategorias, proveedores_idproveedor)

        VALUES ('$nombre_producto', '$descripcion', '$precio', '$nombreImagen', '$stock_disponible', '$categorias_idcategorias', '$proveedores_idproveedor')";
    
        $resultado = mysqli_query($db, $sql);
    
        if ($resultado) {
            header('Location: /admin?resultado=1');
        }
    }
     

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnolia Coffee</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>


<body class="body-admin">
    <main class="contenedor seccion-admin">
        <div class="banner">
            <h1 class="banner-form">Actualizar Articulos</h1>
        </div>
        
        <br>


        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        

        <form class="formulario" method="POST" action="/admin/productos/insertar.php" enctype="multipart/form-data">
        <a href="/admin/index.php" class="boton boton-rojo">Volver</a>
            <fieldset>

                <legend>Descripcion producto</legend>

                <label for="proveedor">Proveedor:</label>
                <select name="proveedores_idproveedor" id="proveedor">
            
                    <?php foreach ($proveedores as $proveedor) : ?>
                        <option value="<?= $proveedor['idproveedor'] ?>"><?= $proveedor['nombre_proveedor'] ?></option>
                    <?php endforeach ?>

                </select>

                <label for="nombre_producto">Nombre:</label>
                <input type="text" id="nombre_producto" name="nombre_producto" placeholder="Marca producto">

                <br>

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion"></textarea>

                <br>

                <label for="categoria">Categoria:</label>
                <select name="categorias_idcategorias" id="categoria">
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['idcategoria'] ?>"><?= $categoria['nombre_categoria'] ?></option>
                    <?php endforeach ?>
                </select>


                <br>

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Producto">

                <br>

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <br>

                <label for="stock_disponible">Stock Disponible</label>
                <input type="number" id="stock_disponible" name="stock_disponible" placeholder="Ej:3" min="1">

            </fieldset>



            <input type="submit" value="Enviar" class="boton boton-verde">
            <input type="submit" value="Cancelar" class="boton boton-rojo">



        </form>

    </main>
</body>

</html>