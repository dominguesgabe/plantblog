<?php

namespace app\core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TemplateMachine
{
    public function __construct(string $template, array $params)
    {
        $twigLoader = new FilesystemLoader('public/views/');
        $twig = new Environment($twigLoader, []);

        echo $twig->render($template, $params);
    }
}