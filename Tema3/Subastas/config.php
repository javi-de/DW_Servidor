<?php
    //datos Host, Usuario y contraseña, nombre de la DB
    define("DB_HOST","localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "subastas");

    //nombre del foro
    define("FORUM_TITLE", "SubastasDW2.com");

    //ruta del ejercicio
    define("BASE_ROUTE", "http://" . $_SERVER['SERVER_NAME']."/DW_Servidor/Tema3/Subastas/");

    //moneda local
    define("CURRENCY", "€");

    //directorio de imágenes
    define("DIR_IMAGES", BASE_ROUTE."images/");

    //zona horaria de España
    date_default_timezone_set('Europe/Madrid');
?>
