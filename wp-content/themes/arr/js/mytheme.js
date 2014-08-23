$(document).ready(function() {
  showMobileNav();
  columnizeContent();
  slideOverlayHeight();

});

$(window).resize(function() {
  if ($(window).width() > 1099) {
    $('#mobile-nav, #hamburger, #mobile-close').hide();
  } else if ($(window).width() <= 1099 && $('#mobile-close').css('display') == 'block') {   
    $('#hamburger').hide();
  } else {
    $('#hamburger').show();
  }

  slideOverlayHeight();

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

function columnizeContent() {
    // if ($(window).width() <= 1099) {
    //   $('.intro').columnize({ columns: 1 });
    // } else {
      $('.intro').columnize({ columns: 2 });
    //}
    
}

function slideOverlayHeight() {
  // var H = $('#slider img').height();
  // if ($(window).width() <= 1099) {
  //   $('.slide-overlay').css({'height':H});
  // } else {
  //   $('.slide-overlay').css({'height':550});
  // }
}


