<?php

return [
    'settings' => [
        'title' => 'Impostazioni Matomo',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Connessione',
            'connection_description' => 'Configura i dati di connessione della tua istanza Matomo.',
        ],
        'fields' => [
            'base_url' => 'URL di Matomo',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'L\'URL di base della tua installazione di Matomo.',
            'api_token' => 'Token API',
            'api_token_helper' => 'Puoi trovare il tuo token in Matomo in Impostazioni > Personale > Sicurezza.',
            'site_id' => 'ID sito',
            'site_id_helper' => 'L\'ID numerico del sito che vuoi tracciare.',
            'timezone' => 'Fuso orario',
            'timezone_placeholder' => 'Seleziona un fuso orario...',
        ],
        'actions' => [
            'test_connection' => 'Verifica connessione',
        ],
        'notifications' => [
            'saved' => 'Impostazioni di Matomo salvate correttamente.',
            'test_success' => 'Connessione riuscita! Matomo è raggiungibile.',
            'test_failure' => 'Connessione non riuscita. Controlla le impostazioni.',
            'cache_cleared' => 'Cache di Matomo svuotata.',
        ],
    ],
];
