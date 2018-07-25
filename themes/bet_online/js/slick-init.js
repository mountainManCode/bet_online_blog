(function($) {
  $('#hero-article').slick({
    // respondTo: 'window',
    // mobileFirst: true,
    arrows: false,
    dots: true,
    lazyLoad: 'ondemand',
    pauseOnDotsHover: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    focusOnSelect: true,
    focusOnChange: true,
    infinite: true,
    swipe: true

    // responsive: [
    //   {
    //     breakpoint: 991,
    //     settings: {
    //       swipe: false
    //     }
    //   }
    //   //   },
    //   //   {
    //   //     breakpoint: 300,
    //   //     settings: 'unslick' // destroys slick
    //   //   }
    // ]
  });

  $('#slider-nav').slick({
    respondTo: 'window',
    accessibility: true,
    // mobileFirst: true,
    arrows: false,
    // slidesToShow: 1,
    // slidesToScroll: 1,

    asNavFor: '#hero-article',
    focusOnSelect: true,
    focusOnChange: true,
    infinite: true,
    lazyLoad: 'ondemand',
    slidesToShow: 4,
    slidesToScroll: 4,
    swipe: false,
    vertical: true

    // responsive: [
    // {
    // breakpoint: 991,
    // settings:
    // {
    //   asNavFor: '#hero-article',
    //   focusOnSelect: true,
    //   focusOnChange: true,
    //   infinite: true,
    //   lazyLoad: 'ondemand',
    //   // pauseOnDotsHover: true,
    //   slidesToShow: 4,
    //   slidesToScroll: 4,
    //   swipe: false,
    //   vertical: true
    // }
    // }
    //   {
    //     breakpoint: 768,
    //     settings: 'unslick'
    //   }
    // ]
  });

  // $(window).on('resize orientationchange', function() {
  //   $('.#slider-nav').resize; //slick('resize');
  // });

  $('#events-wrapper').slick({
    arrows: true,
    focusOnSelect: false,
    mobileFirst: true,
    lazyLoad: 'ondemand',
    respondTo: 'window',
    slidesToShow: 1,
    slidesToScroll: 1,
    swipe: true,

    responsive: [
      {
        breakpoint: 499,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4
        }
      }
    ]
  });
})(jQuery);
