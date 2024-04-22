<?php

function conectarDB() :mysqli{
    $db = mysqli_connect('localhost','root','febrero08','magnoliacoffe');
    $db->set_charset('utf8');

    if(!$db){
        echo "No conectado a la DB";
        exit;
    }
    return $db;
    
}

?>