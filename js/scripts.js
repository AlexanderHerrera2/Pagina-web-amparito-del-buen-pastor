function getOffSet() {
  var _offset = 450;
  var windowHeight = window.innerHeight;

  if (windowHeight > 500) {
      _offset = 400;
  }
  if (windowHeight > 680) {
      _offset = 300;
  }
  if (windowHeight > 830) {
      _offset = 210;
  }

  return _offset;
}

function setParallaxPosition($doc, multiplier, $object) {
  var offset = getOffSet();
  var from_top = $doc.scrollTop(),
      bg_css = 'center ' + (multiplier * from_top - offset) + 'px';
  $object.css({ "background-position": bg_css });
}

var background_image_parallax = function ($object, multiplier, forceSet) {
  multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
  multiplier = 1 - multiplier;
  var $doc = $(document);

  if ($object.length) {
      if (forceSet) {
          setParallaxPosition($doc, multiplier, $object);
      } else {
          $(window).scroll(function () {
              setParallaxPosition($doc, multiplier, $object);
          });
      }
  } else {
      console.warn('Target element not found for selector:', $object.selector || $object);
  }
};

var background_image_parallax_2 = function ($object, multiplier) {
  multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
  multiplier = 1 - multiplier;
  var $doc = $(document);

  if ($object.length) {
      $object.css({ "background-attachment": "fixed" });

      $(window).scroll(function () {
          if ($(window).width() > 768) {
              var firstTop = $object.offset().top;
              var pos = $(window).scrollTop();
              var yPos = Math.round((multiplier * (firstTop - pos)) - 186);

              var bg_css = 'center ' + yPos + 'px';

              $object.css({ "background-position": bg_css });
          } else {
              $object.css({ "background-position": "center" });
          }
      });
  } else {
      console.warn('Target element not found for selector:', $object.selector || $object);
  }
};

$(function () {
  var $tmParallax = $(".tm-parallax");
  var $contact = $("#contact");
  var $testimonials = $("#testimonials");

  if ($tmParallax.length) {
      background_image_parallax($tmParallax, 0.30, false);
  } else {
      console.warn('Element .tm-parallax not found');
  }

  if ($contact.length) {
      background_image_parallax_2($contact, 0.80);
  } else {
      console.warn('Element #contact not found');
  }

  if ($testimonials.length) {
      background_image_parallax_2($testimonials, 0.80);
  } else {
      console.warn('Element #testimonials not found');
  }

  window.addEventListener('resize', function () {
      if ($tmParallax.length) {
          background_image_parallax($tmParallax, 0.30, true);
      }
  }, true);

  $(window).scroll(function (e) {
      if ($(document).scrollTop() > 120) {
          $('.tm-navbar').addClass("scroll");
      } else {
          $('.tm-navbar').removeClass("scroll");
      }
  });

  $('#tmNav a').on('click', function () {
      $('.navbar-collapse').removeClass('show');
  });

  $('#tmNav').singlePageNav({
      'easing': 'easeInOutExpo',
      'speed': 600
  });

  $("a").on('click', function (event) {
      if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          var target = $(hash);

          if (target.length) {
              $('html, body').animate({
                  scrollTop: target.offset().top
              }, 600, 'easeInOutExpo', function () {
                  window.location.hash = hash;
              });
          } else {
              console.warn('Target element not found for hash:', hash);
          }
      }
  });

  $('.tm-gallery').magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery: { enabled: true }
  });

  $('.tm-testimonials-carousel').slick({
      dots: true,
      prevArrow: false,
      nextArrow: false,
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
          {
              breakpoint: 992,
              settings: {
                  slidesToShow: 2
              }
          },
          {
              breakpoint: 768,
              settings: {
                  slidesToShow: 2
              }
          },
          {
              breakpoint: 480,
              settings: {
                  slidesToShow: 1
              }
          }
      ]
  });

  $('.tm-gallery').slick({
      dots: true,
      infinite: false,
      slidesToShow: 5,
      slidesToScroll: 2,
      responsive: [
          {
              breakpoint: 1199,
              settings: {
                  slidesToShow: 4,
                  slidesToScroll: 2
              }
          },
          {
              breakpoint: 991,
              settings: {
                  slidesToShow: 3,
                  slidesToScroll: 2
              }
          },
          {
              breakpoint: 767,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
              }
          },
          {
              breakpoint: 480,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
              }
          }
      ]
  });
});
