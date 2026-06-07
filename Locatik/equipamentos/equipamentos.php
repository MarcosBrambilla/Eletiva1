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
    <a href="novo_equipamento.php" class="btn">Novo Registro</a>
    <table>
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
            <td>
            <a href="alterar_equipamento.php?id=<?= $r['id'] ?>" class="btn">Editar</a>
            <a href="consultar_equipamento.php?id=<?= $r['id'] ?>" class="btn">Consultar</a>
            <a href="excluir_equipamento.php?id=<?= $r['id'] ?>" class="btn">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

<?php
    require_once($raiz . 'includes/rodape.php');
