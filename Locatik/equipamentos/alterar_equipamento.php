<?php
    $raiz = '../';
    require_once($raiz . 'includes/cabecalho.php');
    require_once($raiz . 'includes/conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $descricao = $_POST['descricao'];
        $patrimonio = $_POST['patrimonio'];
        $id = $_GET['id'];
        try{
          $sql = "UPDATE equipamento SET descricao = ?, patrimonio = ? WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$descricao, $patrimonio, $id])){
            $mensagem = "<p>Alteração realizada!</p>";
          } else {
            $mensagem = "<p>Erro ao alterar! Tente novamente</p>";
          }
        } catch(Exception $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    try{
        $stmt =
            $pdo->prepare("SELECT * from equipamento WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h1>Alterar Equipamento</h1>
    <form method="post"
        action="alterar_equipamento.php?id=<?= $resultado['id']?>">
        <div class="mb-3">
            <label for="descricao" class="form-label">Informe a descrição</label>
            <input value="<?= $resultado['descricao']?>" type="text" id="descricao" name="descricao" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="patrimonio" class="form-label">Informe o nº de patrimônio</label>
            <input value="<?= $resultado['patrimonio']?>" type="text" id="patrimonio" name="patrimonio" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
      echo $mensagem;
    ?>

<?php
    require_once($raiz . 'includes/rodape.php');
