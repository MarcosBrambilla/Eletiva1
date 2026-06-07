<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');

$id = $_GET['id'];
try {
    $stmt = $pdo->prepare('SELECT e.*, eq.descricao AS equipamento, f.nome AS funcionario FROM emprestimo e INNER JOIN equipamento eq ON eq.id = e.equipamento_id INNER JOIN funcionario f ON f.id = e.funcionario_id WHERE e.id = ?');
    $stmt->execute([$id]);
    $resultado = $stmt->fetch();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $sql = "DELETE FROM emprestimo WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$id])) {
            header('Location: emprestimos.php');
            exit();
        } else {
            echo "<p class='text-danger'>Erro ao excluir o empréstimo!</p>";
        }
    } catch (Exception $e) {
        echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
    }
}
?>

<h1>Excluir Empréstimo</h1>
<p style="color: #cc0000; font-weight: bold;">Tem certeza que deseja excluir o registro de empréstimo abaixo?</p>

<fieldset>
    <legend>Confirmar Exclusão</legend>
    <div class="form-group">
        <p><strong>ID:</strong> <?= $resultado['id'] ?></p>
        <p><strong>Equipamento:</strong> <?= $resultado['equipamento'] ?></p>
        <p><strong>Funcionário:</strong> <?= $resultado['funcionario'] ?></p>
        <p><strong>Data:</strong> <?= $resultado['data_emprestimo'] ?></p>
    </div>
    
    <form method="post">
        <div style="margin-top: 15px;">
            <button type="submit" class="btn" style="background: linear-gradient(to bottom, #ffcccc 0%, #ff9999 100%); border-color: #cc0000;">Sim, Excluir</button>
            <a href="emprestimos.php" class="btn">Cancelar</a>
        </div>
    </form>
</fieldset>

<?php
    require_once($raiz . 'includes/rodape.php');
?>
