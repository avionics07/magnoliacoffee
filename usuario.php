<?php

//IMPORTAR CONEXION



require 'admin/database.php';

$db = conectarDB();
// CREAR EMAIL Y PASSWORD DE USUARIO

$email = "correo@correo.com";
$password = "12345";

$passwordHashed = password_hash($password, PASSWORD_BCRYPT);



//QUERY PARA CREAR EL USUARIO

$query = "INSERT INTO usuarios (email, password) VALUES('${email}', '${passwordHashed}')";

//echo $query;


mysqli_query($db, $query);
//AGREGARLO A LA BASE DE DATOS



?>