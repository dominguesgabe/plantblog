<?php


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Main
{
    public function __construct()
    {
        $twigloader = new FilesystemLoader('app/views/');
        $twig = new Environment($twigloader, []);

        echo $twig->render('index.twig', ['name' => 'gabe']);
    }
}