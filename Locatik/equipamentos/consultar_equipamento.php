<?php
    $raiz = '../';
    require_once($raiz . 'includes/cabecalho.php');
    require_once($raiz . 'includes/conexao.php');
    try{
        $stmt =
            $pdo->prepare('SELECT * FROM equipamento WHERE id=?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro! ".$e->getMessage();
    }
?>

<h1>Consultar Equipamento</h1>
    <form method="post"
        action="consultar_equipamento.php?id=<?= $resultado['id'] ?>">
        <div class="mb-3">
              <p><strong>Descrição:</strong>
                 <?= $resultado['descricao'] ?>
              </p>
        </div>
        <div class="mb-3">
              <p><strong>Patrimônio:</strong>
                 <?= $resultado['patrimonio'] ?>
              </p>
        </div>
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            try{
                $sql = "DELETE FROM equipamento WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if($stmt->execute([$id])){
                    header('Location: equipamentos.php');
                } else {
                    echo "Erro ao excluir!";
                }
            } catch(Exception $e){
                echo "Erro: ".$e->getMessage();
            }
        }
    ?>
<?php
    require_once($raiz . 'includes/rodape.php');
