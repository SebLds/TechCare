// let img = document.getElementById("img-flag");
// let language = img.getAttribute("src");

// function changeFlag() {
//
//   if(language === "/Web/images/france.png")
//     language = "/Web/images/uk.png";
//   else
//     language = "/Web/images/france.png";
//   img.setAttribute("src", language);
// }
//
// img.addEventListener('click',changeFlag);
//
// img.addEventListener('click',function(){
//     if($.i18n().locale === 'en'){
//       $.i18n().locale = 'fr'
//     }else if($.i18n().locale === 'fr'){
//       $.i18n().locale = 'en'
//     }
// });

// :$(document).ready(function(){
//   $(function(){
//     $('#formulaire').submit(function(e){
//       e.preventDefault();
//       var formulaire = $(this);
//       var post_url = formulaire.attr('action');
//       var post_data = formulaire.serialize();
// //Appel AJAX
//       $.ajax({
//         type: 'GET',
//         url: post_url,
//         data: post_data,
//         success: function(msg) {
// //Affichage du formulaire avec un effet
//           $(form).fadeOut(800, function(){
//             form.html(msg).fadeIn().delay(2000);
//           });
//         }
//       });
//     });
//   });
// });