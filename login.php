<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnolia Coffee</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

</html>

<body>

    <?php

    require 'admin/database.php';

    $db = conectarDB();

    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {



        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);


        if (!$email) {
            $errores[] = "El email es obligatorio o no es valido";
        }
        if (!$password) {
            $errores[] = "El password es obligatorio";
        }


        if (empty($errores)) {
            //Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);


            if ($resultado->num_rows > 0) {

                $usuario = mysqli_fetch_assoc($resultado);


                //Verifica si el password es correcto

                $auth = password_verify($password, $usuario['password']);


                if ($auth) {
                    // usuario verificado
                    session_start();
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;


                    header('Location: /admin/index.php');
                } else {
                    $errores[] = "El password es incorrecto";
                }
            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }





    //INCLIR HEADER
    include './includes/templates/header.php';
    ?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Login</h1>

        <?php
        foreach ($errores as $error) : ?>

            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" action="" novalidate>

            <fieldset>
                <legend>Email y Password</legend>



                <label for="email">E-Mail</label>
                <input type="email" name="email" placeholder="Tu E-Mail" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password">

                <input type="submit" value="Iniciar Sesion" class="boton boton-verde">

            </fieldset>



        </form>


    </main>



</body>

</html>