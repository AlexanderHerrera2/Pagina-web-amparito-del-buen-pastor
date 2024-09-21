document.addEventListener('DOMContentLoaded', (event) => {
    const myslide = document.querySelectorAll('.myslide'),
          dot = document.querySelectorAll('.dot');
    let counter = 1;
    slidefun(counter);

    let timer = setInterval(autoSlide, 8000);

    function autoSlide() {
        counter++;
        slidefun(counter);
    }

    function plusSlides(n) {
        counter += n;
        slidefun(counter);
        resetTimer();
    }

    function currentSlide(n) {
        counter = n;
        slidefun(counter);
        resetTimer();
    }

    function resetTimer() {
        clearInterval(timer);
        timer = setInterval(autoSlide, 8000);
    }

    function slidefun(n) {
        let i;
        for (i = 0; i < myslide.length; i++) {
            myslide[i].classList.remove('active');
        }
        for (i = 0; i < dot.length; i++) {
            dot[i].className = dot[i].className.replace(' active', '');
        }
        if (n > myslide.length) {
            counter = 1;
        }
        if (n < 1) {
            counter = myslide.length;
        }
        myslide[counter - 1].classList.add('active');
        dot[counter - 1].className += " active";
    }

    document.querySelector('.prevv').addEventListener('click', () => plusSlides(-1));
    document.querySelector('.nextt').addEventListener('click', () => plusSlides(1));
    dot.forEach((d, index) => {
        d.addEventListener('click', () => currentSlide(index + 1));
    });
});
