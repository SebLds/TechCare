jQuery(function($) {
    $('.img-flag').on('click', function(event) {
        event.preventDefault();
        // alert('ca marche wesh la mif bordel !')
        // alert($.i18n().locale);
        // $.i18n().locale = $(this).data('locale');
        $.i18n( {
            locale: $(this).data('locale')
        } )
        $('html').i18n();

    });


    $.i18n().load({
        'fr': '/Web/js/jquery.i18n/languages/fr.json',
        'en': '/Web/js/jquery.i18n/languages/en.json',
    }).done(function() {
        $('html').i18n();

    });

    // $('.img-flag').on('click', function(event) {
    //     // event.preventDefault();
    //     // alert('ca marche wesh la mif bordel !')
    //     alert($.i18n().locale);
    //     $.i18n( {
    //         locale: 'en'
    //     } )
    //
    //     // $.ajax()
    //     //     .done(function(){
    //     //         $("*[data-18n]").fadeOut();
    //     //     })
    //     //     .fail(function(){
    //     //         alert('fail !');
    //     //     })
    // });

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






