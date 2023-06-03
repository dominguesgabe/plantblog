<?php

return [
    'GET' => [
        '/' => 'Home@index',
        '/post/[0-9]+' => 'Home@show',
        '/user/[0-9]+' => 'User@show',
    ],
    'POST' => [
        '/create' => 'Home@create',
    ],
    'PUT' => [
        '/edit/[0-9]+' => 'Home@edit',
    ],
    'DELETE' => [
        '/delete/[0-9]+' => 'Home@destroy',
    ]
];