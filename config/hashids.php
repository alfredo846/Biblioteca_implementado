<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/laravel-hashids
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        \App\Models\Prueba::class => [
            'salt' => \App\Models\Carrera::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\estudiantes::class => [
            'salt' => \App\Models\estudiantes::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\Libro::class => [
            'salt' => \App\Models\Libro::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\Prestamo::class => [
            'salt' => \App\Models\Prestamo::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\autores::class => [
            'salt' => \App\Models\autores::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\editoriales::class => [
            'salt' => \App\Models\editoriales::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\temas::class => [
            'salt' => \App\Models\temas::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\CicloEscolar::class => [
            'salt' => \App\Models\CicloEscolar::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\Carrera::class => [
            'salt' => \App\Models\Carrera::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\Grupo::class => [
            'salt' => \App\Models\Grupo::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],

        \App\Models\Usuario::class => [
            'salt' => \App\Models\Usuario::class . '7623e9b0009feff8e024a689d6ef59ce',
            'length' => 10,
        ],



    ],

];
