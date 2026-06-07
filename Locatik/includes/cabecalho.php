<?php

session_start();
$raiz ??= '';
if (!isset($_SESSION['acesso']) || $_SESSION['acesso'] == false) {
    header('Location: ' . $raiz . 'index.php');
    exit();
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Locatik - Controle de Empréstimo de Equipamentos</title>
<link href="<?= $raiz ?>css/style.css" rel="stylesheet">
</head>
<body>

<div id="wrapper">
    <div id="header">
        <h1>Locatik</h1>
        <small>Controle de Empréstimo de Equipamentos</small>
    </div>

    <div id="nav">
        <ul>
            <li><a href="<?= $raiz ?>principal.php">Início</a></li>
            <li class="dropdown">
                <a href="#">Cadastros</a>
                <div class="dropdown-content">
                    <a href="<?= $raiz ?>setores/setores.php">Setores</a>
                    <a href="<?= $raiz ?>funcionarios/funcionarios.php">Funcionários</a>
                    <a href="<?= $raiz ?>equipamentos/equipamentos.php">Equipamentos</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#">Movimentação</a>
                <div class="dropdown-content">
                    <a href="<?= $raiz ?>emprestimos/emprestimos.php">Empréstimos</a>
                </div>
            </li>
            <li><a href="<?= $raiz ?>logout.php">Sair</a></li>
        </ul>
    </div>

    <div id="content">
