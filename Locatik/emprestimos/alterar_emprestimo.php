<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipamento = $_POST['equipamento'];
    $funcionario = $_POST['funcionario'];
    $setor = $_POST['setor'];
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'] ?: null;
    $id = $_GET['id'];
    try {
        $sql = "UPDATE emprestimo SET equipamento_id = ?, funcionario_id = ?, setor_id = ?, data_emprestimo = ?, data_devolucao = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$equipamento, $funcionario, $setor, $data_emprestimo, $data_devolucao, $id])) {
            $mensagem = "<p>Alteração realizada!</p>";
        } else {
            $mensagem = "<p>Erro ao alterar! Tente novamente</p>";
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
try {
    $stmt = $pdo->prepare("SELECT * from emprestimo WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $resultado = $stmt->fetch();
    $equipamentos = $pdo->query('SELECT * FROM equipamento')->fetchAll();
    $funcionarios = $pdo->query('SELECT * FROM funcionario')->fetchAll();
    $setores = $pdo->query('SELECT * FROM setor')->fetchAll();
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>

<h1>Alterar Empréstimo</h1>
    <form method="post"
        action="alterar_emprestimo.php?id=<?= $resultado['id']?>">
        <fieldset>
            <legend>Informações do Empréstimo</legend>
            <div class="form-group">
                <label for="equipamento">Selecione o equipamento</label>
                <select required name="equipamento" id="equipamento">
        <?php foreach ($equipamentos as $r):
            $selecionado = ($resultado['equipamento_id'] == $r['id']) ? "selected" : "";
            ?>
        <option <?= $selecionado ?> value="<?= $r['id'] ?>"><?= $r['descricao'] ?></option>
      <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="funcionario">Selecione o funcionário</label>
                <select required name="funcionario" id="funcionario">
        <?php foreach ($funcionarios as $r):
            $selecionado = ($resultado['funcionario_id'] == $r['id']) ? "selected" : "";
            ?>
        <option <?= $selecionado ?> value="<?= $r['id'] ?>"><?= $r['nome'] ?></option>
      <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="setor">Selecione o setor</label>
                <select required name="setor" id="setor">
        <?php foreach ($setores as $r):
            $selecionado = ($resultado['setor_id'] == $r['id']) ? "selected" : "";
            ?>
        <option <?= $selecionado ?> value="<?= $r['id'] ?>"><?= $r['nome'] ?></option>
      <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="data_emprestimo">Data do empréstimo</label>
                <input value="<?= $resultado['data_emprestimo']?>" type="date" id="data_emprestimo" name="data_emprestimo" required="">
            </div>
            <div class="form-group">
                <label for="data_devolucao">Data da devolução</label>
                <input value="<?= $resultado['data_devolucao']?>" type="date" id="data_devolucao" name="data_devolucao">
            </div>
            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="emprestimos.php" class="btn">Voltar</a>
            </div>
        </fieldset>
    </form>
    <?php
          echo $mensagem;
?>

<?php
require_once($raiz . 'includes/rodape.php');
