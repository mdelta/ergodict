<?php
    \Sentry\init(['dsn' => $sentryURL ]);
    $loader = new \Twig\Loader\FilesystemLoader('./templates');
    $twig = new \Twig\Environment($loader);
    $twig->addExtension(new whatwedo\TwigBootstrapIcons\Twig\BootstrapIconsExtensions());
?>