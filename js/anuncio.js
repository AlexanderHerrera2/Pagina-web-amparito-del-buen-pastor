// Obtener el contenedor del anuncio
const anuncioContainer = document.getElementById('anuncio-container');

// Detectar el clic fuera de la imagen
anuncioContainer.addEventListener('click', (event) => {
    // Verifica si el clic no fue en la imagen
    if (event.target === anuncioContainer) {
        anuncioContainer.style.display = 'none'; // Ocultar el contenedor
    }
});
