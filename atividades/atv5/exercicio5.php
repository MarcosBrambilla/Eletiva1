<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container py-3">
    <h1>Cadastro 5</h1>

    <form method="post">
        <?php
        for ($i = 0; $i < 5; $i++) {
            echo '<div class="mb-3 border border-1 rounded p-3">
                    <label for="titulo' . $i . '" class="form-label mt-2">Título:</label>
                    <input type="text" id="titulo' . $i . '" name="titulo[]" class="form-control" required>

                    <label for="quantidade' . $i . '" class="form-label mt-2">Quantidade em Estoque:</label>
                    <input type="number" id="quantidade' . $i . '" name="quantidade[]" class="form-control" required>
                  </div>';
        }
        ?>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $livros = [];
        $titulos = $_POST['titulo'];
        $quantidades = $_POST['quantidade'];

        for ($i = 0; $i < 5; $i++) {
            $titulo = $titulos[$i];
            $quantidade = $quantidades[$i];
            $livros[$titulo] = $quantidade;
        }

        ksort($livros);

        echo '<div class="mt-3">';
        echo '<h4>Lista de Livros:</h4><ul>';

        foreach ($livros as $titulo => $quantidade) {
            echo '<li><strong>' . $titulo . '</strong>: ' . $quantidade . ' unidades';
            if ($quantidade < 5) {
                echo ' <span class="badge bg-danger">Baixa quantidade!</span>';
            }
            echo '</li>';
        }

        echo '</ul></div>';
    }
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
