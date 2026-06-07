<?php
$raiz = '';
require_once($raiz . 'includes/cabecalho.php');
?>

    <h2>Seja bem vindo <?= $_SESSION['nome'] ?></h2>
    <p>Sistema de Controle de Empréstimo de Equipamentos.</p>

<?php
    require_once($raiz . 'includes/rodape.php');
