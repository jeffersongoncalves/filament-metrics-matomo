<?php

return [
    'settings' => [
        'title' => 'Настройки Matomo',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Подключение',
            'connection_description' => 'Настройте параметры подключения к вашему экземпляру Matomo.',
        ],
        'fields' => [
            'base_url' => 'URL Matomo',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'Базовый URL вашей установки Matomo.',
            'api_token' => 'API-токен',
            'api_token_helper' => 'Токен можно найти в Matomo в разделе Настройки > Личные > Безопасность.',
            'site_id' => 'ID сайта',
            'site_id_helper' => 'Числовой ID сайта, который вы хотите отслеживать.',
            'timezone' => 'Часовой пояс',
            'timezone_placeholder' => 'Выберите часовой пояс...',
        ],
        'actions' => [
            'test_connection' => 'Проверить подключение',
        ],
        'notifications' => [
            'saved' => 'Настройки Matomo успешно сохранены.',
            'test_success' => 'Подключение успешно! Matomo доступен.',
            'test_failure' => 'Не удалось подключиться. Проверьте настройки.',
            'cache_cleared' => 'Кэш Matomo очищен.',
        ],
    ],
];
