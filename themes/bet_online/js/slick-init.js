(function($) {
  $('#hero-article').slick({
    arrows: false,
    dots: true,
    appendDots: '.article__content',
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
  });

  $('#slider-nav').slick({
    asNavFor: '#hero-article',
    autoplay: true,
    autoplaySpeed: 3500,
    respondTo: 'window',
    mobileFirst: true,
    arrows: false,
    lazyLoad: 'ondemand',
    slidesToShow: 1,
    slidesToScroll: 1,
    swipe: true,
    vertical: true,

    responsive: [
      {
        breakpoint: 991,
        settings: {
          autoplay: false,
          asNavFor: '#hero-article',
          accessibility: true,
          lazyLoad: 'ondemand',
          focusOnSelect: true,
          focusOnChange: true,
          slidesToShow: 4,
          slidesToScroll: 4,
          swipe: false,
          vertical: true
        }
      }
    ]
  });

  /****** CAROUSEL FOR VIDEOS FOLD *********/
  $('#events-wrapper').slick({
    arrows: true,
    focusOnSelect: false,
    infinite: false,
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

  /****** CAROUSEL FOR VIDEOS FOLD *********/
  $('#videos-list').slick({
    arrows: true,
    focusOnSelect: false,
    infinite: false,
    mobileFirst: true,
    lazyLoad: 'ondemand',
    respondTo: 'window',
    slidesToShow: 1,
    slidesToScroll: 1,
    swipe: true,
    speed: 300,

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
