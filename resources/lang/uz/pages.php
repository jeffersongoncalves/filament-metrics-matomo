<?php

return [
    'settings' => [
        'title' => 'Matomo sozlamalari',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Ulanish',
            'connection_description' => 'Matomo nusxangizga ulanish maʼlumotlarini sozlang.',
        ],
        'fields' => [
            'base_url' => 'Matomo URL',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'Matomo oʻrnatmangizning asosiy URL manzili.',
            'api_token' => 'API tokeni',
            'api_token_helper' => 'Tokeningizni Matomoʼda Settings > Personal > Security boʻlimida topishingiz mumkin.',
            'site_id' => 'Sayt ID',
            'site_id_helper' => 'Kuzatmoqchi boʻlgan saytning raqamli ID raqami.',
            'timezone' => 'Vaqt mintaqasi',
            'timezone_placeholder' => 'Vaqt mintaqasini tanlang...',
        ],
        'actions' => [
            'test_connection' => 'Ulanishni tekshirish',
        ],
        'notifications' => [
            'saved' => 'Matomo sozlamalari muvaffaqiyatli saqlandi.',
            'test_success' => 'Ulanish muvaffaqiyatli! Matomo mavjud.',
            'test_failure' => 'Ulanib boʻlmadi. Sozlamalaringizni tekshiring.',
            'cache_cleared' => 'Matomo keshi tozalandi.',
        ],
    ],
];
