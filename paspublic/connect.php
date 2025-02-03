<?php
define('USER', "root");
define('PASSWD', "");
define('SERVER', "localhost");
define('BASE', "iia");

// pour oracle: $dsn="oci:dbname=//serveur:1521/base
// pour sqlite: $dsn="sqlite:/tmp/base.sqlite"
$dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
try {
    $pdo = new PDO($dsn, USER, PASSWD);
} catch (PDOException $e) {
    printf("Échec de la connexion : %s\n", $e->getMessage());
    exit();
}