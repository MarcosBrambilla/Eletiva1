<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];
    $patrimonio = $_POST['patrimonio'];
    $id = $_GET['id'];
    try {
        $sql = "UPDATE equipamento SET descricao = ?, patrimonio = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$descricao, $patrimonio, $id])) {
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
        = $pdo->prepare("SELECT * from equipamento WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $resultado = $stmt->fetch();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<h1>Alterar Equipamento</h1>
    <form method="post"
        action="alterar_equipamento.php?id=<?= $resultado['id']?>">
        <fieldset>
            <legend>Dados do Equipamento</legend>
            <div class="form-group">
                <label for="descricao">Informe a descrição:</label>
                <input value="<?= $resultado['descricao']?>" type="text" id="descricao" name="descricao" required="">
            </div>
            <div class="form-group">
                <label for="patrimonio">Informe o nº de patrimônio:</label>
                <input value="<?= $resultado['patrimonio']?>" type="text" id="patrimonio" name="patrimonio" required="">
            </div>
            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="equipamentos.php" class="btn">Voltar</a>
            </div>
        </fieldset>
    </form>
    <?php
      echo $mensagem;
?>

<?php
require_once($raiz . 'includes/rodape.php');
