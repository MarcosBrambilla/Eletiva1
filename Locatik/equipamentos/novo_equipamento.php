<?php
$raiz = '../';
require_once($raiz . 'includes/cabecalho.php');
?>

<h1>Novo Equipamento</h1>
    <form method="post">
        <fieldset>
            <legend>Dados do Equipamento</legend>
            <div class="form-group">
                <label for="descricao">Informe a descrição:</label>
                <input type="text" id="descricao" name="descricao" required="">
            </div>
            <div class="form-group">
                <label for="patrimonio">Informe o nº de patrimônio:</label>
                <input type="text" id="patrimonio" name="patrimonio" required="">
            </div>
            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="equipamentos.php" class="btn">Voltar</a>
            </div>
        </fieldset>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          require_once($raiz . 'includes/conexao.php');
          $descricao = $_POST['descricao'];
          $patrimonio = $_POST['patrimonio'];
          try {
              $stmt = $pdo->prepare('INSERT INTO equipamento (descricao, patrimonio) VALUES (?, ?);');
              if ($stmt->execute([$descricao, $patrimonio])) {
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
