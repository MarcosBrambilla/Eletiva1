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
        <?php
        for ($i = 0; $i < 5; $i++) {
            echo '<div class="mb-3 border border-1 rounded p-3">
                    <label for="nome' . $i . '" class="form-label mt-2">Nome:</label>
                    <input type="text" id="nome' . $i . '" name="nome[]" class="form-control" required>

                    <label for="preco' . $i . '" class="form-label mt-2">Preço:</label>
                    <input type="number" step="0.01" id="preco' . $i . '" name="preco[]" class="form-control" required>
                  </div>';
        }
        ?>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $itens = [];
        $nomes = $_POST['nome'];
        $precos = $_POST['preco'];

        for ($i = 0; $i < 5; $i++) {
            $nome = $nomes[$i];
            $preco = $precos[$i];
            $preco *= 1.15;
            $itens[$nome] = $preco;
        }

        arsort($itens);

        echo '<div class="mt-3">';
        echo '<h4>Lista de Itens com Imposto:</h4><ul>';

        foreach ($itens as $nome => $preco) {
            echo '<li><strong>' . $nome . '</strong>: R$ ' . number_format($preco, 2, ',', '.') . '</li>';
        }

        echo '</ul></div>';
    }
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
