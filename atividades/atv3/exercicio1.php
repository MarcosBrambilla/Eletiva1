<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicio 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

  <form method="post" class="container p-10">
    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $menor = $_POST["valor1"];
        $pos = 0;
        for ($i = 1; $i < 8; $i++) {
            $f = $_POST["valor$i"];
            if ($f < $menor) {
                $menor = $f;
                $pos = $i;
            }
        }
        echo "<h1>O menor valor é: $menor na posição $pos</h1>";
    } else {
        for ($i = 1; $i < 8; $i++) {
            echo "<label for='valor$i' class='form-label'>Informe $i valor:</label>";
            echo "<input type='number' id='valor$i' name='valor$i' class='form-control' required=''>";
        }
        echo "<button type='submit' action class='btn btn-primary mt-3'>Testar</button>";
    }
    ?>
</form>

</html>

