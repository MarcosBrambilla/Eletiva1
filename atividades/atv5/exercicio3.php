<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container py-3">
    <h1>Exercicio 3</h1>

    <form method="post">
        <?php
        for ($i = 0; $i < 5; $i++) {
            echo '<div class="mb-3 border border-1 rounded p-3">
                    <label for="codigo' . $i . '" class="form-label">Código:</label>
                    <input type="text" id="codigo' . $i . '" name="codigo[]" class="form-control" required>

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
        $produtos = [];
        $codigos = $_POST['codigo'];
        $nomes = $_POST['nome'];
        $precos = $_POST['preco'];

        for ($i = 0; $i < 5; $i++) {
            $codigo = trim($codigos[$i]);
            $nome = trim($nomes[$i]);
            $preco = floatval($precos[$i]);

            if ($preco > 100) {
                $preco *= 0.9;
            }

            $produtos[$codigo] = [
                'nome' => $nome,
                'preco' => $preco,
            ];
        }

        uasort($produtos, function ($a, $b) {
            return strcmp($a['nome'], $b['nome']);
        });

        echo '<div class="mt-3">';
        echo '<h4>Lista de Produtos:</h4><ul>';

        foreach ($produtos as $codigo => $info) {
            echo '<li><strong>' . $info['nome'] . '</strong> (Código: ' . $codigo . ') - R$ ' . number_format($info['preco'], 2, ',', '.') . '</li>';
        }

        echo '</ul></div>';
    }
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
