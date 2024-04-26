<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnolia Coffee</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<?php
    include './includes/templates/header.php';
?>

<body>

    <div class="main-banner">
        <h1>Sabor que conecta mundos</h1>
    </div>


    <main class="img-index">

        <div class="banner-img">

            <img src="/build/img/top-view-coffee-with-copy-space.jpg" alt="">

        </div>


<?php
    include './includes/templates/navBar.php';
?>

        <div class="main-banner-blog">
            
        <h1>Más Sobre Nosotros</h1>

        </div>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/images/icon-park-outline--pure-natural.svg" alt="Icono Natural" loading="lazy">
                <h3>Natural</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur iste, ratione optio perspiciatis voluptates similique eius officia eaque consequuntur quae ad id neque velit error porro deserunt sed aperiam qui!</p>
            </div>
            
            <div class="icono">
                <img src="/images/material-symbols--speed.svg" alt="Icono tiempo" loading="lazy">
                <h3>Rapidos</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur iste, ratione optio perspiciatis voluptates similique eius officia eaque consequuntur quae ad id neque velit error porro deserunt sed aperiam qui!</p>
            </div>

            <div class="icono">
                <img src="/images/solar--tag-price-bold.svg" alt="Icono Precio" loading="lazy">
                <h3>Económicos</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur iste, ratione optio perspiciatis voluptates similique eius officia eaque consequuntur quae ad id neque velit error porro deserunt sed aperiam qui!</p>
            </div>

        </div>
    
        <div class="banner-img blog">




        </div>
        
    <section class="imagen-contacto">
        <h2>Contactanos</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, minima quibusdam odit earum excepturi, qui quam vero necessitatibus nostrum itaque nihil molestiae alias! Libero maiores voluptas dolorem commodi dolore laboriosam.</p>
        <a href="contacto.php" class="boton boton-verde-block"> Formulario contacto </a>
    </section>


    </main>

<?php

include './includes/templates/footer.php';

?>


    <script src="/build/js/bundle.min.js"></script>
</body>

</html>