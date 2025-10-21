<?php 
session_start();
if(isset($_SESSION['logado'])){
     
$exibir_tabela = false; 
$mensagem_erro = "";
$labels_dh = [];
$valores = [];
$valores_temperatura = []; 
$valores_umidade_ar = [];   
$valores_umidade_solo = [];
$valores_irrigacao = [];    


if(isset($_POST['botao-selecao']) && !empty($_POST['data_inicial'])) {
     $con = mysqli_connect('localhost', 'root', '1234', 'greenduino_db');
     
        if(!$con){
            $mensagem_erro = "Erro na conexão do Banco. Erro: " . mysqli_connect_error();
        } else {
            $exibir_tabela = true;
        }

        $tipo_tabela = $_POST['botao-selecao']; 
        $data_inicial = $_POST['data_inicial'];
        $data_final = $_POST['data_final'];
        if(empty($data_final)){ $data_final = $data_inicial;}
        if(empty($data_inicial)){ $data_inicial = $data_final;}

        $select_tabela = "";
        switch ($tipo_tabela) { 
            case 'tudo':  
                $select_tabela = "SELECT data, hora, temperatura, umidade_ar, umidade_solo, irrigacao FROM registros WHERE data BETWEEN '$data_inicial' AND '$data_final' ORDER BY data ASC, hora ASC";
                break;  
            case 'temperatura': 
                $select_tabela = "SELECT data, hora, temperatura FROM registros WHERE data BETWEEN '$data_inicial' AND '$data_final' ORDER BY data ASC, hora ASC";
                break;
            case 'umidade_ar':
                $select_tabela = "SELECT data, hora, umidade_ar FROM registros WHERE data BETWEEN '$data_inicial' AND '$data_final' ORDER BY data ASC, hora ASC";
                break;
            case 'umidade_solo':
                $select_tabela = "SELECT data, hora, umidade_solo FROM registros WHERE data BETWEEN '$data_inicial' AND '$data_final' ORDER BY data ASC, hora ASC";
                break;
            case 'irrigacao':
                $select_tabela = "SELECT data, hora, irrigacao FROM registros WHERE data BETWEEN '$data_inicial' AND '$data_final' ORDER BY data ASC, hora ASC";
                break;
            default:  
                $select_tabela = "SELECT data, hora, temperatura, umidade_ar, umidade_solo, irrigacao FROM registros WHERE data BETWEEN '$data_inicial' AND '$data_final' ORDER BY data ASC, hora ASC";
                break;
        } 

        $resultado = mysqli_query($con, $select_tabela);
        $resultado_array = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        

        foreach($resultado_array as $linha) {
            $labels_dh[] = date('d/m/Y H:i', strtotime($linha['data'] . ' ' . $linha['hora']));

            if($tipo_tabela === 'tudo'){
                $valores_temperatura[] = (float)($linha['temperatura']);  
                $valores_umidade_ar[] = (float)($linha['umidade_ar']);  
                $valores_umidade_solo[] = (float)($linha['umidade_solo']);
                $valores_irrigacao[] = (float)($linha['irrigacao'] ?? 0);
            } else{
            
            switch($tipo_tabela) {

                case 'temperatura':
                    $valores[] = (float)$linha['temperatura'];
                    break;
                case 'umidade_ar':
                    $valores[] = (float)$linha['umidade_ar'];
                    break;
                case 'umidade_solo':
                    $valores[] = (float)$linha['umidade_solo'];
                    break;
                case 'irrigacao':
                    $valores[] = (float)$linha['irrigacao']; 
                    break;
            }
        }
    }
    
}

$con = mysqli_connect('localhost', 'root', '1234', 'greenduino_db');
$buscaNome = mysqli_query($con, "SELECT nome_arduino FROM arduino; ");
$resultado = mysqli_fetch_assoc($buscaNome);
$nomeArduino = $resultado['nome_arduino'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pages/style_estufa.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../assets/fonts.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@2.2.1"></script> <!-- plugin de anotação -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@2.0.0"></script> <!-- plugin de zoom e pan -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script> <!-- plugin de data labels -->
    <script src="../js/pages/script.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>DashBoard - Estufa</title>
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
          <li class="anderson"><a href="../public/index.php">Início</a></li>
          <li class="anderson"><a href="estufa.php">Estufa</a></li>
          <li class="anderson"><a href="sobre.html">Sobre</a></li>
          <li class="anderson"><a href="contato.html" class="active">Contato</a></li>
        </ul>
      </nav>
      <div class="botoes-usuario">
        <a href="sair.php" class="botao primario">Sair</a>
      </div>
    </div>
  </header>

  <main>  
    <div class="titulo-voltar">     
    <a href="pagina_menu.php" class="botao-voltar">
        <img src="../assets/images/logos/seta.png" alt="Voltar" />
    </a>

    <h1>Estufa</h1>
</div>
    <div class="div-conteudo-info-form-grafico"> <!-- [1] início .div-conteudo-info-form-grafico -->
        
      <div id="conteudo-planta" class="conteudo-planta"> <!-- [2] início .conteudo-planta -->

        <div class="div-conteudo"> <!-- [3] início .div-conteudo -->

        <div class="caixa-texto-media">
            <div class="div-img-titulo"> <!-- [4] início .div-img -->
                <img class="imagem" src="../assets/images/pictures/planta.png" />
               </div> <!--[4] fechamento .div-img -->

                <div class="texto"> <!-- [5] início .texto -->
                    <p id="nome-planta"><?php echo $nomeArduino; ?></p>
                    <p>Espécie da planta: Alface</p>
                    <p>Temperatura Ideal: 10°C - 24°C</p>
                    <p>Solo Ideal: 60% - 80%</p>
                    <p>Umidade Ideal: 60% - 70%</p>
                </div> <!-- [5] fechamento .texto -->
                </div>
            
            <ul>
                <p id="dica">Dicas de cuidado:</p>
                <li>O alface se desenvolve melhor com luz indireta ou sol suave, evite sol direto e forte, principalmente à tarde.</li>
                <li>O melhor local para o cultivo é em uma varanda iluminada, janela ou quintal com sombra parcial.</li>
                <li>O recomendado é uso de adubo orgânico, além de um vaso com pelo menos 15 cm de profundidade.</li>
                <li>A colheita ocorre entre 30 a 60 dias após o cultivo.</li>
            </ul>
        </div> <!-- [3] fechamento .div-conteudo -->

    </div> <!-- [2] fechamento .conteudo-planta -->


   
    <div class="secao-form">  <!-- [6] início .secao-form -->
        <form action="estufa.php" method="POST">
            <div class="div-label"> <!-- [7] início .div-label -->
                <label for="data-inicial">Selecione a Data inicial</label>
                <input type="date" name="data_inicial" id="data-inicial" value="<?php echo $data_inicial; ?>">

                <label for="data-final">Selecione a Data final (opcional)</label>
                <input type="date" name="data_final" id="data-final" value="<?php echo $data_final; ?>">
                <button id="botao-pesquisar" type="submit" name="botao-selecao" value="tudo">Pesquisar</button>
            </div> <!-- [7] fechamento .div-label -->

            
            <div class="div-botao"> <!-- [8] início .div-botao -->
                <button type="submit" name="botao-selecao" value="tudo">Todas as tabelas</button>
                <button type="submit" name="botao-selecao" value="temperatura">Temperatura </button>
                <button type="submit" name="botao-selecao" value="umidade_ar">Umidade do Ar </button>
                <button type="submit" name="botao-selecao" value="umidade_solo">Umidade do Solo </button>
                <button type="submit" name="botao-selecao" value="irrigacao">Irrigação </button>
            </div> <!-- [8] fechamento .div-botao -->
        </form>
    </div> <!-- [6] fechamento .secao-form -->


     <div class="div-grafico"> <!-- [9] início .div-grafico -->
        <div id="div-botao-grafico" class="div-botao-grafico"> <!-- [10] início .div-botao-grafico -->
            <button id="botao-grafico" value="line" onclick="tipoGrafico('line');">Linha</button>
            <button id="botao-grafico" value="area" onclick="tipoGrafico('area');">Área</button>
            <button id="botao-grafico" value="bar" onclick="tipoGrafico('bar');">Barra</button>
            <button id="botao-grafico" value="scatter" onclick="tipoGrafico('scatter');">Scatter</button>
        </div> <!-- [10] fechamento .div-botao-grafico -->

        <!-- [11] início .grafico-tabela -->
        <div id="grafico-tabela" class="grafico-tabela">
            <canvas id="canva-grafico" class="canva-grafico" width="600" height="200"></canvas>
        </div> <!-- [11] fechamento .grafico-tabela -->
    </div> <!-- [9] fechamento .div-grafico -->
</div> <!-- [1] fechamento .div-conteudo-info-form-grafico -->


<?php

     if($exibir_tabela) :?>
     <?php if(!empty($mensagem_erro)) : ?>
        <div class="mensagem-erro"><?php echo $mensagem_erro ?> </div>
      <?php else: ?>

            <div class="secao-grafico">
            <table id="tabela-dados" class="tabela-dados">
                <tr>
                    <th> Data 📆</th>
                    <th> Hora ⌚</th>
                    <?php 
                    switch($tipo_tabela){
                        case 'tudo':
                        echo '<th>Temperatura (°C) 🌡️</th><th>Umidade do Ar 🌫️ (%)</th><th>Umidade do Solo 🌱 (%)</th><th>Irrigação 💧</th>'; 
                        break;

                        case 'temperatura':
                        echo '<th>Temperatura 🌡️(°C)</th>'; 
                        break;

                        case 'umidade_ar':
                        echo '<th>Umidade do Ar 🌫️ (%)</th>';
                        break;
                        
                        case 'umidade_solo':
                        echo '<th> Umidade do Solo 🌱(%)</th>';
                        break;

                        case 'irrigacao': 
                        echo '<th>Irrigação 💧 </th>';
                        break;

                        default:
                        echo '<th>Temperatura 🌡️ (°C)</th><th>Umidade do Ar 🌫️ (%)</th><th>Umidade do Solo 🌱 (%)</th><th>Irrigação< 💧/th>'; 
                        break;
                    }
                    ?>
            </tr>
            
        <?php

         foreach($resultado_array as $exibirInfo): ?>

           <tr>
                <td> <?php echo date('d/m/Y', strtotime($exibirInfo['data'])) ;?> </td>
                <td> <?php echo $exibirInfo['hora'] ;?></td>
                    <?php 
                       switch($tipo_tabela) {
                            case 'tudo':

                                $infoIrrigacao = $exibirInfo['irrigacao'] == 1 ? 'Sim' : 'Não';
                                echo '<td>' .$exibirInfo['temperatura'] .'°C</td>'
                                     .'<td>' .$exibirInfo['umidade_ar'] .'%</td>'
                                     .'<td>' .$exibirInfo['umidade_solo'] . '% </td>'
                                     .'<td>' .$infoIrrigacao .'</td>';
                                break;

                            case 'temperatura':
                                echo '<td>' .$exibirInfo['temperatura'] .'°C </td>';
                                break;
                            
                            case 'umidade_ar':
                                echo '<td>' .$exibirInfo['umidade_ar'] .'% </td>';
                                break;

                            case 'umidade_solo':
                                echo '<td>' .$exibirInfo['umidade_solo'] .'% </td>';
                                break;

                            case 'irrigacao':
                                $infoIrrigacao = $exibirInfo['irrigacao'] == 1 ? 'Sim' : 'Não';
                                echo '<td>' .$infoIrrigacao .' </td>';
                                break;

                        }
                        ?>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>

        <?php endif; ?>
    <?php endif; ?>


<?php if($exibir_tabela && !empty($labels_dh)) : ?>
<script>

    
     const dadosPHP = {
             labels: <?php echo json_encode($labels_dh);?>,  
             valores: <?php echo json_encode($valores);?>,
             tipo: <?php echo json_encode($tipo_tabela);?>,
             valores_temperatura:<?php echo json_encode($valores_temperatura);?>,
             valores_umidade_solo:<?php echo json_encode($valores_umidade_solo);?>,
             valores_umidade_ar:<?php echo json_encode($valores_umidade_ar);?>,
             valores_irrigacao:<?php echo json_encode($valores_irrigacao);?>

             };

    </script>
    <script src="../js/pages/estufa.js"> </script>
    
 <?php endif; ?>
    </main>
</body>
</html>
<?php

} else{
    header('Location: login.php');
    exit;
}
?>
