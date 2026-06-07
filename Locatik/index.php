<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Locatik - Login</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="center-box">
    <h2 style="text-align: center; color: #003366;">Acesso ao Sistema</h2>
    
    <fieldset>
        <legend>Login</legend>
        <form method="post">
          <div class="form-group">
            <label>Email:</label>
            <input name="email" type="email" required>
          </div>

          <div class="form-group">
            <label>Senha:</label>
            <input name="senha" type="password" required>
          </div>

          <div style="margin-top: 15px;">
            <button type="submit" class="btn-primary">Entrar</button>
          </div>
        </form>
    </fieldset>

    <?php
      require_once('includes/conexao.php');
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
            $stmt->execute([$email]);
            $usuario = $stmt->fetch();
            $senha_correta = password_verify($senha, $usuario['senha']);
            if ($usuario && $senha_correta) {
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['acesso'] = true;
                header('Location: principal.php');
            } else {
                echo "<p class='text-danger'>Credenciais inválidas!</p>";
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    ?>

    <p style="text-align: center; margin-top: 15px;">
      Não tem conta? <a href="cadastro.php">Clique aqui para se cadastrar</a>
    </p>
</div>

</body>
</html>
