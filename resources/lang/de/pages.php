<?php

return [
    'settings' => [
        'title' => 'Matomo-Einstellungen',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Verbindung',
            'connection_description' => 'Konfigurieren Sie die Verbindungsdaten Ihrer Matomo-Instanz.',
        ],
        'fields' => [
            'base_url' => 'Matomo-URL',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'Die Basis-URL Ihrer Matomo-Installation.',
            'api_token' => 'API-Token',
            'api_token_helper' => 'Ihr Token finden Sie in Matomo unter Einstellungen > Persönlich > Sicherheit.',
            'site_id' => 'Site-ID',
            'site_id_helper' => 'Die numerische ID der Website, die Sie erfassen möchten.',
            'timezone' => 'Zeitzone',
            'timezone_placeholder' => 'Zeitzone auswählen...',
        ],
        'actions' => [
            'test_connection' => 'Verbindung testen',
        ],
        'notifications' => [
            'saved' => 'Matomo-Einstellungen erfolgreich gespeichert.',
            'test_success' => 'Verbindung erfolgreich! Matomo ist erreichbar.',
            'test_failure' => 'Verbindung fehlgeschlagen. Bitte überprüfen Sie Ihre Einstellungen.',
            'cache_cleared' => 'Matomo-Cache geleert.',
        ],
    ],
];
