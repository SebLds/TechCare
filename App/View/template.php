<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">

    <base href="<?php if (isset($webRoot)){echo $webRoot;} ?>">

    <!-- CSS Files -->
    <link href="/Web/css/rulesConnected.css" rel="stylesheet">
    <!-- Image -->
    <link href="/Web/images/favicon.png" rel="shortcut icon" type="image/png"/>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <!-- FontAwesome/Jquery -->
    <link href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">

    <?php if (isset($head_tags)){echo $head_tags;} ?>
    <title><?php if (isset($title)){echo $title;} ?></title>

<?php if (is_file('../App/View/sidebar.php')){require_once 'sidebar.php';} ?>

<?php if (isset($content)){echo $content;} ?>

<?php //require_once 'footer.php'?>

</html>
