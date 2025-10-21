window.addEventListener('scroll', function() {
  const secoes = document.querySelectorAll('.secao-sobre, .secao-equipe');
  secoes.forEach(secao => {
    const posicao = secao.getBoundingClientRect().top;
    const alturaJanela = window.innerHeight;
    if (posicao < alturaJanela - 100) {
      secao.classList.add('visible');
    }
  });
});
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});
const currentPage = window.location.pathname.split('/').pop() || 'index.html';
document.querySelectorAll('.links-navegacao a').forEach(link => {
  if (link.getAttribute('href') === currentPage) {
    link.classList.add('active');
  }
});
