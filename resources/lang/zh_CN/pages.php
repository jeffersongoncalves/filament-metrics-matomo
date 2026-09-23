<?php

return [
    'settings' => [
        'title' => 'Matomo 设置',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => '连接',
            'connection_description' => '配置你的 Matomo 实例连接信息。',
        ],
        'fields' => [
            'base_url' => 'Matomo URL',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => '你的 Matomo 安装的基础 URL。',
            'api_token' => 'API 令牌',
            'api_token_helper' => '可在 Matomo 的 设置 > 个人 > 安全 中找到你的令牌。',
            'site_id' => '站点 ID',
            'site_id_helper' => '要跟踪的站点的数字 ID。',
            'timezone' => '时区',
            'timezone_placeholder' => '选择时区...',
        ],
        'actions' => [
            'test_connection' => '测试连接',
        ],
        'notifications' => [
            'saved' => 'Matomo 设置已成功保存。',
            'test_success' => '连接成功！Matomo 可访问。',
            'test_failure' => '连接失败，请检查你的设置。',
            'cache_cleared' => 'Matomo 缓存已清除。',
        ],
    ],
];
