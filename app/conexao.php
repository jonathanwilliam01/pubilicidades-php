<?php

try {
    $pdo = new PDO("pgsql:host=db;dbname=publicidades", "embras", "wildfire");
    //echo "Conexão com PostgreSQL bem‑sucedida!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}?>