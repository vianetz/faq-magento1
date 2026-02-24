<?php
declare(strict_types=1);

/**
 * FAQ for Magento
 *
 * @category   Flagbit
 * @package    Flagbit_Faq
 * @copyright  Copyright (c) 2009 Flagbit GmbH & Co. KG <magento@flagbit.de>
 * @copyright  Copyright (c) 2020-26 vianetz - Dipl.-Ing. C. Massmann (https://www.vianetz.com)
 */
class Flagbit_Faq_Model_Faq extends Mage_Core_Model_Abstract
{
    public const CACHE_TAG = 'faq';
    protected $_cacheTag = 'faq';

    protected function _construct()
    {
        $this->_init('flagbit_faq/faq');
    }
}
