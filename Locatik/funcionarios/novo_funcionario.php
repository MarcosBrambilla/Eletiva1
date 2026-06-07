<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
require_once($raiz . 'includes/conexao.php');
try {
    $stmt = $pdo->query("SELECT * FROM setor");
    $resultado = $stmt->fetchAll();
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>

<h1>Novo Funcionário</h1>
    <form method="post">
        <fieldset>
            <legend>Dados do Funcionário</legend>
            <div class="form-group">
                <label for="nome">Informe o nome:</label>
                <input type="text" id="nome" name="nome" required="">
            </div>
            <div class="form-group">
                <label for="setor">Selecione o setor:</label>
                <select required name="setor" id="setor">
                <?php foreach ($resultado as $r) : ?>
                    <option value="<?= $r['id']?>"> <?= $r['nome']?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="funcionarios.php" class="btn">Voltar</a>
            </div>
        </fieldset>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          require_once($raiz . 'includes/conexao.php');
          $nome = $_POST['nome'];
          $setor = $_POST['setor'];
          try {
              $stmt = $pdo->prepare('INSERT INTO funcionario (nome, setor_id) VALUES (?, ?);');
              if ($stmt->execute([$nome, $setor])) {
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
