<?php

return [
    'settings' => [
        'title' => 'Налаштування Matomo',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Підключення',
            'connection_description' => 'Налаштуйте параметри підключення до вашого екземпляра Matomo.',
        ],
        'fields' => [
            'base_url' => 'URL Matomo',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'Базовий URL вашої інсталяції Matomo.',
            'api_token' => 'API-токен',
            'api_token_helper' => 'Токен можна знайти в Matomo у розділі Налаштування > Особисте > Безпека.',
            'site_id' => 'ID сайту',
            'site_id_helper' => 'Числовий ID сайту, який ви хочете відстежувати.',
            'timezone' => 'Часовий пояс',
            'timezone_placeholder' => 'Виберіть часовий пояс...',
        ],
        'actions' => [
            'test_connection' => 'Перевірити підключення',
        ],
        'notifications' => [
            'saved' => 'Налаштування Matomo успішно збережено.',
            'test_success' => 'Підключення успішне! Matomo доступний.',
            'test_failure' => 'Не вдалося підключитися. Перевірте налаштування.',
            'cache_cleared' => 'Кеш Matomo очищено.',
        ],
    ],
];
