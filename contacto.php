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

        <form class="formulario">
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
                <input type="date" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="19:00">

            </fieldset>

            <input class="boton-verde" type="submit" value="Enviar">
        </form>
    </main>


    <?php

    include './includes/templates/footer.php';

    ?>

    <script src="/build/js/bundle.min.js"></script>
</body>

</html>