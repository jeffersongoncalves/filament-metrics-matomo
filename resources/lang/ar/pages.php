<?php

return [
    'settings' => [
        'title' => 'إعدادات Matomo',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => 'الاتصال',
            'connection_description' => 'اضبط تفاصيل الاتصال بنسخة Matomo الخاصة بك.',
        ],
        'fields' => [
            'base_url' => 'رابط Matomo',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'الرابط الأساسي لتثبيت Matomo الخاص بك.',
            'api_token' => 'رمز API',
            'api_token_helper' => 'يمكنك العثور على الرمز في Matomo ضمن الإعدادات > شخصي > الأمان.',
            'site_id' => 'معرّف الموقع',
            'site_id_helper' => 'المعرّف الرقمي للموقع الذي تريد تتبعه.',
            'timezone' => 'المنطقة الزمنية',
            'timezone_placeholder' => 'اختر منطقة زمنية...',
        ],
        'actions' => [
            'test_connection' => 'اختبار الاتصال',
        ],
        'notifications' => [
            'saved' => 'تم حفظ إعدادات Matomo بنجاح.',
            'test_success' => 'تم الاتصال بنجاح! يمكن الوصول إلى Matomo.',
            'test_failure' => 'فشل الاتصال. يرجى التحقق من إعداداتك.',
            'cache_cleared' => 'تم مسح ذاكرة Matomo المؤقتة.',
        ],
    ],
];
