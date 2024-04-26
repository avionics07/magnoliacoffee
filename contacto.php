<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnolia Coffee</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body class="body-admin">

<header class="header">
        <div class="contenido-header">

            <div class="barra">

                <a href="/">
                    <img class="" src="" alt="Logotivo Magnolia Coffee">
                </a>

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

    <main class="contenedor">
        <h1>Contacto</h1>
        <picture>
            <source srcset="/images/blog2.webp" type="image/webp">
            <source srcset="/images/blog2.webp" type="image/jpeg">
            <img class="imagen-contacto" loading="lazy" src="/images/blog2.webp" alt="Imagen Contacto">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form  class="formulario">
            <fieldset>
            

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">E-Mail</label>
                <input type="email" placeholder="Tu E-Mail" id="email">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Telefono" id="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                

                <p>Como desea ser contactado</p>
                
                <div class="forma-contacto">

                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    
                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>En caso de seleccionar ser contactado telefonicamente, elija la fecha y la hora a la que desea que le llamen</p>

                <label for="fecha">Fecha</label>
                <input type="date"  id="fecha">

                <label for="hora">Hora</label>
                <input type="time"  id="hora" min="09:00" max="19:00">

            </fieldset>

            <input class="boton-verde"  type="submit" value="Enviar">
        </form> 
    </main>


<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>



        <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
</footer>

<script src="/build/js/bundle.min.js"></script>
</body>
</html>
