<link href="/Web/css/sidebar.css" rel="stylesheet">
<!--<link href="/Web/css/rulesConnected.css" rel="stylesheet">-->

<?php use App\Model\User; ?>

<!--header area start-->
<header>
    <div id="header">
        <h3>Infinite <p>Measures</p></h3>
        <h1 id="page-title"><?php echo $this->title; ?></h1>
        <div class="right_area">
            <div id="flag">
                <img class="img-flag" data-locale="fr" src="../../Web/images/france.png" alt="flag">
                <img class="img-flag" data-locale="en" src="../../Web/images/uk.png" alt="flag">
            </div>
            <form action="/logout" method="post">
                <button class="logout_btn" type="submit" name="logout"><i class="fad fa-power-off"></i></button>
            </form>
        </div>
    </div>
    <!--header area end-->

    <!--sidebar start-->
    <div class="sidebar">
        <div id="navbar">
            <h2 id="name">
                <?php
                $this->user = new User();
                $name = $this->user->getFirstName($_SESSION['ID_User']);
                echo $name; ?>
            </h2>

            <?php if ($_SESSION['sessionStatus'] == 3): ?>
              <a href="/admin/dashboard"><i class="fad fa-desktop"></i>
                  <h1 data-i18n="SIDEBAR-dashboard"></h1></a>
            <?php endif; ?>
            <?php if ($_SESSION['sessionStatus'] == 1 || $_SESSION['sessionStatus'] == 2): ?>
              <a href="/dashboard"><i class="fad fa-desktop"></i>
                  <h1 data-i18n="SIDEBAR-dashboard"></h1></a>
            <?php endif; ?>
            <a href="/profil"><i class="fad fa-user"></i>
                <h1 data-i18n="SIDEBAR-profil"></h1></a>
            <a href="/help"><i class="fad fa-question-circle"></i>
                <h1 data-i18n="SIDEBAR-help"></h1></a>
            <a href="/forum"><i class="fad fa-comments"></i>
                <h1 data-i18n="SIDEBAR-forum"></h1></a>
            <?php if ($_SESSION['sessionStatus'] > 1): ?>
                <a href="/test"><i class="fad fa-clipboard-check"></i>
                    <h1 data-i18n="SIDEBAR-launchtest">Lancer test</h1></a>
            <?php endif; ?>
            <?php if ($_SESSION['sessionStatus'] == 3): ?>
                <a href="/statistics"><i class="fad fa-analytics"></i>
                    <h1 data-i18n="SIDEBAR-statistics">Statistiques</h1></a>
            <?php endif; ?>
        </div>
        <div id="footer">
            <div id="link">
              <?php if ($_SESSION['sessionStatus'] == 1 || $_SESSION['sessionStatus'] == 2): ?>
                <a href="/contact-admin"><span data-i18n="SIDEBAR-contact"></span></a>
                <span>•</span>
              <?php endif; ?>
                <a href="/cgu"><span data-i18n="SIDEBAR-cgu"></span></a>
                <span>•</span>
                <a href="/faq"><span data-i18n="SIDEBAR-faq"></span></a>
            </div>
            <div id="copyright">
                <p>&copy; Infinite Measures</p>
                <p data-i18n="SIDEBAR-right"></p>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/Web/js/flag.js"></script>

</header>
