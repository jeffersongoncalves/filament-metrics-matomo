<?php

return [
    'settings' => [
        'title' => 'تنظیمات Matomo',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'اتصال',
            'connection_description' => 'جزئیات اتصال به نمونه Matomo خود را پیکربندی کنید.',
        ],
        'fields' => [
            'base_url' => 'آدرس Matomo',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'آدرس پایه نصب Matomo شما.',
            'api_token' => 'توکن API',
            'api_token_helper' => 'توکن خود را می‌توانید در Matomo از مسیر Settings > Personal > Security پیدا کنید.',
            'site_id' => 'شناسه سایت',
            'site_id_helper' => 'شناسه عددی سایتی که می‌خواهید ردیابی کنید.',
            'timezone' => 'منطقه زمانی',
            'timezone_placeholder' => 'یک منطقه زمانی انتخاب کنید...',
        ],
        'actions' => [
            'test_connection' => 'آزمایش اتصال',
        ],
        'notifications' => [
            'saved' => 'تنظیمات Matomo با موفقیت ذخیره شد.',
            'test_success' => 'اتصال موفق بود! Matomo در دسترس است.',
            'test_failure' => 'اتصال ناموفق بود. لطفاً تنظیمات خود را بررسی کنید.',
            'cache_cleared' => 'حافظه نهان Matomo پاک شد.',
        ],
    ],
];
