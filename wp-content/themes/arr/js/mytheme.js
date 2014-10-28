$(document).ready(function() {
  showMobileNav();
  $('.intro').columnize({ columns: 2, buildOnce: true });
  // if($('body').hasClass('home')) {
  //   scrollToLandingNav();
  // }
  $('.case-wrap .case-cont:nth-of-type(2n+2)').after('<div class="line"></div>');
 smoothScroll();
 launchSliders();

});

$(window).resize(function() {
  if ($(window).width() > 1260) {
    $('#mobile-nav, #hamburger, #mobile-close').hide();
  } else if ($(window).width() <= 1260 && $('#mobile-close').css('display') == 'block') {   
    $('#hamburger').hide();
  } else {
    $('#hamburger').show();
  }


});

function launchSliders() {
  $('.flexslider ul').addClass('slides')
  $('.single-service .flexslider').flexslider({
    directionNav: true,
    controlNav: false,
    animation: 'fade',
    slideshow: false,
    prevText:' ',
    nextText: ''
  })
  $('.adoption .flexslider.carousel').flexslider({
    animation: "slide",
    controlNav: false,
    directionNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 100,
    itemMargin: 5,
    asNavFor: '.adoption .flexslider.slider'
  })
  $('.adoption .flexslider.slider').flexslider({
    animation: "fade",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    prevText:' ',
    nextText: '',
    directionNav: false,
    sync: '.adoption .flexslider.carousel'
  })

}

function responsiveColumnizer() {
  if ($(window).width() > 1172) {
    $('.intro').columnize({ columns: 2 });
  } else {
    $('.column > *').unwrap();
    // $('.intro').columnize({ columns: 1 });
  }
}

function showMobileNav() {
  $('#hamburger').on({
    click: function() {
      $('#mobile-nav').slideToggle();
      $(this).hide();
      $('#mobile-close').show();
    }
  });
  $('#mobile-close').on({
    click: function() {
      $('#mobile-nav').slideToggle();
      $(this).hide();
      $('#hamburger').show();
    }
  });

}

function scrollToLandingNav() { 
  $('.menu-main-nav-container li a[title]').each(function() {
    var ext = $(this).attr('title');
    $(this).attr('rel', ext);
    $(this).removeAttr('title');
  });
  $('.menu-main-nav-container li a').each(function() {
    var id = $(this).attr('rel');
    if (this.text !== 'Case Files' && this.text !== 'Donate') {
      $(this).on({
        click: function(e) { e.preventDefault(); $('html,body').unbind().animate({scrollTop: $('#' + id).offset().top-75},'slow');}
      });
    }
  });
}

function smoothScroll() {
  $('.services .row a').click(function(){
      $('html, body').animate({
          scrollTop: $( $.attr(this, 'href') ).offset().top
      }, 400);
      return false;
  });
}



