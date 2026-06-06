<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $equipamentos = $pdo->query("SELECT * FROM equipamento")->fetchAll();
    $funcionarios = $pdo->query("SELECT * FROM funcionario")->fetchAll();
    $setores = $pdo->query("SELECT * FROM setor")->fetchAll();
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>

<h1>Novo Empréstimo</h1>
    <form method="post">
        <div class="mb-3">
              <label for="equipamento" class="form-label">Selecione o equipamento</label>
              <select required name="equipamento" id="equipamento" class="form-select">
              <?php foreach ($equipamentos as $r) : ?>
                  <option value="<?= $r['id']?>"> <?= $r['descricao']?></option>
              <?php endforeach;?>
              </select>
        </div>
        <div class="mb-3">
              <label for="funcionario" class="form-label">Selecione o funcionário</label>
              <select required name="funcionario" id="funcionario" class="form-select">
              <?php foreach ($funcionarios as $r) : ?>
                  <option value="<?= $r['id']?>"> <?= $r['nome']?></option>
              <?php endforeach;?>
              </select>
        </div>
        <div class="mb-3">
              <label for="setor" class="form-label">Selecione o setor</label>
              <select required name="setor" id="setor" class="form-select">
              <?php foreach ($setores as $r) : ?>
                  <option value="<?= $r['id']?>"> <?= $r['nome']?></option>
              <?php endforeach;?>
              </select>
        </div>
        <div class="mb-3">
              <label for="data_emprestimo" class="form-label">Data do empréstimo</label>
              <input type="date" id="data_emprestimo" name="data_emprestimo" class="form-control" required="">
        </div>
        <div class="mb-3">
              <label for="data_devolucao" class="form-label">Data da devolução</label>
              <input type="date" id="data_devolucao" name="data_devolucao" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $equipamento = $_POST['equipamento'];
          $funcionario = $_POST['funcionario'];
          $setor = $_POST['setor'];
          $data_emprestimo = $_POST['data_emprestimo'];
          $data_devolucao = $_POST['data_devolucao'] ?: null;
          try {
              $stmt = $pdo->prepare('INSERT INTO emprestimo (equipamento_id, funcionario_id, setor_id, data_emprestimo, data_devolucao) VALUES (?, ?, ?, ?, ?);');
              if ($stmt->execute([$equipamento, $funcionario, $setor, $data_emprestimo, $data_devolucao])) {
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
