<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Locatik - Cadastro</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="center-box">
    <h2 style="text-align: center; color: #003366;">Novo Cadastro</h2>
    
    <fieldset>
        <legend>Dados do Usuário</legend>
        <form method="post">
          <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required>
          </div>

          <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
          </div>

          <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" required>
          </div>

          <div style="margin-top: 15px;">
            <button type="submit" class="btn">Cadastrar</button>
          </div>
        </form>
    </fieldset>

    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          require_once('includes/conexao.php');
          $nome = $_POST['nome'];
          $email = $_POST['email'];
          $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
          try {
              $stmt = $pdo->prepare('INSERT INTO usuario (nome, email, senha)
                                  VALUES (? , ?, ?);');
              if ($stmt->execute([$nome, $email, $senha])) {
                  echo "<p style='color: green; font-weight: bold;'>Cadastro realizado! Faça o login!</p>";
              } else {
                  echo "<p class='text-danger'>Erro ao cadastrar! Tente novamente</p>";
              }
          } catch (Exception $e) {
              echo "Erro: " . $e->getMessage();
          }
      }
    ?>

    <p style="text-align: center; margin-top: 15px;">
      Já tem conta? <a href="index.php">Clique aqui para fazer login</a>
    </p>
</div>

</body>
</html>
