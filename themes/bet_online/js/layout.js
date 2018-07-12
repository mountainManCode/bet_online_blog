/**
 * File layout.js.
 *
 * Handles toggling the navigation menu.
 */

// $(document).ready(function() {
(function($) {
  // NAV
  $('.layout-header-session-balance').click(function() {
    $('.layout-header-session-popdown').toggleClass(
      'layout-header-session-popdown--active'
    );
  });

  // mobile nav
  function setActiveContent(a) {
    $('.nav-body').removeClass('active-nav-content');
    var activeClass = '.' + 'nav-' + a;
    $(activeClass).addClass('active-nav-content');
  }
  //toggle mobile nav on-off
  $('.logo-round').click(function() {
    $('#layout-mobile-nav').addClass('mobile-nav-active');
    setActiveContent('home');
    $('.logo-wrapper')
      .parent()
      .removeClass('active-nav');
  });
  $('.mobile-nav-close').click(function() {
    $('#layout-mobile-nav').removeClass('mobile-nav-active');
  });

  // animate down-up (changing nav body content)
  $('.logo-wrapper').click(function() {
    $('.logo-wrapper')
      .parent()
      .removeClass('active-nav');
    $(this)
      .parent()
      .addClass('active-nav');
    $('.mobile-nav-content').removeClass('mobile-nav-active');
    var activeClass = $(this).attr('data-nav');
    setActiveContent(activeClass);
    $('.mobile-nav-content').addClass('mobile-nav-active');
    $('#layout-mobile-nav').addClass('mobile-nav-active');
  });

  // shrink nav on scroll
  $(window).scroll(function() {
    if ($(document).scrollTop() > 30) {
      $('.layout-header').addClass('shrink');
    } else {
      $('.layout-header').removeClass('shrink');
    }
  });
  // img tags converted to svg
  /*
* Replace all SVG images with inline SVG
*/
  $(function() {
    $('img.svg').each(function() {
      var $img = $(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');
      $.get(
        imgURL,
        function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = $(data).find('svg');
          // Add replaced image's ID to the new SVG
          if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
          }
          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');
          // Replace image with new SVG
          $img.replaceWith($svg);
        },
        'xml'
      );
    });
  });
})(jQuery);
