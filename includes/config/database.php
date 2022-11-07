<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost','root', '','bienesraices_crud');
    $db->set_charset('utf8');   
    if(!$db) {
        echo "Error en la conexión";
        exit;
    }

    return $db;


}
