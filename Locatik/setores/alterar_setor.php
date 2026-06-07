<?php

$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $id = $_GET['id'];
    try {
        $sql = "UPDATE setor SET nome = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nome, $id])) {
            $mensagem = "<p>Alteração realizada!</p>";
        } else {
            $mensagem = "<p>Erro ao alterar! Tente novamente</p>";
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
try {
    $stmt
        = $pdo->prepare("SELECT * from setor WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $resultado = $stmt->fetch();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<h1>Alterar Setor</h1>
    <form method="post"
        action="alterar_setor.php?id=<?= $resultado['id']?>">
        <fieldset>
            <legend>Dados do Setor</legend>
            <div class="form-group">
                <label for="nome">Informe o nome:</label>
                <input value="<?= $resultado['nome']?>" type="text" id="nome" name="nome" required="">
            </div>
            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="setores.php" class="btn">Voltar</a>
            </div>
        </fieldset>
    </form>
    <?php
      echo $mensagem;
?>

<?php
require_once($raiz . 'includes/rodape.php');
