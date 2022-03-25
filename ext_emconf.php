<?php

$EM_CONF['ns_cache_webhook'] = [
    'title' => '[NITSAN] Flush Webhook Cache',
    'description' => 'Add option at Flush cache menu call "Flush Webhook Cache" at TYPO3 backend. Call your Webhook configured at Settings > Configure extensions > EXT.ns_cache_webhook. Read more at documentation.',
    'category' => 'plugin',
    'author' => 'Team NITSAN',
    'author_company' => 'NITSAN Technologies Pvt Ltd',
    'author_email' => 'sanjay@nitsan.in',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'NITSAN\\NsCacheWebhook\\' => 'Classes/',
        ],
    ],
];
