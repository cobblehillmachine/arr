$(document).ready(function() {
  showMobileNav();
  $('.intro').columnize({ columns: 2, buildOnce: true });
  if($('body').hasClass('home')) {
    scrollToLandingNav();
  }
  $('.case-wrap .case-cont:nth-of-type(2n+2)').after('<div class="line"></div>');
 

});

$(window).resize(function() {
  if ($(window).width() > 1172) {
    $('#mobile-nav, #hamburger, #mobile-close').hide();
  } else if ($(window).width() <= 1172 && $('#mobile-close').css('display') == 'block') {   
    $('#hamburger').hide();
  } else {
    $('#hamburger').show();
  }


});

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


