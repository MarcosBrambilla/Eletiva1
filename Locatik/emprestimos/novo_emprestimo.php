<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $equipamentos = $pdo->query("SELECT * FROM equipamento")->fetchAll();
    $funcionarios = $pdo->query("SELECT * FROM funcionario")->fetchAll();
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>

<h1>Novo Empréstimo</h1>
    <form method="post">
        <fieldset>
            <legend>Informações do Empréstimo</legend>
            <div class="form-group">
                  <label for="equipamento">Selecione o equipamento</label>
                  <select required name="equipamento" id="equipamento">
                  <?php foreach ($equipamentos as $r) : ?>
                      <option value="<?= $r['id']?>"> <?= $r['descricao']?></option>
                  <?php endforeach;?>
                  </select>
            </div>
            <div class="form-group">
                  <label for="funcionario">Selecione o funcionário</label>
                  <select required name="funcionario" id="funcionario">
                      <option value="">Selecione o funcionário</option>
                  <?php foreach ($funcionarios as $r) : ?>
                      <option value="<?= $r['id']?>"> <?= $r['nome']?></option>
                  <?php endforeach;?>
                  </select>
            </div>
            <div class="form-group">
                  <label for="data_emprestimo">Data do empréstimo</label>
                  <input type="date" id="data_emprestimo" name="data_emprestimo" required="">
            </div>
            <div class="form-group">
                  <label for="data_devolucao">Data da devolução</label>
                  <input type="date" id="data_devolucao" name="data_devolucao">
            </div>
            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="emprestimos.php" class="btn">Voltar</a>
            </div>
        </fieldset>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $equipamento = $_POST['equipamento'];
          $funcionario = $_POST['funcionario'];
          $data_emprestimo = $_POST['data_emprestimo'];
          $data_devolucao = $_POST['data_devolucao'] ?: null;
          try {
              $stmt = $pdo->prepare('INSERT INTO emprestimo (equipamento_id, funcionario_id, data_emprestimo, data_devolucao) VALUES (?, ?, ?, ?);');
              if ($stmt->execute([$equipamento, $funcionario, $data_emprestimo, $data_devolucao])) {
                  echo "<p>Cadastro realizado!</p>";
              } else {
                  echo "<p>Erro ao cadastrar! Tente novamente</p>";
              }
          } catch (Exception $e) {
              echo "Erro: " . $e->getMessage();
          }
      }
?>

<?php
require_once($raiz . 'includes/rodape.php');
