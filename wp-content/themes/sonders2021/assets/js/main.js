var winW = $(window).innerWidth();

function closeNav(){
  $('.nav-btn').removeClass('open');
  $('html, body').removeClass('stuck');
  $('.header-bottom').removeClass('is-visible');
  $('.header-top').removeClass('open');
}

$(document).ready(function(){
  var path = window.location.pathname;

  $('.nav-btn').click(function(){
    $('html, body').toggleClass('stuck');
    $('.header-bottom').toggleClass('is-visible');
    $('.header-top').toggleClass('open');
    $(this).toggleClass('open');
  });

  $(window).scroll(function(){
    if($(this).scrollTop() > 100){
      $('.header').not('.no-scroll-effect').addClass('white-bg');
    } else {
      $('.header').not('.no-scroll-effect').removeClass('white-bg');
    }
  });

  //email to script
  function mailToForm(){
    var emailTo = [];
    var builder = [];

    $.each($('input.mailto_check:checked'), function(){
      emailTo.push($(this).attr('data-mailto'));
      //builder.push($(this).attr('data-builder'));
    });
    $('#mailto').val(emailTo.join(', '));
  }
  $('input.mailto_check').change(function(){
    mailToForm();
  });

  $('.builderContact-btn').click(function(){
    var builder = $(this).attr('data-builder');
    console.log(builder);
    $('.mailto_check[value="'+builder+'"]').prop('checked',true);
    mailToForm();
  })

  //change ph# to required if realtor is yes
  $('.realtor').change(function(){
    if(this.checked){
      $('.phone_num').prop('required',true);
      $('.phone-label').append('<span class="req">*</span>');
    } else {
      $('.phone_num').prop('required',false);
      $('.phone-label > .req').remove();
    }
  });

  $('.contactBtn').click(function(){
    if($('.header-top').hasClass('open')){
      closeNav();
    }
    if(winW <= 991){
      $('.contact-form-container').addClass('is-visible');
      $('html, body').addClass('stuck');
    } else if (winW >= 992){
      $('.contact-form-mask').addClass('is-visible');
      $('.contact-form-container').addClass('is-visible');
      $('html, body').addClass('stuck');
    }
  });

  $('.builderContact-btn').click(function(){
    if($('.header-top').hasClass('open')){
      closeNav();
    }
    if(winW <= 991){
      $('.contact-form-container').addClass('is-visible');
      $('html, body').addClass('stuck');
    } else if (winW >= 992){
      $('.contact-form-mask').addClass('is-visible');
      $('.contact-form-container').addClass('is-visible');
      $('html, body').addClass('stuck');
    }
  });

  $('.contact-form-container .close-btn').click(function(){
    $('.contact-form-mask').removeClass('is-visible');
    $('.contact-form-container').removeClass('is-visible');
    $('html, body').removeClass('stuck');
  });

  var fpImage = $('.floorplan-slide-container .swiper-wrapper .swiper-slide').first().find('img').height();
  $('.builder-floorplans .slider-controls').css('top', (fpImage - 15) + 'px');

  $(window).resize(function(){
    var fpImage = $('.floorplan-slide-container .swiper-wrapper .swiper-slide').first().find('img').height();
    $('.builder-floorplans .slider-controls').css('top', (fpImage - 15) + 'px');
  });

	$(window).scroll(function(){
		if($(this).scrollTop() > 100){
			$('.top-btn').addClass('is-visible');
		} else {
			$('.top-btn').removeClass('is-visible');
		}
	});

	$('.top-btn').click(function(){
		$(window).scrollTop(0);
	});

	// Video Player
	var player;
	function onYouTubePlayerAPIReady(){
		player = new YT.Player('player');
	}
	$('.floorplan-tour-btn').click(function(){
		var video = $(this).attr('data-target');
		$(video).addClass('is-visible');
	});
	$('.closeVideo-btn').click(function(){
		$(this).parent('.video-overlay').removeClass('is-visible');
		$(this).sibling('.floorplan-video > ' + player).stopVideo();
	});

	$('.play-btn').click(function(){
		$('#builder-video').addClass('is-visible');
	});
	$('#builder-video > .close-btn').click(function(){
		$(this).parent('#builder-video').removeClass('is-visible');
	});
});




//Swiper Slider
const swiper = new Swiper('.swiper', {
  direction: 'horizontal',
  loop: false,
  speed: 800,
  slidesPerView: 1,
  spaceBetween: 10,
  centeredSlides: true,

  breakpoints: {
    640: {
      slidesPerView: 'auto',
      spaceBetween:  80,
      centeredSlides: false,
    },
    992: {
      slidesPerView: 'auto',
      spaceBetween:  20,
      centeredSlides: false,
    }
  },

  navigation: {
    nextEl = '.slide-next',
    prevEl = '.slide-prev',
  },
});
