<?php

function routes(): array
{
    return require 'routes.php';
}

function matchUriRoutes(string $uri, array $routes)
{
    if (array_key_exists($uri, $routes)) {
        return [];
    }

    return [];
}
function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routes();

    $matchedUri = matchUriRoutes($uri, $routes);
}