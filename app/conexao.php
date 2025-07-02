<?php

ini_set('upload_max_filesize', '5M');
ini_set('post_max_size',       '8M');

try {
    $pdo = new PDO("pgsql:host=db;dbname=publicidades", "embras", "wildfire");
    //echo "Conexão com PostgreSQL bem‑sucedida!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>