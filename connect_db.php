<?php
    define('SERVERNAME', 'localhost');
    define('DB_LOGIN', 'user');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'new_db');
    $mysql = new mysqli(SERVERNAME, DB_LOGIN, DB_PASSWORD, DB_NAME);
?>