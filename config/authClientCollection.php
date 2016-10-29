<?php

return [
    'class' => 'yii\authclient\Collection',
    'clients' => [
        'vk' => [
            'class' => 'yii\authclient\clients\VKontakte',
            'clientId' => getenv('VK_CLIENT_ID'),
            'clientSecret' => getenv('VK_CLIENT_SECRET'),
        ],
    ],
];