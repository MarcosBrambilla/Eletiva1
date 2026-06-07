<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $stmt
        = $pdo->prepare('SELECT * FROM equipamento WHERE id=?');
    $stmt->execute([$_GET['id']]);
    $resultado = $stmt->fetch();
} catch (Exception $e) {
    echo "Erro! " . $e->getMessage();
}
?>

<h1>Consultar Equipamento</h1>
    <form method="post"
        action="consultar_equipamento.php?id=<?= $resultado['id'] ?>">
        <fieldset>
            <legend>Dados do Equipamento</legend>
            <div class="form-group">
                  <p><strong>Descrição:</strong>
                     <?= $resultado['descricao'] ?>
                  </p>
            </div>
            <div class="form-group">
                  <p><strong>Patrimônio:</strong>
                     <?= $resultado['patrimonio'] ?>
                  </p>
            </div>
            <div style="margin-top: 10px;">
                <a href="excluir_equipamento.php?id=<?= $resultado['id'] ?>" class="btn">Excluir</a>
            </div>
        </fieldset>

<?php
    require_once($raiz . 'includes/rodape.php');
?>
