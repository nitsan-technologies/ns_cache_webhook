<?php

namespace NITSAN\NsCacheWebhook\Controller;

use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Http\JsonResponse;


class NsWebhookController extends ActionController
{
    public function nsCacheWebhook(){
        $extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)
            ->get('ns_cache_webhook');
        $req = GeneralUtility::makeInstance(RequestFactory::class);
        $response = $req->request(
            $extensionConfiguration['buildUrl'],
            $extensionConfiguration['method'],
            []
        );
        $rawResponse = $response->getBody()->getContents();
        $response = json_decode($rawResponse, true);
        return new JsonResponse($response);
    }
}
