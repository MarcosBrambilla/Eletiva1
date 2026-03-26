<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 12 - Gerar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercicio 12</h1>
        <form method="post">
            <p>Clique no botão abaixo para gerar uma senha aleatória.</p>
            <button type="submit" class="btn btn-primary">Gerar Senha</button>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $senhaGerada = bin2hex(random_bytes(4));

            echo "<p>Sua nova senha é: $senhaGerada</p>";
        }
        ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
