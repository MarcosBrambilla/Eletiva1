<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $stmt = $pdo->query('SELECT e.*, eq.descricao AS equipamento, f.nome AS funcionario, s.nome AS setor
        FROM emprestimo e
        INNER JOIN equipamento eq ON eq.id = e.equipamento_id
        INNER JOIN funcionario f ON f.id = e.funcionario_id
        INNER JOIN setor s ON s.id = e.setor_id');
    $resultado = $stmt->fetchAll();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<h2>Empréstimos</h2>
    <a href="novo_emprestimo.php" class="btn">Novo Registro</a>
    <table>
    <thead>
        <tr>
        <th>ID</th>
        <th>Equipamento</th>
        <th>Funcionário</th>
        <th>Setor</th>
        <th>Empréstimo</th>
        <th>Devolução</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= $r['equipamento'] ?></td>
            <td><?= $r['funcionario'] ?></td>
            <td><?= $r['setor'] ?></td>
            <td><?= $r['data_emprestimo'] ?></td>
            <td><?= $r['data_devolucao'] ?></td>
            <td>
            <a href="alterar_emprestimo.php?id=<?= $r['id'] ?>" class="btn">Editar</a>
            <a href="consultar_emprestimo.php?id=<?= $r['id'] ?>" class="btn">Consultar</a>
            <a href="excluir_emprestimo.php?id=<?= $r['id'] ?>" class="btn">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

<?php
    require_once($raiz . 'includes/rodape.php');
