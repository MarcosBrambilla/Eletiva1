<?php

$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $stmt
  = $pdo->prepare('SELECT e.*, eq.descricao AS equipamento, f.nome AS funcionario, s.nome AS setor
   FROM emprestimo e
   INNER JOIN equipamento eq ON eq.id = e.equipamento_id
   INNER JOIN funcionario f ON f.id = e.funcionario_id
   INNER JOIN setor s ON s.id = f.setor_id
    WHERE e.id=?');
    $stmt->execute([$_GET['id']]);
    $resultado = $stmt->fetch();
} catch (Exception $e) {
    echo "Erro! " . $e->getMessage();
}
?>

<h1>Consultar Empréstimo</h1>
    <form method="post"
        action="consultar_emprestimo.php?id=<?= $resultado['id'] ?>">
        <fieldset>
            <legend>Dados do Empréstimo</legend>
            <div class="form-group">
                  <p><strong>Equipamento:</strong>
                     <?= $resultado['equipamento'] ?>
                  </p>
            </div>
            <div class="form-group">
                  <p><strong>Funcionário:</strong>
                     <?= $resultado['funcionario'] ?>
                  </p>
            </div>
            <div class="form-group">
                  <p><strong>Setor:</strong>
                     <?= $resultado['setor'] ?>
                  </p>
            </div>
            <div class="form-group">
                  <p><strong>Data do empréstimo:</strong>
                     <?= $resultado['data_emprestimo'] ?>
                  </p>
            </div>
            <div class="form-group">
                  <p><strong>Data da devolução:</strong>
                     <?= $resultado['data_devolucao'] ?>
                  </p>
            </div>
            <div style="margin-top: 10px;">
                <a href="excluir_emprestimo.php?id=<?= $resultado['id'] ?>" class="btn">Excluir</a>
                <a href="emprestimos.php" class="btn">Voltar</a>
            </div>
        </fieldset>

<?php
require_once($raiz . 'includes/rodape.php');
?>
