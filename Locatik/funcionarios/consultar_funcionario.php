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
        <div class="mb-3">
              <p><strong>Nome:</strong>
                 <?= $resultado['nome'] ?>
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Setor:</strong>
                 <?= $resultado['setor'] ?>
              </p>
        </div>
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            try {
                $sql = "DELETE FROM funcionario WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$id])) {
                    header('Location: funcionarios.php');
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
