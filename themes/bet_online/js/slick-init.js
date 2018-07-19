(function($) {
  $('.hero-article').slick({
    arrows: false,
    // asNavFor: '.slider-nav',
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    dots: true
    // appendDots:
  });
  // have both connect to the same class, and css the info
  $('.slider-nav').slick({
    arrows: false,
    asNavFor: '.hero-article',
    // adaptiveHeight: true,
    dots: false,
    focusOnSelect: true,
    infinite: true,
    lazyLoad: 'ondemand',
    pauseOnDotsHover: true,
    // rows: 1,
    // slidePerRow: 4,
    slidesToShow: 4,
    slidesToScroll: 4,
    swipe: false,
    // centerMode: true,
    // centerPadding: '20px',
    vertical: true
    // fade: true,
    // cssEase: 'linear'

    // the magic
    // responsive: [
    //   {
    //     breakpoint: 1024,
    //     settings: {
    //       slidesToShow: 3,
    //       infinite: true
    //     }
    //   },
    //   {
    //     breakpoint: 600,
    //     settings: {
    //       slidesToShow: 2,
    //       dots: true
    //     }
    //   },
    //   {
    //     breakpoint: 300,
    //     settings: 'unslick' // destroys slick
    //   }
    // ]
  });
})(jQuery);
