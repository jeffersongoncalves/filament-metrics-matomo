<?php

return [
    'settings' => [
        'title' => 'Matomo ayarları',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Bağlantı',
            'connection_description' => 'Matomo örneğinizin bağlantı ayrıntılarını yapılandırın.',
        ],
        'fields' => [
            'base_url' => 'Matomo URL\'si',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'Matomo kurulumunuzun temel URL\'si.',
            'api_token' => 'API anahtarı',
            'api_token_helper' => 'Anahtarınızı Matomo\'da Ayarlar > Kişisel > Güvenlik altında bulabilirsiniz.',
            'site_id' => 'Site kimliği',
            'site_id_helper' => 'İzlemek istediğiniz sitenin sayısal kimliği.',
            'timezone' => 'Saat dilimi',
            'timezone_placeholder' => 'Bir saat dilimi seçin...',
        ],
        'actions' => [
            'test_connection' => 'Bağlantıyı test et',
        ],
        'notifications' => [
            'saved' => 'Matomo ayarları başarıyla kaydedildi.',
            'test_success' => 'Bağlantı başarılı! Matomo erişilebilir.',
            'test_failure' => 'Bağlantı başarısız. Lütfen ayarlarınızı kontrol edin.',
            'cache_cleared' => 'Matomo önbelleği temizlendi.',
        ],
    ],
];
