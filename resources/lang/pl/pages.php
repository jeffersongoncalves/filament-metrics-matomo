<?php

return [
    'settings' => [
        'title' => 'Ustawienia Matomo',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Połączenie',
            'connection_description' => 'Skonfiguruj dane połączenia z instancją Matomo.',
        ],
        'fields' => [
            'base_url' => 'Adres URL Matomo',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'Bazowy adres URL instalacji Matomo.',
            'api_token' => 'Token API',
            'api_token_helper' => 'Token znajdziesz w Matomo w sekcji Ustawienia > Osobiste > Bezpieczeństwo.',
            'site_id' => 'ID witryny',
            'site_id_helper' => 'Numeryczny identyfikator witryny, którą chcesz śledzić.',
            'timezone' => 'Strefa czasowa',
            'timezone_placeholder' => 'Wybierz strefę czasową...',
        ],
        'actions' => [
            'test_connection' => 'Testuj połączenie',
        ],
        'notifications' => [
            'saved' => 'Ustawienia Matomo zostały zapisane.',
            'test_success' => 'Połączenie udane! Matomo jest osiągalne.',
            'test_failure' => 'Połączenie nieudane. Sprawdź ustawienia.',
            'cache_cleared' => 'Pamięć podręczna Matomo została wyczyszczona.',
        ],
    ],
];
