<?php

return [
    'settings' => [
        'title' => 'Configuración de Matomo',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Conexión',
            'connection_description' => 'Configura los datos de conexión de tu instancia de Matomo.',
        ],
        'fields' => [
            'base_url' => 'URL de Matomo',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'La URL base de tu instalación de Matomo.',
            'api_token' => 'Token de API',
            'api_token_helper' => 'Puedes encontrar tu token en Matomo, en Configuración > Personal > Seguridad.',
            'site_id' => 'ID del sitio',
            'site_id_helper' => 'El ID numérico del sitio que quieres rastrear.',
            'timezone' => 'Zona horaria',
            'timezone_placeholder' => 'Selecciona una zona horaria...',
        ],
        'actions' => [
            'test_connection' => 'Probar conexión',
        ],
        'notifications' => [
            'saved' => 'Configuración de Matomo guardada correctamente.',
            'test_success' => '¡Conexión correcta! Matomo es accesible.',
            'test_failure' => 'La conexión falló. Revisa tu configuración.',
            'cache_cleared' => 'Caché de Matomo borrada.',
        ],
    ],
];
