<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
?>

<h1>Novo Setor</h1>
    <form method="post">
        <fieldset>
            <legend>Dados do Setor</legend>
            <div class="form-group">
                <label for="nome">Informe o nome:</label>
                <input type="text" id="nome" name="nome" required="">
            </div>
            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="setores.php" class="btn">Voltar</a>
            </div>
        </fieldset>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          require_once($raiz . 'includes/conexao.php');
          $nome = $_POST['nome'];
          try {
              $stmt = $pdo->prepare('INSERT INTO setor (nome) VALUES (?);');
              if ($stmt->execute([$nome])) {
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
