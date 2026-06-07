<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $stmt = $pdo->prepare('SELECT * FROM setor WHERE id=?');
    $stmt->execute([$_GET['id']]);
    $resultado = $stmt->fetch();
} catch (Exception $e) {
    echo "Erro! " . $e->getMessage();
}
?>

<h1>Consultar Setor</h1>
    <form method="post"
        action="consultar_setor.php?id=<?= $resultado['id'] ?>">
        <fieldset>
            <legend>Dados do Setor</legend>
            <div class="form-group">
                <p><strong>Nome:</strong>
                    <?= $resultado['nome'] ?>
                </p>
            </div>
            <div style="margin-top: 10px;">
                <a href="excluir_setor.php?id=<?= $resultado['id'] ?>" class="btn">Excluir</a>
            </div>
        </fieldset>

<?php
    require_once($raiz . 'includes/rodape.php');
?>
