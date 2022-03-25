define([
    'jquery',
    'TYPO3/CMS/Backend/Modal',
    'TYPO3/CMS/NsCacheWebhook/Main',
    'TYPO3/CMS/Backend/jquery.clearable'
], function ($, Model) {
    let menuItemSelector = "a.toolbar-cache-flush-action";
    $(menuItemSelector).on('click', function (){
        if ($(this).find("[data-identifier='tx_nscachewebhook']").length > 0) {
            require(['TYPO3/CMS/Backend/Notification'], function(Notification) {
                Notification.success('Well done', 'Your webhook successfully called which is configured at Settings > Configure extensions > EXT.ns_cache_webhook.');
            });
        }
    });
});
