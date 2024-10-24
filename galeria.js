document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = lightbox.querySelector('img');
    const close = lightbox.querySelector('.lightbox-close');
    const prev = lightbox.querySelector('.lightbox-prev');
    const next = lightbox.querySelector('.lightbox-next');
    const galleryImages = document.querySelectorAll('.box-img img ');

    let currentImageIndex = 0;

    galleryImages.forEach((img, index) => {
        img.addEventListener('click', () => {
            currentImageIndex = index;
            lightboxImg.src = img.src;
            lightbox.classList.add('active');
        });
    });

    close.addEventListener('click', () => {
        lightbox.classList.remove('active');
    });

    prev.addEventListener('click', () => {
        currentImageIndex--;
        if (currentImageIndex < 0) {
            currentImageIndex = galleryImages.length - 1;
        }
        lightboxImg.src = galleryImages[currentImageIndex].src;
    });

    next.addEventListener('click', () => {
        currentImageIndex++;
        if (currentImageIndex >= galleryImages.length) {
            currentImageIndex = 0;
        }
        lightboxImg.src = galleryImages[currentImageIndex].src;
    });
});