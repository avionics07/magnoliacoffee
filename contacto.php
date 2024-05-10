<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnolia Coffee</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body class="body-admin">

    <?php
    include './includes/templates/header.php';
    ?>

    <main class="contenedor">
        <h1>Contacto</h1>
        <picture>
            <source srcset="/build/img/contacto.jpg" type="image/jpeg">
            <img class="imagen-contacto" loading="lazy" src="/build/img/contacto.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Llene el formulario de Contacto</h2>
        <div class="contacto__form formulario">

            <div class="form-message success">
                <span>Mensaje enviado correctamente</span>
            </div>
            <div class="form-message error">
                <span>Rellene los campos correctamenter</span>
            </div>
            <form action="https://formspree.io/f/myyrdpgp" method="POST" id="formulario">
                <fieldset>

                <div class="form-group">
                    <label for="nombre" >Nombre</label>
                    <input type="text" name="nombre" placeholder="Tu Nombre" id="nombre">
                </div>

                <div class="form-group">
                    <label for="email" >E-Mail</label>
                    <input type="email" name="email" placeholder="Tu E-Mail" id="email">
                </div>
                
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" placeholder="Telefono" id="telefono">
                </div>

                <div class="form-group">

                    <label for="mensaje" >Mensaje:</label>
                    <textarea name="mensaje" id="mensaje"></textarea>

                </div>

                </fieldset>
            <a class="boton-verde" type="submit" value="Enviar" id="submit-button">
                Enviar
            </a>
            </form>
        </div>


    </main>


    <?php

    include './includes/templates/footer.php';

    ?>
    
    <!-- <script src="/build/js/bundle.min.js"></script> -->
    <script type="text/javascript" src="/src/js/app.js"></script>
</body>

</html>