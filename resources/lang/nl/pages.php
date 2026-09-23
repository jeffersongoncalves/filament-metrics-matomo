<?php

return [
    'settings' => [
        'title' => 'Matomo-instellingen',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Verbinding',
            'connection_description' => 'Configureer de verbindingsgegevens van je Matomo-instantie.',
        ],
        'fields' => [
            'base_url' => 'Matomo-URL',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'De basis-URL van je Matomo-installatie.',
            'api_token' => 'API-token',
            'api_token_helper' => 'Je vindt je token in Matomo onder Instellingen > Persoonlijk > Beveiliging.',
            'site_id' => 'Site-ID',
            'site_id_helper' => 'De numerieke ID van de site die je wilt volgen.',
            'timezone' => 'Tijdzone',
            'timezone_placeholder' => 'Selecteer een tijdzone...',
        ],
        'actions' => [
            'test_connection' => 'Verbinding testen',
        ],
        'notifications' => [
            'saved' => 'Matomo-instellingen succesvol opgeslagen.',
            'test_success' => 'Verbinding geslaagd! Matomo is bereikbaar.',
            'test_failure' => 'Verbinding mislukt. Controleer je instellingen.',
            'cache_cleared' => 'Matomo-cache gewist.',
        ],
    ],
];
