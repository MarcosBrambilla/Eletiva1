<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $setor = $_POST['setor'];
    $id = $_GET['id'];
    try {
        $sql = "UPDATE funcionario SET nome = ?, setor_id = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nome, $setor, $id])) {
            $mensagem = "<p>Alteração realizada!</p>";
        } else {
            $mensagem = "<p>Erro ao alterar! Tente novamente</p>";
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
try {
    $stmt = $pdo->prepare("SELECT * from funcionario WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $resultado = $stmt->fetch();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
try {
    $stmt = $pdo->query('SELECT * FROM setor');
    $resultado2 = $stmt->fetchAll();
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>

<h1>Alterar Funcionário</h1>
    <form method="post"
        action="alterar_funcionario.php?id=<?= $resultado['id']?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome</label>
            <input value="<?= $resultado['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="setor" class="form-label">Selecione o setor</label>
            <select required name="setor" id="setor" class="form-select">
    <?php foreach ($resultado2 as $r):
        if ($resultado['setor_id'] == $r['id']) {
            $selecionado = "selected";
        } else {
            $selecionado = "";
        }
        ?>
    <option <?= $selecionado ?> value="<?= $r['id'] ?>"><?= $r['nome'] ?></option>
  <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
          echo $mensagem;
?>

<?php
require_once($raiz . 'includes/rodape.php');
