<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contato - Greenduino</title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/pages/contato.css">
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
          <li><a href="../public/index.html">Início</a></li>
          <li><a href="../php/estufa.php">Estufa</a></li>
          <li><a href="sobre.php">Sobre</a></li>
          <li><a href="contato.php" class="active">Contato</a></li>
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
  </header>

  <section class="hero-contato">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="../public/favicon.png" alt="Logo Greenduino" class="logo-hero">
          <h1>Entre em Contato</h1>
          <p class="lead">
            Tem dúvidas sobre nossas estufas inteligentes? Quer parceria ou suporte? 
            Envie uma mensagem e nossa equipe responderá assim que possível.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="secao-contato container" id="formulario">
    <h2 class="section-title orbitron">Envie Sua Mensagem</h2>
    <p class="section-subtitle">Preencha o formulário abaixo.</p>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form id="form-contato" class="card-contato">
          <div class="form-group">
            <label for="nome">Nome Completo *</label>
            <input type="text" id="nome" name="nome" required class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" required class="form-control">
          </div>
          <div class="form-group">
            <label for="assunto">Assunto *</label>
            <input type="text" id="assunto" name="assunto" required class="form-control">
          </div>
          <div class="form-group">
            <label for="mensagem">Mensagem *</label>
            <textarea id="mensagem" name="mensagem" rows="5" required class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="anexo">Anexo (opcional: foto, documento, etc.)</label>
            <input type="file" id="anexo" name="anexo" class="form-control">
            <small class="form-text">Máximo 5MB. Arquivos enviados serão descritos no email.</small>
          </div>
          <button type="submit" class="botao primario btn-submit">Enviar Mensagem</button>
        </form>
        <div id="mensagem-sucesso" class="alert-sucesso" style="display: none;">
          Mensagem enviada com sucesso! Responderemos em breve.
        </div>
        <div id="mensagem-erro" class="alert-erro" style="display: none;">
          Erro ao enviar. Tente novamente ou envie para contato@greenduino.com.
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

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
  <script src="../js/pages/script.js"></script>
  <script src="../js/pages/contato.js"></script>
</body>
</html>
