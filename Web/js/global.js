jQuery(function($) {
    // $.i18n( {
    //     locale: 'en'
    // } )
    // $.i18n().locale = 'fr';
    $.i18n().load({
        'en': '/Web/js/jquery.i18n/languages/en.json',
        'fr': '/Web/js/jquery.i18n/languages/fr.json',
    }).done(function() {
        $('html').i18n();
       });
    $('.img-flag').on('click', function(event) {
        event.preventDefault();
        $.i18n().locale = 'fr';
        alert('ca marche wesh la mif !')
        // $.i18n( {
        //     locale: 'fr'
        // } )
        // $.ajax()
        //     .done(function(){
        //         $("*[data-18n]").fadeOut();
        //     })
        //     .fail(function(){
        //         alert('fail !');
        //     })
    });

    // $('a').on('click',function(event){
    //     event.preventDefault();
    //     let $a = $(this);
    //     let url =$a.attr('href');
    //     $.ajax(url)
    //         .done(function(){
    //             $("#content").load(url);
    //             })
    //         .fail(function(){
    //             alert('fail !');
    //         })
    // })
});
// $.get(
//     '/', // Le fichier cible côté serveur.
//     'false', // Nous utilisons false, pour dire que nous n'envoyons pas de données.
//     nom_fonction_retour, // Nous renseignons uniquement le nom de la fonction de retour.
//     'text' // Format des données reçues.
// );




// function showUser(str)
// {
//     if (str == "")
//     {
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     }
//     if (window.XMLHttpRequest) {
//         xmlhttp= new XMLHttpRequest();
//     } else {
//         if (window.ActiveXObject)
//             try {
//                 xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
//             } catch (e) {
//                 try {
//                     xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
//                 } catch (e) {
//                     return NULL;
//                 }
//             }
//     }
//
//     xmlhttp.onreadystatechange = function ()
//     {
//         if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
//         {
//             document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
//         }
//     }
//     xmlhttp.open("GET", "getuser.php?id=" + str, true);
//     xmlhttp.send();
