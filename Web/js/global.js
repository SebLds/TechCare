jQuery(function($) {
    $.i18n( {
        locale: 'en'
    } )
    $.i18n().load({
        'en': '/Web/js/jquery.i18n/languages/en.json',
        'fr': '/Web/js/jquery.i18n/languages/fr.json',
    }).done(function() {
        $('html').i18n();
        $('.locale-switcher').on('click', 'a', function changeLang(e) {
            e.preventDefault();
            console.log($(this).data('locale'));
            $.i18n().locale = $(this).data('locale');
        })
        }
    );
});


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





