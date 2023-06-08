<?php

namespace app\router;

use app\core\ControllerLoader;
use Exception;
use Kint;

class Router
{
    private function exactMatchUriInArrayRoutes(string $uri, array $routes): array
    {
        return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
    }

    private function regexMatchUriRoutes(string $uri, array $routes): array
    {
        return array_filter($routes, function($value) use($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));

            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
            ARRAY_FILTER_USE_KEY
        );
    }

    private function params($uri, $matchedUri): array
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

    private function paramsFormat($uri, $params): array
    {
        $paramsData = [];

        foreach ($params as $index => $param) {
            $paramsData[$uri[$index - 1]] = $param;
        }

        return $paramsData;
    }

    public function __construct()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $routes = AppRoutes::getRoutes();
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        $matchedUri = $this->exactMatchUriInArrayRoutes($uri, $routes);

        $params = [];

        if (empty($matchedUri)) {
            $matchedUri = $this->regexMatchUriRoutes($uri, $routes[$requestMethod]);
            $uri = explode('/', ltrim($uri, '/'));
            $params = $this->params($uri, $matchedUri);

            $params = $this->paramsFormat($uri, $params);
        }

        if (!empty($matchedUri)) {
            ControllerLoader::load($matchedUri, $params);
            return;
        }

        throw new Exception('Route error');
    }
}