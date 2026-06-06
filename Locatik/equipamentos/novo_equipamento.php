<?php
    $raiz = '../';
    require_once($raiz . 'includes/cabecalho.php');
?>

<h1>Novo Equipamento</h1>
    <form method="post">
        <div class="mb-3">
              <label for="descricao" class="form-label">Informe a descrição</label>
              <input type="text" id="descricao" name="descricao" class="form-control" required="">
        </div>
        <div class="mb-3">
              <label for="patrimonio" class="form-label">Informe o nº de patrimônio</label>
              <input type="text" id="patrimonio" name="patrimonio" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once($raiz . 'includes/conexao.php');
        $descricao = $_POST['descricao'];
        $patrimonio = $_POST['patrimonio'];
        try{
          $stmt = $pdo->prepare('INSERT INTO equipamento (descricao, patrimonio) VALUES (?, ?);');
          if($stmt->execute([$descricao, $patrimonio])){
            echo "<p>Cadastro realizado!</p>";
          } else {
            echo "<p>Erro ao cadastrar! Tente novamente</p>";
          }
        } catch(Exception $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    ?>

<?php
    require_once($raiz . 'includes/rodape.php');
