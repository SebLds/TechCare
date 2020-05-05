$('.burger-button').click(function(e) {
  e.preventDefault();
  $('.burger-button').toggleClass('active');
  $('.navbar').toggleClass('show');
})

// Remove header when clicking on a element of burger
$('.navbar a').click(function(e) {
  $('.burger-button').toggleClass('active');
  $('.navbar').toggleClass('show');
})
