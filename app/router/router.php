<?php

function routes(): array
{
    return require 'routes.php';
}

function matchUriRoutes(string $uri, array $routes): array
{
    if (array_key_exists($uri, $routes)) {
        return [ $uri => $routes[$uri] ];
    }

    return [];
}

function exactMatchUriInArrayRoutes(string $uri, array $routes): array
{
    return (array_key_exists($uri, $routes)) ?
        [$uri => $routes[$uri]] : [];
}

function regexMatchUriRoutes(string $uri, array $routes): array
{
    return array_filter($routes, function($value) use($uri) {
        $regex = str_replace('/', '\/', ltrim($value, '/'));

        return preg_match("/^$regex$/", ltrim($uri, '/'));
    },
        ARRAY_FILTER_USE_KEY
    );
}

function params($uri, $matchedUri): array
{
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }

    return [];
}

function paramsFormat($uri, $params): array
{
    $paramsData = [];

    foreach ($params as $index => $param) {
        $paramsData[$uri[$index - 1]] = $param;
    }

    return $paramsData;
}

function router(): void
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routes();
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);

    $params = [];

    if (empty($matchedUri)) {
        $matchedUri = regexMatchUriRoutes($uri, $routes[$requestMethod]);
        $uri = explode('/', ltrim($uri, '/'));
        $params = params($uri, $matchedUri);
        $params = paramsFormat($uri, $params);
    }

//    if (empty($matchedUri)) {
//        $matchedUri = regexMatchUriRoutes($uri, $routes);
//    }

    if (!empty($matchedUri)) {
        loadController($matchedUri, $params);
        return;
    }

    throw new Exception('Route error');
}