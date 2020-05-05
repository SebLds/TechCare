<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <base href="<?= $webRoot ?>" >
    <!-- CSS Files -->
    <!--<link href="/Web/css/rules.css" rel="stylesheet">-->
    <!-- Image -->
    <link href="/Web/images/favicon.png" rel="shortcut icon" type="image/png"/>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
    <?= $head_tags; ?>
    <title><?= $title; ?></title>
</head>
<?php require_once 'header.php' ?>
<body>
    <?= $content; ?>
</body>

<?php require_once 'footer.php'?>
