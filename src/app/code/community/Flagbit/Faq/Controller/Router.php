<?php
declare(strict_types=1);

/**
 * @category   Flagbit
 * @package    Flagbit_Faq
 * @copyright  Copyright (c) 2020-26 vianetz - Dipl.-Ing. C. Massmann (https://www.vianetz.com)
 */
class Flagbit_Faq_Controller_Router extends Mage_Core_Controller_Varien_Router_Standard
{
    /**
     * @param Mage_Core_Controller_Request_Http $request
     *
     * @throws \Mage_Core_Model_Store_Exception
     */
    public function match($request): bool
    {
        if (Mage::app()->getStore()->isAdmin()) {
            return false;
        }

        $pageId = trim($request->getPathInfo(), '/');

        if (! str_starts_with($pageId, $this->_getUrlKey())) {
            return false;
        }

        $pageId = str_replace($this->_getUrlKey() . '/', '', $pageId);

        /** @var Flagbit_Faq_Model_Resource_Faq_Collection $faqCollection */
        $faqCollection = Mage::getModel('flagbit_faq/faq')->getCollection()
            ->addFieldToFilter('url_key', ['eq' => $pageId])
            ->addStoreFilter(Mage::app()->getStore())
            ->setPageSize(1);

        if ($faqCollection->getSize() === 0) {
            return false;
        }

        $faqItemId = $faqCollection->getFirstItem()->getId();

        $request->setModuleName($this->_getUrlKey())
            ->setControllerName('index')
            ->setActionName('show')
            ->setParam('faq', $faqItemId);

        $request->setAlias(Mage_Core_Model_Url_Rewrite::REWRITE_REQUEST_PATH_ALIAS, $pageId);

        return true;
    }

    protected function _getUrlKey(): string
    {
        return Mage::helper('flagbit_faq')->getFaqUrlKey();
    }
}