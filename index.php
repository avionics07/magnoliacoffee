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

                <a href="/">
                    <img class="" src="" alt="Logotivo Magnolia Coffee">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/line-md--close-to-menu-alt-transition (1).svg" alt="icono menu responsive">
                </div>

                <nav class="navegacion-header">
                    <a href="/">Home</a>
                    <a href="nosotros.php">Nosotros</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <a href="carrito.html">Carrito</a>
                </nav>

            </div> <!--.barra-->
        </div>
</header>

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


<footer class="footer seccion">

        <div class="contenedor contenedor-footer">
                <nav class="navegacion-footer">
                    <a href="contacto.php">Contacto</a>
                    <a href="">Instagram</a>
                    <a href="">Twitter</a>
                    <a href="">Facebook</a>
                </nav>
        </div>

        <form  class="contenedor formulario-newsletter">
        
                <label for="nombre">Subscribete y recibe todas nuestas ofertas</label>
                <input type="email" placeholder="Tu Email" id="email">
                <input class="boton-verde"  type="submit" value="Enviar">
        
        </form>
        <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
</footer>

    <script src="/build/js/bundle.min.js"></script>
</body>

</html>