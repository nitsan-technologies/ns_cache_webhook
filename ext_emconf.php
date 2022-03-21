<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Cache Webhook',
    'description' => 'Use this extension for the rebuild the react js assets',
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
