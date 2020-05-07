<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">

    <!-- CSS Files -->

    <!-- Image -->
    <link href="/Web/images/favicon.png" rel="shortcut icon" type="image/png"/>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <base href="<?php if (isset($webRoot)){echo $webRoot;} ?>" >
    <link href="/Web/css/rules.css" rel="stylesheet">
    <link href="/Web/images/favicon.png" rel="shortcut icon" type="image/png"/>
    <link href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">-->
    <?php if (isset($head_tags)){echo $head_tags;} ?>
    <title><?php if (isset($title)){echo $title;} ?></title>

<?php if (is_file('../App/View/header.php')){require_once 'header.php';} ?>
<body>
<?php if (isset($content)){echo $content;} ?>
</body>

<?php require_once 'footer.php'?>

</html>
