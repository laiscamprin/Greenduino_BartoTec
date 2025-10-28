# Greenduino_BartoTec
Integrantes: Laís Camprincoli, Beatriz Mota e Francisco Justo

O GreenDuino é um projeto que une educação, sustentabilidade e tecnologia, criado com o objetivo de tornar a agricultura mais inteligente, acessível e sustentável. Desenvolvido por estudantes da Escola Técnica, o projeto teve início com uma prototipação e evoluiu para uma solução completa, com estufa automatizada, monitoramento via sensores* e plataforma web interativa. 

 

Descrição do Projeto: 

O GreenDuino surgiu como uma proposta educativa dentro da cultura maker, incentivando o aprendizado prático de automação e programação. A partir de um protótipo inicial, o projeto ganhou destaque entre educadores e alunos, que motivaram sua expansão para um sistema completo com site e dashboard integrados. 

O sistema monitora a temperatura, umidade do ar e umidade do solo através de sensores conectados a um Arduino, que processa os dados e os exibe em tempo real em um display e em uma plataforma online.   

O site permite ao usuário cadastrar suas plantas e estufas, visualizar gráficos diários, semanais e mensais, além de ajustar a irrigação automatizada conforme a necessidade da planta e do solo, reduzindo o desperdício de água. 

 

 Objetivos: 

- Promover a educação tecnológica e sustentável de forma acessível.   

- Incentivar a cultura maker e o uso do Arduino em projetos práticos.   

- Facilitar o cultivo automatizado de plantas para pequenos agricultores e hortas urbanas.   

- Reduzir o desperdício de água através de um sistema inteligente de irrigação.   

- Tornar o acompanhamento das plantas interativo e intuitivo por meio de um site. 

Tecnologias Utilizadas: 

 Front-end: 

- HTML5 — estrutura das páginas   

- CSS3— estilização (arquivos: main.css, contato.css, sobre.css, styles.css)   

- JavaScript — scripts de interação e controle (contato.js, script.js, sobre.js)   

 

Back-end: 

- PHP — integração com o banco de dados e comunicação com o Arduino   

- Python— utilizado na página do Dashboard para análise de dados   

- MySQL— armazenamento das informações coletadas pelos sensores   

 

Hardware: 

- Arduino Uno  

- Sensores de temperatura e umidade (solo e ar); 

- Display LCD;  

- Bomba de aquário e reservatório de água;   

- Mangueira de irrigação;   

 

Funcionamento: 

1. Os sensores captam temperatura e umidade do solo e do ar.   

2. O Arduino, programado em lógica if/else, analisa os dados e decide quando irrigar.   

3. Quando os níveis estão abaixo do ideal, o sistema: 

   - Aciona a bomba d’água automaticamente;   

   - Exibe alertas no display LCD;   

   - Envia as informações ao site via PHP e MySQL.   

4. O Dashboard online mostra gráficos e alertas em tempo real.   

 

Dashboard e Site: 

A plataforma web permite que o usuário: 

- Cadastre plantas e estufas;   

- Visualize gráficos de temperatura e umidade;   

- Configure ajustes automáticos de irrigação;  

- Receba alertas de solo seco ou excesso de água;   

- Gerencie o sistema com interface simples e acessível. 

 

Impacto Social, Econômico e Ambiental: 

O GreenDuino não é apenas uma solução tecnológica, mas um movimento educativo voltado para: 

- Democratizar o acesso à agricultura sustentável; 

- Reduzir o consumo de água e energia para estimular o aprendizado prático de automação; 

- Promover a inovação no cultivo urbano e doméstico. 

 

Estrutura da Estufa: 

- Base com terra e mudas; 

- Sensores de temperatura e umidade; 

- Display LCD informativo; 

- Reservatório de água e bomba conectada à mangueira fina; 

- Arduino com código de controle automatizado. 

 

Futuras Melhorias: 

- Implementação de aplicativo mobile para monitoramento remoto;  

- Integração com inteligência artificial para prever necessidades de irrigação;  

 

Projeto desenvolvido por estudantes do curso Técnico em Informática para Internet, com apoio de professores da Escola Técnica e mentores da área de tecnologia e sustentabilidade. 



 
