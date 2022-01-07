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
    var target = $(this).attr('data-target');
    var parent = $(this).attr('data-parent');

    $(target).addClass('hyde');
    $('.feature-card-overlay').addClass('hyde');
  });

  $(document).keyup(function(e){
    if(e.key === 'Escape'){
      $('.feature-card').addClass('hyde');
      $('.feature-card-overlay').addClass('hyde');
    }
  });
});
