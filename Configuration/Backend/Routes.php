<?php

use NITSAN\NsCacheWebhook\Controller\NsWebhookController;

return [
    'nsCacheWebhook' => [
            'path' => '/ns_cache_webhook/webhook',
            'target' => NsWebhookController::class . '::nsCacheWebhook'
    ]
];