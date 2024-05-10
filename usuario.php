<?php

//IMPORTAR CONEXION



require 'admin/database.php';

$db = conectarDB();
// CREAR EMAIL Y PASSWORD DE USUARIO

$usuarios = [
    ['email' => 'admin@admin.com', 'password' => '12345', 'rol' => 'admin'],
    ['email' => 'usuario@usuario.com', 'password' => '12345', 'rol' => 'usuario'],

];

foreach ($usuarios as $user) {
    $email = $user['email'];
    $password = $user['password'];
    $rol = $user['rol'];


    $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

    //QUERY PARA CREAR EL USUARIO

    $query = "INSERT INTO usuarios (email, password, rol) VALUES('${email}', '${passwordHashed}' , '${rol}');";

    $resultado = mysqli_query($db, $query);
    //echo $query;

    if ($resultado) {
        echo "Usuario " . $rol . " creado exitosamente con el email: " . $email . "<br>";
    } else {
        echo "Error al crear usuario " . $rol . ": " . mysqli_error($db) . "<br>";
    }
}
