(function($) {
  $('#hero-article').slick({
    arrows: false,
    dots: true,
    // asNavFor: '.slider-nav',
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  });
  // have both connect to the same class, and css the info
  $('#slider-nav').slick({
    arrows: false,
    asNavFor: '#hero-article',
    // autoplay: true,
    // autoplaySpeed: 3000,
    focusOnSelect: true,
    infinite: true,
    lazyLoad: 'ondemand',
    pauseOnDotsHover: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    swipe: false,
    vertical: true
    // appendDots: $('.append-dots'),
    // dots: true,
    // dotsClass: 'custom-dots'

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
