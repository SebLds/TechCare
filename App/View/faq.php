<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel="stylesheet" href="/Web/css/faq.css">
</head>
<body>

<div class="container">
    <h2>Foire Aux Questions</h2>

    <div class="search">
        <input type="text" autocomplete="off" class="search__input" placeholder="Rechercher des réponses..." tabindex="1">
    </div>

    <div class="accordion">
        <div class="accordion-item">
            <a>Comment ce déroule le test ?</a>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
        </div>
        <div class="accordion-item">
            <a>A partir de quel âge peut t-on faire le test ?</a>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
        </div>
        <div class="accordion-item">
            <a>Quel est le but du test ?</a>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
        </div>
        <div class="accordion-item">
            <a>Combien de temps est valable le résultat du test ?</a>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
        </div>
        <div class="accordion-item">
            <a>Est-ce que ce test est valable pour une entité de l'armée ?</a>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
        </div>
    </div>
</div>

<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script  src="/Web/js/faq.js"></script>

<?php $content=ob_get_clean();?>
<?php require 'template.php';?>