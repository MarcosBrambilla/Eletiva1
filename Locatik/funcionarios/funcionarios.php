<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $stmt = $pdo->query('SELECT f.*, s.nome AS setor FROM funcionario f INNER JOIN setor s ON s.id = f.setor_id');
    $resultado = $stmt->fetchAll();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<h2>Funcionários</h2>
    <a href="novo_funcionario.php" class="btn btn-success mb-3">Novo Registro</a>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Setor</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= $r['nome'] ?></td>
            <td><?= $r['setor'] ?></td>
            <td class="d-flex gap-2">
            <a href="alterar_funcionario.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
            <a href="consultar_funcionario.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

<?php
    require_once($raiz . 'includes/rodape.php');
