<?php
    require __DIR__ . '/vendor/autoload.php';
    require_once('includes/config.inc.php');
    
    \Sentry\init(['dsn' => $sentryURL ]);
    $loader = new \Twig\Loader\FilesystemLoader('./templates');
    $twig = new \Twig\Environment($loader);
    
    include_once('includes/ergodict.class.php');
    $instance = new ErgoDict($sql);

    echo $twig->render('main.html');
?>