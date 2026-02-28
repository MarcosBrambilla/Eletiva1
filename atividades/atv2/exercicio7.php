<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Exercicio 6</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <div class="container py-3">
      <h1>Exercicio 6</h1>
      <form method="post">
        <div class="mb-3">
          <label for="tempGraus" class="form-label">Digite a temperatura em Graus Fahreheint: </label>
          <input
            type="number"
            id="tempGraus"
            name="tempGraus"
            step="any"
            class="form-control"
            required=""
          />
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $f = $_POST['tempGraus'];

          $c = ($f - 32) / 1.8;

          // $f = ($c * 1.8) + 32;

          $cFormatado = number_format($c, 2, ',', '.');

          echo "$f º Fahrenheit é equivalente a $cFormatado º Celsius";
      }
      ?>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"
      ></script>
    </div>
  </body>
</html>
