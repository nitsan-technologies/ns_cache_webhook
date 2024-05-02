<?php

$EM_CONF['ns_cache_webhook'] = [
    'title' => 'Flush Webhook Cache',
    'description' => 'Introducing our Flush Webhook Cache Extension for TYPO3 Backend, designed to streamline your web development process. With just a click, you can instantly clear the webhook cache, ensuring that your website stays updated with the latest changes and configurations.',
    'category' => 'plugin',
    'author' => 'T3Planet // NITSAN',
    'author_company' => 'T3Planet // NITSAN',
    'author_email' => 'sanjay@nitsan.in',
    'state' => 'stable',
    'version' => '1.0.1',
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
