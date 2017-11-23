<?php
/**
 * Created by PhpStorm.
 * User: magentodev
 * Date: 22.11.2017
 * Time: 3:49
 */

class Yarmolich_ProductHistory_Block_Adminhtml_Catalog_Product_History_Info
    extends Mage_Adminhtml_Block_Template
{
    /** {@inheritdoc} */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('producthistory/catalog/product/tab.phtml');
    }

    /**
     * Get product created date/time
     *
     * @return mixed
     */
    public function getProductCreated()
    {
        if ($this->getProductId()) {
            return Mage::helper('core')
                        ->formatDate(
                            $this->getProduct()->getData('created_at'),
                            'medium',
                            true
                        );
        }
    }

    public function getProductAuthor()
    {
        $collection = Mage::getModel('yarmolich_product/product')
            ->getProductCreatedData($this->getProductId());

        return $collection->getData('admin');
    }

    /**
     * Retrieve currently edited product object
     *
     * @return Mage_Catalog_Model_Product|bool
     */
    public function getProduct()
    {
        if ($product = Mage::getModel('catalog/product')->load($this->getProductId())) {
            return $product;
        }

        return false;
    }

    /**
     * @return integer
     */
    public function getProductId()
    {
        return (int) Mage::registry('current_product');
    }
}
