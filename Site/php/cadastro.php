<?php
include('../db/conexao_cadastro.php');
$msg = '';

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    // Criptografar a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Verificar se o e-mail já existe
    $check = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $msg = "❌ Este e-mail já está cadastrado.";
    } else {
        $sql = "INSERT INTO usuarios (nome, email, senha, telefone, cpf)
                VALUES ('$nome', '$email', '$senha_hash', '$telefone', '$cpf')";
        if (mysqli_query($con, $sql)) {
            header('Location: login.php');
        } else {
            $msg = "Erro ao cadastrar: " . mysqli_error($con);
        }
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
<title>Cadastro</title>
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
  background: linear-gradient(to center, #81f666ff, #fdfff4, #abfc99);
}

h2 {
  font-family: "Orbitron", sans-serif;
  margin-bottom: 15px;
  margin-top:10px;
}


.section-login {
  flex-grow: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(to center, #81f666ff, #fdfff4, #abfc99);
  padding: 40px 20px;
  position: relative;
}


a.botao-voltar {
  position: absolute;
  top: 40px;
  left: 60px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
  text-decoration: none; /* Remove sublinhado padrão do link */
}

a.botao-voltar img {
  filter: brightness(0) saturate(100%) invert(10%) sepia(90%) saturate(1500%) hue-rotate(110deg) brightness(90%) contrast(95%);
  width: 45px;
  height: 45px;
  cursor: pointer;
  transition: transform 0.2s ease, opacity 0.2s ease;
}

a.botao-voltar:hover img {
  transform: scale(1.1);
  opacity: 0.8;
}


.container-login {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  width: 40%;
  height:90%;
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

/* Botões */
.btn {
  width: 50%;
  padding: 12px;
  margin: 20px 0 35px 0;
  background: #56ab2f;
  color: #fff;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
  font-family: "Quicksand", sans-serif;
}

.btn:hover {
  background: #3c7d22;
}

/* Ícones */
.icones-login {
  display: flex;
  flex-direction: row;
  justify-content: center;
  text-align: center;
}

#icone {
  width: 25px;
  height: 25px;
  border-radius: 50px;
  margin: 10px 10px 3px 10px;
  transition: transform 0.2s ease, opacity 0.2s ease;
}

#icone:hover {
  transform: scale(1.1);
  opacity: 0.8;
}

/* Mensagens */
.message {
  color: red;
  margin-bottom: 15px;
  font-size: 14px;
}

/* Links */
a {
  color: #00421f;

}

a:hover {
  color: #670404;
}
.login{
  margin-bottom:10px; 
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
  margin:0 10px 3px 10px;
  transition: transform 0.2s ease, opacity 0.2s ease;
}

#icone:hover {
  transform: scale(1.1);
  opacity: 0.8;
}


@media (max-width: 1024px) {
  .container-login {
    width: 60%;
    padding: 35px;
  }

  a.botao-voltar {
    top: 25px;
    left: 25px;
    width: 35px;
    height: 35px;
  }

  a.botao-voltar img {
    width: 38px;
    height: 38px;
  }

  h2 {
    font-size: 1.8rem;
  }
}


@media (max-width: 768px) {
  .container-login {
    width: 80%;
    height: auto;
    padding: 30px 25px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .input-field {
    font-size: 0.95rem;
    padding: 10px;
  }

  .btn {
    width: 80%;
    font-size: 0.95rem;
    padding: 10px;
  }

  .icones-login {
    flex-wrap: wrap;
  }

  #icone {
    width: 22px;
    height: 22px;
    margin: 8px;
  }

  h2 {
    font-size: 1.6rem;
  }
}


@media (max-width: 480px) {
  body {
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .section-login {
    padding: 20px;
  }

  .container-login {
    width: 90%;
    height: auto;
    padding: 25px 20px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
  }

  a.botao-voltar {
    top: 15px;
    left: 15px;
    width: 32px;
    height: 32px;
  }

  a.botao-voltar img {
    width: 35px;
    height: 35px;
  }

  .btn {
    width: 100%;
    padding: 12px;
    font-size: 1rem;
  }

  .input-field {
    font-size: 1rem;
    padding: 12px;
  }

  #icone {
    width: 25px;
    height: 25px;
  }

  h2 {
    font-size: 1.4rem;
  }

  .login p {
    font-size: 0.9rem;
  }
}

</style>
</head>
<body>

  
   <div class="section-login">
   
    <div class="container-login">
      <h2>Cadastro</h2>
       <a href="#" onclick="history.back(); return false;" class="botao-voltar">
         <img src="../assets/images/logos/seta.png" alt="Voltar" />
        </a>
  
      <?php if ($msg): ?><p class="message"><?= $msg ?></p><?php endif; ?>

      <form method="POST">
      <div class="icones-login">
        <img src="../assets/images/logos/iconegoogle.png" id="icone">
        <img src="../assets/images/logos/iconegit.png" id="icone">
      </div>
        <input type="text" name="nome" class="input-field" placeholder="Nome completo" required>
        <input type="email" name="email" class="input-field" placeholder="E-mail" required>
        <input type="password" name="senha" class="input-field" placeholder="Senha" required>
        <input type="text" name="telefone" class="input-field" placeholder="Telefone">
        <input type="text" name="cpf" class="input-field" placeholder="CPF">
        <button type="submit" name="cadastrar" class="btn">Cadastrar</button>
      </form>
        <div class="login">
      <p>Já tem conta? <a href="login.php">Fazer login</a></p>
      </div>
    </div>

  </div>

</body>
</html>
