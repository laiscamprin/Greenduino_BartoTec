<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre Nós - Greenduino</title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/pages/sobre.css">
  <link rel="icon" type="image/x-icon" href="../public/favicon.png">
</head>
<body>
  <header class="barra-navegacao">
    <div class="container navegacao-conteudo">
      <div class="logo">
        <img src="../public/favicon.png" class="logosite" alt="Logo Greenduino">
        <p class="logotipo">Greenduino</p>
      </div>
      <nav>
        <ul class="links-navegacao">
          <li><a href="../public/index.php">Início</a></li>
          <li><a href="../php/pagina_menu.php">Estufa</a></li>
          <li><a href="sobre.php">Sobre</a></li>
          <li><a href="contato.php">Contato</a></li>
        </ul>
      </nav>
           <?php
      session_start();
      if(isset($_SESSION['logado'])){ ?>
             <div class="botoes-usuario">
                <a href="../php/sair.php" class="botao primario">Sair</a>
            </div>
        <?php }else{ ?>
            <div class="botoes-usuario">
                <a href="../php/login.php" class="botao secundario">Entrar</a>
                <a href="../php/cadastro.php" class="botao primario">Cadastrar</a>
            </div>
         <?php } ?>
    </div>
  </header>

  <section class="hero-sobre">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="../public/favicon.png" alt="Logo Greenduino" class="logo-hero">
          <h1>GREENDUINO</h1>
          <p class="lead">
            Somos uma equipe apaixonada por inovação sustentável, transformando a agricultura caseira em algo acessível e inteligente. 
            Descubra nossa história, missão e o que nos move a cultivar um futuro mais verde.
          </p>
          <div class="botoes-usuario">
            <a href="#equipe" class="botao primario">Conheça Nossa Equipe</a>
          </div>
        </div>
        <div class="col-md-6">
          <img src="../assets/images/pictures/anderson.jpeg" alt="Estufa Greenduino" class="img-hero">
        </div>
      </div>
    </div>
  </section>

  <section class="secao-sobre container" id="historia">
    <h2 class="section-title orbitron">Nossa Jornada</h2>
    <div class="row">
      <article class="col-md-4">
        <div class="card-sobre">
          <img src="../assets/images/pictures/grupo.jpeg" alt="Nossa História" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Nossa História</h5>
            <p class="card-text">O Greenduino nasceu no início 2025 de uma ideia simples: tornar a agricultura urbana acessível. Começamos com protótipos escolares.</p>
            <a href="https://github.com/laiscamprin/projeto_greenduino" class="btn-card">Saiba Mais</a>
          </div>
        </div>
      </article>
      <article class="col-md-4">
        <div class="card-sobre">
          <img src="../assets/images/pictures/plantas.jpeg" alt="Missão e Visão" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Missão e Visão</h5>
            <p class="card-text">Democratizar o cultivo caseiro com tecnologia acessível, promovendo sustentabilidade e educação ecológica.</p>
            <a href="https://github.com/laiscamprin/projeto_greenduino" class="btn-card">Saiba Mais</a>
          </div>
        </div>
      </article>
      <article class="col-md-4">
        <div class="card-sobre">
          <img src="../assets/images/pictures/plantas.jpeg" alt="Impacto Sustentável" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Nosso Impacto</h5>
            <p class="card-text">Ajudamos diversos usuários a economizar água e cultivar organicamente, com nosso projeto para educação.</p>
            <a href="https://github.com/laiscamprin/projeto_greenduino" class="btn-card">Saiba mais</a>
          </div>
        </div>
      </article>
    </div>
  </section>

  <section class="secao-equipe container" id="equipe">
    <h2 class="section-title orbitron">Nossa Equipe</h2>
    <p class="section-subtitle">Pessoas apaixonadas por tecnologia e natureza.</p>
    <div class="row">
      <div class="col-md-4">
        <div class="card-equipe">
          <img src="../assets/images/photos/Lais.jpeg" alt="Lais Camprincoli" class="card-img-equipe">
          <div class="card-body-equipe">
            <h5 class="card-title">Lais Camprincoli</h5>
            <p class="card-text">Estudante</p>
            <p class="card-desc">Cria automatização de estufas, lógica de contato e etc.</p>
            <a href="https://github.com/laiscamprin" class="btn-social">Github</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-equipe">
          <img src="../assets/images/photos/Beatriz.jpeg" alt="Beatriz Mota" class="card-img-equipe">
          <div class="card-body-equipe">
            <h5 class="card-title">Beatriz Mota</h5>
            <p class="card-text">Estudante</p>
            <p class="card-desc">Cria experiências intuitivas para monitoramento e gamificação.</p>
            <a href="https://github.com/Beatriz1317/" class="btn-social">Github</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-equipe">
          <img src="../assets/images/photos/Francisco.jpeg" alt="Francisco Justo" class="card-img-equipe">
          <div class="card-body-equipe">
            <h5 class="card-title">Francisco Justo</h5>
            <p class="card-text">Estudante</p>
            <p class="card-desc">Responsável pelo desenvolvimento de sites.</p>
            <a href="https://github.com/Fjustoo" class="btn-social">Github</a>
          </div>
        </div>
      </div>
    </div>
  </section>

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

  <script src="../js/pages/script.js"></script>
  <script src="../js/pages/sobre.js"></script>
</body>
</html>
