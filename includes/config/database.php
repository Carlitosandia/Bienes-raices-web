<?php

function conectarDb() : mysqli{
    $db = mysqli_connect('localhost', 'root','CaJaRe2018?','bienesraices_crud');

    if (!$db){
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;

};
