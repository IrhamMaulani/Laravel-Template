<?php

return [
    'dashboard' => [
        'image' => 'https://flowbite.com/docs/images/logo.svg',
        'url' => '#'
    ],
    'menu' => [
        [
            'title' => 'Dashboard',
            'can' => ['Participant', 'Admin'],
            'url' => '/',
            'icon' => "home"
        ],
        [
            'title' => 'Parent',
            'can' => ['Participant', 'Admin'],
            'icon' => "cart",
            'menu' => [
                [
                    'can' => ['Participant', 'Admin'],
                    'title' => 'Child',
                    'url' => '/dashboard',
                    'type' => 'text',
                    'submenus' => FALSE
                ],
            ],
        ],
    ],
];


