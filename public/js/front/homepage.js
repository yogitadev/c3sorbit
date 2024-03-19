/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************!*\
  !*** ./resources/js/front/pages/homepage.js ***!
  \**********************************************/
var owl1 = $('.hero_slider');
owl1.owlCarousel({
  margin: 0,
  loop: true,
  dots: true,
  nav: false,
  autoplay: false,
  items: 5,
  responsive: {
    0: {
      items: 1,
      dots: true,
      nav: false
    },
    600: {
      items: 1,
      dots: true,
      nav: false
    },
    767: {
      items: 1,
      dots: true,
      nav: false
    },
    992: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});
var owl2 = $('.ServiceSlider');
owl2.owlCarousel({
  margin: 20,
  loop: true,
  dots: false,
  nav: true,
  autoplay: false,
  items: 5,
  responsive: {
    0: {
      items: 2,
      dots: true,
      nav: false
    },
    600: {
      items: 3,
      dots: true,
      nav: false
    },
    767: {
      items: 3,
      dots: true,
      nav: false
    },
    992: {
      items: 3
    },
    1000: {
      items: 3
    }
  }
});
var owl3 = $('.ProductSlider');
owl3.owlCarousel({
  margin: 0,
  loop: false,
  dots: false,
  nav: true,
  items: 5,
  responsive: {
    0: {
      items: 1,
      dots: true,
      nav: false
    },
    600: {
      items: 2,
      dots: true,
      nav: false
    },
    767: {
      items: 3,
      dots: true,
      nav: false
    },
    992: {
      items: 3
    },
    1279: {
      items: 4
    }
  }
});
/******/ })()
;