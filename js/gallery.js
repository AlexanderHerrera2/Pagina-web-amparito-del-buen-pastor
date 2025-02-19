// script.js

// Seleccionamos los elementos del DOM
const modal = document.getElementById('imageModal');
const modalImage = document.getElementById('modalImage');
const caption = document.getElementById('caption');
const closeModal = document.querySelector('.close');
const galleryItems = document.querySelectorAll('.gallery-item');

// Función para abrir el modal
function openModal(event) {
  const clickedImage = event.target; // Imagen en la que se hizo clic
  modal.style.display = 'flex'; // Mostrar el modal
  modalImage.src = clickedImage.src; // Asignar la imagen al modal
  caption.textContent = clickedImage.alt; // Asignar la descripción (alt)
}

// Función para cerrar el modal
function closeModalHandler() {
  modal.style.display = 'none'; // Ocultar el modal
}

// Función para cerrar el modal al hacer clic fuera de la imagen
function closeOnOutsideClick(event) {
  if (event.target === modal) {
    closeModalHandler();
  }
}

// Añadimos los event listeners
galleryItems.forEach(item => {
  item.addEventListener('click', openModal); // Abrir modal al hacer clic en una miniatura
});

closeModal.addEventListener('click', closeModalHandler); // Cerrar modal al hacer clic en la "X"
window.addEventListener('click', closeOnOutsideClick); // Cerrar modal al hacer clic fuera de la imagen

// Opcional: Cerrar modal al presionar la tecla "Escape"
window.addEventListener('keydown', event => {
  if (event.key === 'Escape') {
    closeModalHandler();
  }
});
