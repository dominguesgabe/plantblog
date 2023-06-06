<?php

namespace app\router;
class AppRoutes
{
    public static function getRoutes(): array
    {
        return [
            'GET' => [
                '/' => 'Blogpost@index',
                '/[a-zA-Z0-9]+' => 'Blogpost@show',
                '/post/[0-9]+' => 'Blogpost@show',
                '/user/[0-9]+' => 'User@show',
            ],
            'POST' => [
                '/create' => 'Blogpost@create',
            ],
            'PUT' => [
                '/edit/[0-9]+' => 'Blogpost@edit',
            ],
            'DELETE' => [
                '/delete/[0-9]+' => 'Blogpost@destroy',
            ]
        ];
    }
}