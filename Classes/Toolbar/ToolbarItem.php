<?php
declare(strict_types=1);

namespace NITSAN\NsCacheWebhook\Toolbar;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Backend\Routing\Exception\RouteNotFoundException;
use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Page\PageRenderer;
/**
 * Prepares additional webhook entry.
 */
class ToolbarItem implements ClearCacheActionsHookInterface
{
    static public $itemKey = 'nsCacheWebhook';

    /**
     * @throws \UnexpectedValueException
     */
    public function __construct(
        PageRenderer $pageRenderer
    ) {
        $pageRenderer->loadRequireJsModule('TYPO3/CMS/NsCacheWebhook/Main');
    }

    /**
     * Adds the webhook menu item.
     *
     * @param array $cacheActions Array of CacheMenuItems
     * @param array $optionValues Array of AccessConfigurations-identifiers (typically used by userTS with options.clearCache.identifier)
     * @return void
     */
    public function manipulateCacheActions(&$cacheActions, &$optionValues)
    {
        // First check if user has right to access the flush language cache item
        if ($this->getBackendUser()->isAdmin()) {
            /** @var UriBuilder $uriBuilder */
            $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
            try {
                $uri = $uriBuilder->buildUriFromRoute('nsCacheWebhook');
                $cacheActions[] = [
                        'id' => self::$itemKey,
                        'title' => 'LLL:EXT:ns_cache_webhook/Resources/Private/Language/locallang_db.xlf:rebuildJs',
                        'description' => 'LLL:EXT:ns_cache_webhook/Resources/Private/Language/locallang_db.xlf:rebuildJs.description',
                        'href' => $uri,
                        'iconIdentifier' => 'tx_nscachewebhook'
                ];
                $optionValues[] = self::$itemKey;
            } catch (RouteNotFoundException $e) {
                // Do nothing, i.e. do not add the menu item if the AJAX route cannot be found
            }
        }
    }

    /**
     * Wrapper around the global BE user object.
     *
     * @return BackendUserAuthentication
     */
    protected function getBackendUser(): BackendUserAuthentication
    {
        return $GLOBALS['BE_USER'];
    }
}