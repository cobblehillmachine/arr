$(document).ready(function() {
  showMobileNav();
  $('.intro').columnize({ columns: 2 });
  if(window.location.href == "http://arr.local"){
    scrollToLandingNav();
  }
  $('.case-wrap .case-cont:nth-of-type(2n+2)').after('<div class="line"></div>');
 

});

$(window).resize(function() {
  if ($(window).width() > 1099) {
    $('#mobile-nav, #hamburger, #mobile-close').hide();
  } else if ($(window).width() <= 1099 && $('#mobile-close').css('display') == 'block') {   
    $('#hamburger').hide();
  } else {
    $('#hamburger').show();
  }

});


function setInputFieldFunctions(){
	$('input, textarea').each(function(){
	    var $this = $(this);
	    $this.data('placeholder', $this.attr('placeholder'))
	         .focus(function(){$this.removeAttr('placeholder');})
	         .blur(function(){$this.attr('placeholder', $this.data('placeholder'));});
	});
}

function centerItem(item,iWidth,iHeight){  
   windowWidth = $(window).width();
   windowHeight = $(window).height();
   var w = windowWidth - iWidth; 
   var h = windowHeight - iHeight;
   $(item).css({
       'left': w/2,
       'top':h/2
   });   
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
    $(this).on({
      click: function(e) { e.preventDefault(); $('html,body').unbind().animate({scrollTop: $('#' + id).offset().top-75},'slow');}
    });
  });
}


