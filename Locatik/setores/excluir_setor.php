<?php
    $raiz = '../';
    require_once($raiz . 'includes/cabecalho.php');
    require_once($raiz . 'includes/conexao.php');

    $id = $_GET['id'];
    try {
        $stmt = $pdo->prepare('SELECT * FROM setor WHERE id = ?');
        $stmt->execute([$id]);
        $resultado = $stmt->fetch();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $sql = "DELETE FROM setor WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$id])) {
                header('Location: setores.php');
                exit();
            } else {
                echo "<p class='text-danger'>Erro ao excluir o setor!</p>";
            }
        } catch (Exception $e) {
            echo "<p class='text-danger'>Erro: Este setor não pode ser excluído pois possui funcionários vinculados.</p>";
        }
    }
?>

<h1>Excluir Setor</h1>
<p style="color: #cc0000; font-weight: bold;">Tem certeza que deseja excluir o setor abaixo?</p>

<fieldset>
    <legend>Confirmar Exclusão</legend>
    <div class="form-group">
        <p><strong>ID:</strong> <?= $resultado['id'] ?></p>
        <p><strong>Nome:</strong> <?= $resultado['nome'] ?></p>
    </div>
    
    <form method="post">
        <div style="margin-top: 15px;">
            <button type="submit" class="btn" style="background: linear-gradient(to bottom, #ffcccc 0%, #ff9999 100%); border-color: #cc0000;">Sim, Excluir</button>
            <a href="setores.php" class="btn">Cancelar</a>
        </div>
    </form>
</fieldset>

<?php
    require_once($raiz . 'includes/rodape.php');
?>
