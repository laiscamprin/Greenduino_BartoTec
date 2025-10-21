//painel.php (pagina q aparece pro usuário dps do login)

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Painel do Usuário</title>
<style>
body { 
  font-family: Arial; 
  background-color: #eaf9e4; 
  text-align: center; 
  margin-top: 100px;
}
a { color: #56ab2f; text-decoration: none; font-weight: bold; }
</style>
</head>
<body>
  <h1>Bem-vindo, <?= $_SESSION['usuario'] ?>!</h1>
  <p>Você fez login com sucesso.</p>
  <a href="sair.php">Sair</a>
</body>
</html>