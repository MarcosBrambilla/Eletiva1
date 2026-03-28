<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercicio 2</h1>

        <form method="post">
            <?php
            for ($i = 0; $i < 5; $i++) {
                echo '<div class="mb-3 border border-1 rounded p-4 ">
                        <label for="nome' . $i . '" class="form-label">Nome:</label>
                        <input type="text" id="nome' . $i . '" name="nome[]" class="form-control" required>

                        <label for="nota1' . $i . '" class="form-label mt-2">Nota1:</label>
                        <input type="text" id="nota1' . $i . '" name="nota1[]" class="form-control" required>

                        <label for="nota2' . $i . '" class="form-label mt-2">Nota2:</label>
                        <input type="text" id="nota2' . $i . '" name="nota2[]" class="form-control" required>

                        <label for="nota3' . $i . '" class="form-label mt-2">Nota3:</label>
                        <input type="text" id="nota3' . $i . '" name="nota3[]" class="form-control" required>
                      </div>';
            }
            ?>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $alunos = [];
                $nomes = $_POST['nome'];
                $nota1 = $_POST['nota1'];
                $nota2 = $_POST['nota2'];
                $nota3 = $_POST['nota3'];

                for ($i = 0; $i < 5; $i++) {
                    $nome = trim($nomes[$i]);
                    $media = ($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3;

                    $alunos[$nome] = $media;
                }

                arsort($alunos);

                if (!empty($alunos)) {
                    echo '<div class="mt-3">';
                    echo '<h4>Lista de Alunos:</h4><ul>';

                    foreach ($alunos as $aluno => $media) {
                        echo '<li><strong>' . $aluno . '</strong>: ' . number_format($media, 2, ',', '.') . '</li>';
                    }

                    echo '</ul></div>';
                }
            }
            ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>
