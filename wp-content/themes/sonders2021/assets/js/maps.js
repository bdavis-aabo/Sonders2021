$(document).ready(function(){
	// Set MapBlock Height
	var mapHeight = $('#main-map > .sonders-community-map > .landing_map').height();
	$('.mapblock-container').css('height', mapHeight + 'px');

	$(window).resize(function(){
		var mapHeight = $('#main-map > .sonders-community-map > .landing_map').height();
		$('.mapblock-container').css('height', mapHeight + 'px');
	});

	// Switch Maps
	$('.map-child-link').click(function(){
		var target = $(this).attr('data-target');

		$(target).removeClass('hyde');
    		$('#main-map').addClass('hyde');
		$(target + ' > .child-map-sidebar').removeClass('is-hidden');
	});

	$('.map-back').click(function(){
		var target = $(this).attr('data-target');
		$(target).addClass('hyde');
		$('#main-map').removeClass('hyde');
	});

	// Open Feature Cards
	$('.map-point').click(function(){
		var target = $(this).attr('data-target');
		var parent = $(this).attr('data-parent');

    		$(parent + ' > .child-map-sidebar').addClass('is-hidden');

    		$('.feature-card').parents('.feature-card-overlay').removeClass('hyde');
		var cards = $(target).siblings('article');

		$.each(cards, function(){
			var card = $(this);
			if(!$(card).hasClass('hyde')){
				$(card).addClass('hyde');
			}
    		});

		$('article' + target).removeClass('hyde');
  	});

	$('.close-card').click(function(){
		var parent = $(this).parent('.feature-card');
		$(parent).addClass('hyde');
		$('.feature-card-overlay').addClass('hyde');
	});

	$(document).keyup(function(e){
    		if(e.key === 'Escape'){
     		$('.feature-card').addClass('hyde');
      		$('.feature-card-overlay').addClass('hyde');
    		}
  	});

	// Secondary Map Sidebar
	$('.close-sidebar').click(function(){
		console.log('close sidebar');
		$(this).parent('.child-map-sidebar').addClass('is-hidden');
	});
});
