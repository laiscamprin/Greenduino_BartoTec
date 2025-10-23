
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pages/menu.css" >
    <link rel="stylesheet" href="../css/main.css" >
    <link rel="stylesheet" href="../assets/fonts.css">
  <link rel="icon" type="image/x-icon" href="../public/favicon.png">
    <script src="../js/pages/script.js"></script>
    <title>Menu - Dashboard</title>
   
</head> 
<body>

<?php 
  session_start();
  if(isset($_SESSION['logado'])):
?>

 <header class="barra-navegacao">
    <div class="container navegacao-conteudo">
      <div class="logo">
        <img src="../public/favicon.png" class="logosite" alt="Logo Greenduino">
        <p class="logotipo">Greenduino</p>
      </div>
      <nav>
        <ul class="links-navegacao">
          <li class="anderson"><a href="../public/index.php">Início</a></li>
          <li class="anderson"><a href="pagina_menu.php">Estufa</a></li>
          <li class="anderson"><a href="../pages/sobre.php">Sobre</a></li>
          <li class="anderson"><a href="../pages/contato.php" class="active">Contato</a></li>
        </ul>
      </nav>
      <div class="botoes-usuario">
        <a href="sair.php" class="botao primario">Sair</a>
      </div>
    </div>
  </header>
  <main>
      <div class="botao-titulo">
          <a href="../public/index.php" class="botao-voltar">
            <img src="../assets/images/logos/seta.png" alt="Voltar" />
          </a>
         <h1> Estufa menu</h1>
      </div>
  

 <?php
$con = mysqli_connect('localhost', 'root', '1234', 'greenduino_db');
$info = mysqli_query($con, "SELECT nome_arduino, especie_planta, codigo_arduino FROM arduino ");

?>
       <div class="nova-planta">
              <button class="botao-nova-planta" ><a id="planta" href="#">Adicionar nova planta</a></button>
        </div>
<?php
foreach($info as $exibirInfo){
echo "<div class='div-exibir-plantas' id='div-exibir-plantas'>";
echo "<h1 class='titulo-exibir' id='titulo-exibir'>" . $exibirInfo['nome_arduino'] . "</h1>";
echo "<p class='info-planta' id='info-planta'>" . $exibirInfo['especie_planta'] . "</p>";
echo "<p class='info-planta' id='info-planta'>" . $exibirInfo['codigo_arduino'] . "</p>";
echo "</div>";
} ?>
<?php else: ?>

   <header class="barra-navegacao">
    <div class="container navegacao-conteudo">
      <div class="logo">
        <img src="../public/favicon.png" class="logosite" alt="Logo Greenduino">
        <p class="logotipo">Greenduino</p>
      </div>
      <nav>
        <ul class="links-navegacao">
          <li class="anderson"><a href="../public/index.php">Início</a></li>
          <li class="anderson"><a href="pagina_menu.php">Estufa</a></li>
          <li class="anderson"><a href="../pages/sobre.php">Sobre</a></li>
          <li class="anderson"><a href="../pages/contato.php" class="active">Contato</a></li>
        </ul>
      </nav>
      <div class="botoes-usuario">
        <a href="login.php" class="botao secundario">Entrar</a>
        <a href="cadastro.php" class="botao primario">Cadastrar</a>
      </div>
    </div>
  </header>
  <main>
      <div class="botao-titulo">
          <a href="#" onclick="history.back(); return false;" class="botao-voltar">
            <img src="../assets/images/logos/seta.png" alt="Voltar" />
          </a>
         <h1> Estufa menu</h1>
      </div>
  </main>
    <section>
          <div class="adicionar-planta">
              <button class="botao-adicionar"><img id="mais"src="../assets/images/logos/mais.png"><a href="login.php" id="planta"> Adicionar uma planta</a></button>
          </div>
      </section>
  <?php endif; ?>

<script>
    const plantaDiv = document.getElementById('div-exibir-plantas');

     plantaDiv.addEventListener("click", () => {
                window.location.href = "estufa.php"; 
            });
</script>
  </main>   

  <footer class="rodape">
    <div class="container">
      <div class="logo-footer">
        <img src="../public/favicon.png" alt="Logo Greenduino" class="logosite">
        <p class="logotipo">Greenduino</p>
      </div>
      <p>Cultivando em casa com sustentabilidade e inovação.</p>
      <p class="copyright">&copy; 2025 Greenduino. Todos os direitos reservados.</p>
    </div>
  </footer>
</body>
</html>
