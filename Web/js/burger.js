$('.burger-button').click(function(e) {
  e.preventDefault();
  $('.burger-button').toggleClass('active');
  $('.navbar').toggleClass('show');
})


// Remove header when clicking on a element of burger
$('.navbar a').click(function() {
  $('.burger-button').toggleClass('active');
  $('.navbar').toggleClass('show');
})


$(window).resize(function() {
  if ($(this).width() > 980) {
    if ($('.navbar').hasClass('show')) {
      $('.navbar').removeClass('show');
      $('.burger-button').removeClass('active');
    }
  }
});
