<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
      <h1>Exercicio 4</h1>
        <form method="post">
          <div class="mb-3">
              <label for="valorProduto" class="form-label">Informe o valor do Produto:</label>
              <input type="number" id="valorProduto" name="valorProduto" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $valorProduto = $_POST['valorProduto'];

                if ($valorProduto > 100) {
                    $desconto = $valorProduto * 0.15;
                    $novoValor = $valorProduto - $desconto;
                    echo "Desconto de $desconto aplicado. Novo valor de: R$:$novoValor";
                } else {
                    echo "Valor do produto de R$: $valorProduto";
                }

            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
