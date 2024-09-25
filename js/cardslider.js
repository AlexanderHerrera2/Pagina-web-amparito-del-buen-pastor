document.addEventListener('DOMContentLoaded', (eventt) => {
const cardSlider = document.querySelector('.card-slider');
const prevButton = document.querySelector('.prevvv');
const nextButton = document.querySelector('.nexttt');

$('.card-slider-nav .prevvv').on('click', function() {
  $('.card-slider').slick('slickPrev');
});

$('.card-slider-nav .nexttt').on('click', function() {
  $('.card-slider').slick('slickNext');
});
// Verifica que los elementos existen antes de agregar los event listeners
if (cardSlider && prevButton && nextButton) {
  prevButton.addEventListener('click', () => {
    cardSlider.scrollLeft -= 300; // Ancho fijo de cada card
  });

  nextButton.addEventListener('click', () => {
    cardSlider.scrollLeft += 300; // Ancho fijo de cada card
  });
}
});
