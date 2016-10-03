<?php
return [

        'multi' => [
            'admin' => [
                'driver' => 'eloquent',
                'model' => 'App\Admin',
            ],
            'client' => [
                'driver' => 'eloquent',
                'model' => 'App\User',
                'email' => 'client.emails.password',
            ]
        ],

        'password' => [
                'email' => 'emails.password',
                'table' => 'password_resets',
                'expire' => 60,
            ],

    ];