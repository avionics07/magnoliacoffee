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
                    <a href="carrito.html">Carrito</a>
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