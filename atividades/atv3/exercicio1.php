<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicio 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

  <form method="post" class="container p-10">

    <label for='valor1' class='form-label'>Informe 1 valor:</label>
    <input type='number' id='valor1' name='valor1' class='form-control' required=''>

    <label for='valor2' class='form-label'>Informe 2 valor:</label>
    <input type='number' id='valor2' name='valor2' class='form-control' required=''>

    <label for='valor3' class='form-label'>Informe 3 valor:</label>
    <input type='number' id='valor3' name='valor3' class='form-control' required=''>

    <label for='valor4' class='form-label'>Informe 4 valor:</label>
    <input type='number' id='valor4' name='valor4' class='form-control' required=''>

    <label for='valor5' class='form-label'>Informe 5 valor:</label>
    <input type='number' id='valor5' name='valor5' class='form-control' required=''>

    <label for='valor6' class='form-label'>Informe 6 valor:</label>
    <input type='number' id='valor6' name='valor6' class='form-control' required=''>

    <label for='valor7' class='form-label'>Informe 7 valor:</label>
    <input type='number' id='valor7' name='valor7' class='form-control' required=''>

    <button type='submit' action class='btn btn-primary mt-3'>Testar</button>
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
    }
    ?>
</form>

</html>

