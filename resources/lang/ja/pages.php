<?php

return [
    'settings' => [
        'title' => 'Matomo 設定',
        'navigation_label' => 'Matomo',
        'sections' => [
            'connection' => '接続',
            'connection_description' => 'Matomo インスタンスの接続情報を設定します。',
        ],
        'fields' => [
            'base_url' => 'Matomo URL',
            'base_url_placeholder' => 'https://matomo.example.com',
            'base_url_helper' => 'Matomo インストールのベース URL。',
            'api_token' => 'API トークン',
            'api_token_helper' => 'トークンは Matomo の Settings > Personal > Security で確認できます。',
            'site_id' => 'サイト ID',
            'site_id_helper' => 'トラッキングするサイトの数値 ID。',
            'timezone' => 'タイムゾーン',
            'timezone_placeholder' => 'タイムゾーンを選択...',
        ],
        'actions' => [
            'test_connection' => '接続をテスト',
        ],
        'notifications' => [
            'saved' => 'Matomo の設定を保存しました。',
            'test_success' => '接続に成功しました！Matomo にアクセスできます。',
            'test_failure' => '接続に失敗しました。設定を確認してください。',
            'cache_cleared' => 'Matomo のキャッシュをクリアしました。',
        ],
    ],
];
