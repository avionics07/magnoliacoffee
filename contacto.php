<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    
                </a>

                <div class="mobile-menu">
                    
                </div>

                <div class="derecha">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>

            </div> <!--cierre de la barra-->

        
        </div>
    </header>

    <main class="contenedor">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpeg" type="image/jpeg">
            <img loading="lazy" src="/build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form  class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

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
                <legend>Información Sobre la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select name="" id="opciones"> 

                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="compra">Comprar</option>
                    <option value="vende">Vender</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

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
