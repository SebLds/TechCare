
$(".comment").hide();

$('.btn').click(function(){
    $(this).next(".comment").slideToggle();
});