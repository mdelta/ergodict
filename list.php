<?php
    require __DIR__ . '/vendor/autoload.php';
    require_once('includes/config.inc.php');
    require_once('includes/setup.inc.php');
    
    include_once('includes/ergodict.class.php');
    $instance = new ErgoDict($sql);

    $entries = $instance->GetAll();

    echo $twig->render('list.html', ['entries' => $entries]);
?>