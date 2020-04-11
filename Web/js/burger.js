$('.burger-button').click(function(e) {
  e.preventDefault();
  $('.burger-button').toggleClass('active');
  $('.navbar').toggleClass('show');
})
