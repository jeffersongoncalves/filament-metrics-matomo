<?php

return [
    'settings' => [
        'title' => 'Definições do Matomo',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Ligação',
            'connection_description' => 'Configure os dados de ligação da sua instância do Matomo.',
        ],
        'fields' => [
            'base_url' => 'URL do Matomo',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'O URL base da sua instalação do Matomo.',
            'api_token' => 'Token da API',
            'api_token_helper' => 'Pode encontrar o seu token no Matomo em Definições > Pessoal > Segurança.',
            'site_id' => 'ID do site',
            'site_id_helper' => 'O ID numérico do site que pretende rastrear.',
            'timezone' => 'Fuso horário',
            'timezone_placeholder' => 'Selecione um fuso horário...',
        ],
        'actions' => [
            'test_connection' => 'Testar ligação',
        ],
        'notifications' => [
            'saved' => 'Definições do Matomo guardadas com sucesso.',
            'test_success' => 'Ligação bem-sucedida! O Matomo está acessível.',
            'test_failure' => 'A ligação falhou. Verifique as suas definições.',
            'cache_cleared' => 'Cache do Matomo limpa.',
        ],
    ],
];
