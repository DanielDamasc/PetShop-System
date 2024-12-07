<?php

$host = "localhost";
$db = "pet";
$user = "root";
$pass = "";

try {

    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

} catch (PDOException $e) {
    /* Erro na conexão */
    $error = $e->getMessage();
    echo "Erro: $error";
}

?>