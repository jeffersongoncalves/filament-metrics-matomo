<?php

return [
    'settings' => [
        'title' => 'Matomo parametrləri',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Bağlantı',
            'connection_description' => 'Matomo nümunənizin bağlantı təfərrüatlarını konfiqurasiya edin.',
        ],
        'fields' => [
            'base_url' => 'Matomo URL',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'Matomo quraşdırmanızın əsas URL-i.',
            'api_token' => 'API tokeni',
            'api_token_helper' => 'Tokeninizi Matomo-da Settings > Personal > Security bölməsində tapa bilərsiniz.',
            'site_id' => 'Sayt ID',
            'site_id_helper' => 'İzləmək istədiyiniz saytın rəqəmsal ID-si.',
            'timezone' => 'Saat qurşağı',
            'timezone_placeholder' => 'Saat qurşağı seçin...',
        ],
        'actions' => [
            'test_connection' => 'Bağlantını yoxla',
        ],
        'notifications' => [
            'saved' => 'Matomo parametrləri uğurla saxlanıldı.',
            'test_success' => 'Bağlantı uğurludur! Matomo əlçatandır.',
            'test_failure' => 'Bağlantı uğursuz oldu. Parametrlərinizi yoxlayın.',
            'cache_cleared' => 'Matomo keşi təmizləndi.',
        ],
    ],
];
