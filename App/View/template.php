<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">

    <base href="<?php use src\Session;

    if (isset($webRoot)){echo $webRoot;} ?>">

    <!-- CSS Files -->

    <!-- Image -->
    <link href="/Web/images/favicon.png" rel="shortcut icon" type="image/png"/>

    <!-- Font & Icon -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <!-- FontAwesome/Jquery -->
    <link href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">

    <?php if (isset($head_tags)){echo $head_tags;} ?>
    <title><?php if (isset($title)){echo $title;} ?></title>
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous">
    </script>
    <script src="/Web/js/jquery.i18n/CLDRPluralRuleParser.js"></script>
    <script src="/Web/js/jquery.i18n/jquery.i18n.js"></script>
    <script src="/Web/js/jquery.i18n/jquery.i18n.messagestore.js"></script>
    <script src="/Web/js/jquery.i18n/jquery.i18n.fallbacks.js"></script>
    <script src="/Web/js/jquery.i18n/jquery.i18n.language.js"></script>
    <script src="/Web/js/jquery.i18n/jquery.i18n.parser.js"></script>
    <script src="/Web/js/jquery.i18n/jquery.i18n.emitter.js"></script>
    <script src="/Web/js/jquery.i18n/jquery.i18n.emitter.bidi.js"></script>
<!--    <script src="/Web/js/global.js"></script>-->
    <script>jQuery(function($) {
            // $.i18n( {
            //     locale: 'en'
            // } )

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
        });</script>
</head>

<body>
<?php if(Session::getInstance()->getAttribute('sessionStatus')>0):?>
<?php if (is_file('App/View/sidebar.php')){require_once 'sidebar.php';} ?>
<div id="content"><?php if (isset($content)){echo $content;} ?></div>
<?php else:?>
<?php if (is_file('App/View/header.php')){require_once 'header.php';} ?>
    <div id="content"><?php if (isset($content)){echo $content;} ?></div>
<?php if (is_file('App/View/footer.php')){require_once 'footer.php';} ?>
<?php endif; ?>


</body>
</html>
