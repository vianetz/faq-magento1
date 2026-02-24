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
class Flagbit_Faq_Block_Adminhtml_Item_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'faq_id';
        $this->_blockGroup = 'flagbit_faq';
        $this->_controller = 'adminhtml_item';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('flagbit_faq')->__('Save FAQ item'));
        $this->_updateButton('delete', 'label', Mage::helper('flagbit_faq')->__('Delete FAQ item'));

        $this->_addButton('saveandcontinue', [
            'label' => Mage::helper('flagbit_faq')->__('Save and continue edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ], -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText(): string
    {
        if (Mage::registry('faq')->getFaqId()) {
            return Mage::helper('flagbit_faq')->__("Edit FAQ item '%s'", $this->escapeHtml(Mage::registry('faq')->getQuestion()));
        }

        return Mage::helper('flagbit_faq')->__('New FAQ item');
    }

    public function getFormActionUrl(): string
    {
        return $this->getUrl('*/faq/save');
    }

    /**
     * Returns the CSS class for the header
     *
     * Usually 'icon-head' and a more precise class is returned. We return
     * only an empty string to avoid spacing on the left of the header as we
     * don't have an icon.
     */
    public function getHeaderCssClass(): string
    {
        return '';
    }
}
