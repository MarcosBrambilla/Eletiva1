<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Exercicio 16</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <div class="container py-3">
      <h1>Exercicio 16</h1>
      <form method="post">
        <div class="mb-3">
          <label for="preco" class="form-label">Informe a preco do produto:</label>
          <input
            type="number"
            id="preco"
            name="preco"
            class="form-control"
            required=""
            step="Any"
          />
          <label for="percentual" class="form-label">Informe a percentual do desconto do produto em %:</label>
          <input
            type="number"
            id="percentual"
            name="percentual"
            class="form-control"
            required=""
            step="Any"
          />
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $preco = $_POST['preco'];
          $percentual = $_POST['percentual'];

          $novoValor = $preco * (1 - ($percentual / 100));

          echo("O novo valor do produto é: $novoValor");
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
