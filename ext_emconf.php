<?php

$EM_CONF['ns_cache_webhook'] = [
    'title' => 'TYPO3 Flush Webhook Cache',
    'description' => 'A simple TYPO3 extension to clear webhook cache directly from the backend with one click—ensuring your latest changes and configurations are always live.',
    'category' => 'plugin',
    'author' => 'Team NITSAN',
    'author_company' => 'NITSAN',
    'author_email' => 'info@nitsantech.de',
    'state' => 'stable',
    'version' => '1.0.4',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
            'ns_license' => '14.5.4-14.9.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'NITSAN\\NsCacheWebhook\\' => 'Classes/',
        ],
    ],
];
