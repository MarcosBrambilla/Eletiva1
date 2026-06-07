<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $stmt
  = $pdo->prepare('SELECT f.*, s.nome AS setor FROM funcionario f
   INNER JOIN setor s ON s.id = f.setor_id
    WHERE f.id=?');
    $stmt->execute([$_GET['id']]);
    $resultado = $stmt->fetch();
} catch (Exception $e) {
    echo "Erro! " . $e->getMessage();
}
?>

<h1>Consultar Funcionário</h1>
    <form method="post"
        action="consultar_funcionario.php?id=<?= $resultado['id'] ?>">
        <fieldset>
            <legend>Dados do Funcionário</legend>
            <div class="form-group">
                <p><strong>Nome:</strong>
                    <?= $resultado['nome'] ?>
                </p>
            </div>
            <div class="form-group">
                <p><strong>Setor:</strong>
                    <?= $resultado['setor'] ?>
                </p>
            </div>
            <div style="margin-top: 10px;">
                <a href="excluir_funcionario.php?id=<?= $resultado['id'] ?>" class="btn">Excluir</a>
            </div>
        </fieldset>

<?php
require_once($raiz . 'includes/rodape.php');
?>
