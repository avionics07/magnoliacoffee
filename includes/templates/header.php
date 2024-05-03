<?php

if(!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnolia Coffee</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<header class="header">
        <div class="contenido-header">

            <div class="barra">

                <a href="/index.php">
                    <img class="logo" src="/build/img/logo.JPG" alt="Logotivo Magnolia Coffee">
                </a>

                <div class="mobile-menu">
                    <img src="/build/icons/heroicons-solid--menu.svg" alt="icono menu responsive">
                </div>

                <nav class="navegacion-header">
                    <a href="/">Home</a>
                    <a href="blog.php">Blog</a>
                    <a href="/contacto.php">Contacto</a>
                    <a href="/mostrarCarrito.php">Carrito(<?php 
                    
                    echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                    
                    ?>)</a>
                    <a href="/login.php">Login</a>
                    <?php if($auth): ?>
                        
                        <a href="/logout.php">Cerrar Sesion</a>

                        <?php endif ?>

                        <?php if($auth): ?>
                        
                        <a href="/admin/index.php">Admin</a>

                        <?php endif ?>
                </nav>

            </div> <!--.barra-->
        </div>
</header>