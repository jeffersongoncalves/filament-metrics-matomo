<?php

return [
    'settings' => [
        'title' => 'Matomo सेटिंग्स',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'कनेक्शन',
            'connection_description' => 'अपने Matomo इंस्टेंस के कनेक्शन विवरण कॉन्फ़िगर करें।',
        ],
        'fields' => [
            'base_url' => 'Matomo URL',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'आपके Matomo इंस्टॉलेशन का बेस URL।',
            'api_token' => 'API टोकन',
            'api_token_helper' => 'आप अपना टोकन Matomo में Settings > Personal > Security के अंतर्गत पा सकते हैं।',
            'site_id' => 'साइट ID',
            'site_id_helper' => 'उस साइट की संख्यात्मक ID जिसे आप ट्रैक करना चाहते हैं।',
            'timezone' => 'समय क्षेत्र',
            'timezone_placeholder' => 'समय क्षेत्र चुनें...',
        ],
        'actions' => [
            'test_connection' => 'कनेक्शन जाँचें',
        ],
        'notifications' => [
            'saved' => 'Matomo सेटिंग्स सफलतापूर्वक सहेजी गईं।',
            'test_success' => 'कनेक्शन सफल! Matomo उपलब्ध है।',
            'test_failure' => 'कनेक्शन विफल। कृपया अपनी सेटिंग्स जाँचें।',
            'cache_cleared' => 'Matomo कैश साफ़ किया गया।',
        ],
    ],
];
