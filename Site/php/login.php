
<?php
include('../db/conexao_cadastro.php');
session_start();

$msg = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email'");
    if (mysqli_num_rows($result) == 1) {
        $dados = mysqli_fetch_assoc($result);
        if (password_verify($senha, $dados['senha'])) {
            $_SESSION['usuario'] = $dados['nome'];
            $_SESSION['logado'] = 1; 
            header("Location: ../public/index.php");
            exit;
        } else {
            $msg = "Senha incorreta.";
             
        }
    } else {
        $msg = "O usuário não foi encontrado.";
      
    }
  }


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../assets/fonts.css">
<link rel="icon" type="image/x-icon" href="../public/favicon.png">
<title>Login</title>
<style>
/* Reset e base */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body, html {
  height: 100%;
  font-family: "Quicksand", sans-serif;
  display: flex;
  flex-direction: column;
}
h2{
  font-family:"Orbitron", sans-serif;
  margin-bottom:20px;
}

.section-login {
  flex-grow: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(to center, #81f666ff, #fdfff4, #abfc99);
  padding: 40px 20px;
  position: relative; /
}

.botao-voltar {
  position: absolute;
  top: 20px;
  left: 40px;
  width: 40px; 
  height: 40px; 
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
}

.botao-voltar img {
  filter: brightness(0) saturate(100%) invert(10%) sepia(90%) saturate(1500%) hue-rotate(110deg) brightness(90%) contrast(95%);
  width: 45px; 
  height: 45px;
  cursor: pointer;
  transition: transform 0.2s ease, opacity 0.2s ease;
}

.botao-voltar:hover img {
  transform: scale(1.1);
  opacity: 0.8;
}

a{
  color:#00421f;
}
a:hover{
  color:#670404;
}
.container-login {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
  width: 30%; 
  height: 100%; 
  padding: 40px; 
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: center; 
}

.input-field {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-family: "Quicksand", sans-serif;
}

.btn {
  width: 50%;
  padding: 12px;
  margin:20px 0 35px 0;
  background: #56ab2f;
  color: #fff;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
  font-family: "Quicksand", sans-serif;
}
.icones-login{
  display:flex;
  flex-direction:row;
  justify-content:center;
  text-align:center;
}
#icone{
  width:25px;
  height:25px;
  border-radius:50px;
  margin:10px 10px 3px 10px;
  transition: transform 0.2s ease, opacity 0.2s ease;
}

#icone:hover {
  transform: scale(1.1);
  opacity: 0.8;
}

.btn:hover {
  background: #3c7d22;
}

.message {
  color: red;
  margin-bottom: 15px;
  font-size: 14px;
}

</style>

</head>
<body>

<div class="section-login">

  <a href="../public/index.html." class="botao-voltar">
    <img src="../assets/images/logos/seta.png" alt="Voltar" />
  </a>

  <div class="container-login">

  

    <h2>Faça seu Login</h2>
    <?php if ($msg): ?><p class="message"><?= $msg ?></p><?php endif; ?>

    <form method="POST">
      <input type="email" name="email" class="input-field" placeholder="E-mail" required>
      <input type="password" name="senha" class="input-field" placeholder="Senha" required>
      <div class="icones-login">
        <img src="../assets/images/logos/iconegoogle.png" id="icone">
        <img src="../assets/images/logos/iconegit.png" id="icone">
      </div>
      <button type="submit" name="login" class="btn">Entrar</button>
    </form>

  <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
</div>
  </div>
</body>
</html>

