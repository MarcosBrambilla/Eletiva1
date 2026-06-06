<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $stmt = $pdo->query('SELECT * FROM equipamento');
    $resultado = $stmt->fetchAll();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<h2>Equipamentos</h2>
    <a href="novo_equipamento.php" class="btn btn-success mb-3">Novo Registro</a>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Patrimônio</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= $r['descricao'] ?></td>
            <td><?= $r['patrimonio'] ?></td>
            <td class="d-flex gap-2">
            <a href="alterar_equipamento.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
            <a href="consultar_equipamento.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

<?php
    require_once($raiz . 'includes/rodape.php');
