<?php

return [
    'class' => 'yii\authclient\Collection',
    'clients' => [
        'vk' => [
            'class' => 'yii\authclient\clients\VKontakte',
            'clientId' => getenv('VK_CLIENT_ID'),
            'clientSecret' => getenv('VK_CLIENT_SECRET'),
            'stateStorage' => [
                'class' => 'yii\authclient\SessionStateStorage',
                'session' => [
                    'class' => 'yii\web\Session',
                    'cookieParams' => [
                        'lifetime' => 604800, // one week
                        'httponly' => true,
                    ],
                ],
            ],
        ],
    ],
];