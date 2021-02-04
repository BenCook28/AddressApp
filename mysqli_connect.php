<?php
    DEFINE ('DB_USER', 'BENTHOMASCOOK28@GMAIL.COM');
    DEFINE('DB_PASSWORD', 'T*9C6c48I&O**f96k9');
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_NAME', 'test3');

    $dbc = @mysqliconnect(DB_HOST, DB_PASSWORD, DB_HOST, DB_NAME)
    OR die('Coud not connect to MySQL ' . mysqli_connect_error());
?>