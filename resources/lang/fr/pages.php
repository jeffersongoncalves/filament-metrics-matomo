<?php

return [
    'settings' => [
        'title' => 'Paramètres Matomo',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'Connexion',
            'connection_description' => 'Configurez les informations de connexion à votre instance Matomo.',
        ],
        'fields' => [
            'base_url' => 'URL de Matomo',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'L\'URL de base de votre installation Matomo.',
            'api_token' => 'Jeton d\'API',
            'api_token_helper' => 'Vous trouverez votre jeton dans Matomo sous Paramètres > Personnel > Sécurité.',
            'site_id' => 'ID du site',
            'site_id_helper' => 'L\'ID numérique du site que vous souhaitez suivre.',
            'timezone' => 'Fuseau horaire',
            'timezone_placeholder' => 'Sélectionnez un fuseau horaire...',
        ],
        'actions' => [
            'test_connection' => 'Tester la connexion',
        ],
        'notifications' => [
            'saved' => 'Paramètres Matomo enregistrés avec succès.',
            'test_success' => 'Connexion réussie ! Matomo est accessible.',
            'test_failure' => 'Échec de la connexion. Veuillez vérifier vos paramètres.',
            'cache_cleared' => 'Cache Matomo vidé.',
        ],
    ],
];
