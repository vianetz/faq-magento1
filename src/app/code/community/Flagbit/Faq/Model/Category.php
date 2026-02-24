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
class Flagbit_Faq_Model_Category extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('flagbit_faq/category');
    }
    
    public function getName()
    {
        return $this->getCategoryName();
    }
    
    public function getItemCollection()
    {
        $collection = $this->getData('item_collection');
        if ($collection === null) {
            $collection = Mage::getSingleton('flagbit_faq/faq')->getCollection()
                ->addCategoryFilter($this);
            $this->setData('item_collection', $collection);
        }

        return $collection;
    }
}
