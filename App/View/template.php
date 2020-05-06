<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
<<<<<<< Updated upstream
    <!-- CSS Files -->
    <!--<link href="/Web/css/rules.css" rel="stylesheet">-->
    <!-- Image -->
    <link href="/Web/images/favicon.png" rel="shortcut icon" type="image/png"/>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <base href="<?php if (isset($webRoot)){echo $webRoot;} ?>" >
<!--    <link href="/Web/css/rules.css" rel="stylesheet">-->
   <link href="/Web/images/favicon.png" rel="shortcut icon" type="image/png"/>
<!--    <link href="/Web/css/footer.css" rel="stylesheet">-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
    <?php if (isset($head_tags)){echo $head_tags;} ?>
    <title><?php if (isset($title)){echo $title;} ?></title>
<?php if (is_file('../App/View/header.php')){require_once 'header.php';} ?>
<body>
<?php if (isset($content)){echo $content;} ?>
</body>

<?php require_once 'footer.php'?>
=======
    <base href="<?= $webRoot ?>" >
    <link href="/Web/css/rules.css" rel="stylesheet">
    <!--<link href="/Web/css/header.css" rel="stylesheet">-->
    <link href="/Web/css/sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <link href="/Web/images/favicon.png" rel="shortcut icon" type="image/png"/>
    <!--<link href="/Web/css/footer.css" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
    </script>
    <?= $head_tags; ?>
    <title><?= $title; ?></title>
</head>


  <?php require_once 'sidebar.php' ?>

    <?= $content; ?>

  <?php //require_once 'footer.php'?>
>>>>>>> Stashed changes
