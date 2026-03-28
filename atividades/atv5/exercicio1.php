<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercicio 1</h1>

        <form method="post">
            <?php
            for ($i = 0; $i < 5; $i++) {
                echo '<div class="mb-3">
                        <label for="nome' . $i . '" class="form-label">Nome:</label>
                        <input type="text" id="nome' . $i . '" name="nome[]" class="form-control" required>

                        <label for="telefone' . $i . '" class="form-label mt-2">Telefone:</label>
                        <input type="text" id="telefone' . $i . '" name="telefone[]" class="form-control" required>
                      </div>';
            }
            ?>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $contatos = [];
            $erros = [];

            $nomes = $_POST['nome'];
            $telefones = $_POST['telefone'];

            for ($i = 0; $i < 5; $i++) {
                $nome = trim($nomes[$i]);
                $telefone = trim($telefones[$i]);

                if ($nome == '' || $telefone == '') {
                    $erros[] = 'Todos os campos devem ser preenchidos.';
                    continue;
                }

                if (array_key_exists($nome, $contatos)) {
                    $erros[] = 'Nome duplicado: ' . $nome;
                    continue;
                }

                if (in_array($telefone, $contatos)) {
                    $erros[] = 'Telefone duplicado: ' . $telefone;
                    continue;
                }

                $contatos[$nome] = $telefone;
            }

            ksort($contatos);

            if (!empty($erros)) {
                echo '<div mt-3"><ul>';
                foreach ($erros as $erro) {
                    echo '<li>' . $erro . '</li>';
                }
                echo '</ul></div>';
            }

            if (!empty($contatos)) {
                echo '<div mt-3">';
                echo '<h4>Lista de Contatos:</h4><ul>';

                foreach ($contatos as $nome => $telefone) {
                    echo '<li><strong>' . $nome . '</strong>: ' . $telefone . '</li>';
                }

                echo '</ul></div>';
            }
        }
            ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>
