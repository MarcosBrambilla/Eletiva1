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
   INNER JOIN setor s ON s.id = e.setor_id
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
        <div class="mb-3">
              <p><strong>Equipamento:</strong>
                 <?= $resultado['equipamento'] ?>
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Funcionário:</strong>
                 <?= $resultado['funcionario'] ?>
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Setor:</strong>
                 <?= $resultado['setor'] ?>
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Data do empréstimo:</strong>
                 <?= $resultado['data_emprestimo'] ?>
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Data da devolução:</strong>
                 <?= $resultado['data_devolucao'] ?>
              </p>
        </div>
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            try {
                $sql = "DELETE FROM emprestimo WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$id])) {
                    header('Location: emprestimos.php');
                } else {
                    echo "Erro ao excluir!";
                }
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
?>
<?php
require_once($raiz . 'includes/rodape.php');
