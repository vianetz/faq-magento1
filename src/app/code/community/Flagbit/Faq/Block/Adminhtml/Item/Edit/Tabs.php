<?php
/**
 * FAQ for Magento
 *
 * @category   Flagbit
 * @package    Flagbit_Faq
 * @copyright  Copyright (c) 2009 Flagbit GmbH & Co. KG <magento@flagbit.de>
 */

/**
 * FAQ for Magento
 *
 * @category   Flagbit
 * @package    Flagbit_Faq
 * @author     Flagbit GmbH & Co. KG <magento@flagbit.de>
 */
class Flagbit_Faq_Block_Adminhtml_Item_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('faq_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('flagbit_faq')->__('FAQ item information'));
    }
    
    /**
     * Prepares the page layout
     *
     * Adds the tabs to the left tab menu.
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        $return = parent::_prepareLayout();

        $this->addTab(
            'main_section',
            array(
                'label' => $this->helper('flagbit_faq')->__('General information'),
                'title' => $this->helper('flagbit_faq')->__('General information'),
                'content' => $this->getLayout()->createBlock('flagbit_faq/adminhtml_item_edit_tab_main')->toHtml(),
                'active' => true,
            )
        );

        $this->addTab(
            'meta_information_section',
            array(
                'label' => $this->helper('flagbit_faq')->__('Meta Information'),
                'title' => $this->helper('flagbit_faq')->__('Meta Information'),
                'content' => $this->getLayout()->createBlock('flagbit_faq/adminhtml_item_edit_tab_metaInformation')->toHtml(),
                'active' => false,
            )
        );
        
        return $return;
    }
}
