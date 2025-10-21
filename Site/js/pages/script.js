window.addEventListener('scroll', function() {
  const navbar = document.querySelector('.barra-navegacao');
  
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});
window.addEventListener('scroll', function() {
  const secao = document.querySelector('.secao-layout');
  const posicao = secao.getBoundingClientRect().top;
  const alturaJanela = window.innerHeight;
  
  if (posicao < alturaJanela - 100) {
    secao.classList.add('visible');
  }
});
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const indicadores = document.querySelectorAll('.indicador');
const totalSlides = slides.length;
let autoSlideInterval;
function showSlide(index) {
  slides.forEach(slide => slide.classList.remove('ativo'));
  indicadores.forEach(ind => ind.classList.remove('ativo'));
  
  slides[index].classList.add('ativo');
  indicadores[index].classList.add('ativo');
  
  currentSlide = index;
}
function nextSlide() {
  let next = currentSlide + 1;
  if (next >= totalSlides) next = 0;
  showSlide(next);
}
function prevSlide() {
  let prev = currentSlide - 1;
  if (prev < 0) prev = totalSlides - 1;
  showSlide(prev);
}
function startAutoSlide() {
  autoSlideInterval = setInterval(nextSlide, 3000);
}
document.querySelector('.btn-next').addEventListener('click', () => {
  nextSlide();
  resetAutoSlide();
});
document.querySelector('.btn-prev').addEventListener('click', () => {
  prevSlide();
  resetAutoSlide();
});
indicadores.forEach((ind, index) => {
  ind.addEventListener('click', () => {
    showSlide(index);
    resetAutoSlide();
  });
});
const carrossel = document.querySelector('.carrossel');
carrossel.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
carrossel.addEventListener('mouseleave', startAutoSlide);
function resetAutoSlide() {
  clearInterval(autoSlideInterval);
  startAutoSlide();
}
showSlide(0);
startAutoSlide();
