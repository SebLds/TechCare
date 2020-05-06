$('#button-account').click(function(e) {
  e.preventDefault();
  $('button').toggleClass('on');
  $('#arrow').toggleClass('active');
  $('.dropdown').toggleClass('show');
})
