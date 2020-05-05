// Display burger for small screen
$('.burger-button').click(function(e) {
  e.preventDefault();
  $('.burger-button').toggleClass('active');
  $('.navbar').toggleClass('show');
})


// Remove header when clicking on a element of burger
$('.navbar a').click(function() {
  if ($('.navbar').hasClass('show')) {
    if ($('.burger-button').hasClass('active')) {
      $('.burger-button').toggleClass('active');
      $('.navbar').toggleClass('show');
    }
  }
})

// Initialize "big" header if burger already extends
$(window).resize(function() {
  if ($(this).width() > 980) {
    if ($('.navbar').hasClass('show')) {
      if ($('.burger-button').hasClass('active')) {
        $('.navbar').removeClass('show');
        $('.burger-button').removeClass('active');
      }
    }
  }
});
