<?php
try {

    $access = new pdo("mysql:host=localhost;dbname=ecollab;charset=utf8", "root", "");

    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}
catch (PDOException $e) {

    echo 'Échec lors de la connexion : ' . $e->getMessage();

}
    


?>