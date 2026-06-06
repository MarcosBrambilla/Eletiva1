<?php

$dominio = "mysql:host=127.0.0.1;dbname=locatik";
$usuario = "root";
$senha = "root123";

try {
    $pdo = new PDO($dominio, $usuario, $senha);
} catch (Exception $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
