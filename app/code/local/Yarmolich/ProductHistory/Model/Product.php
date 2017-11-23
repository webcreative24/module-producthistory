<?php
/**
 * Created by PhpStorm.
 * User: magentodev
 * Date: 22.11.2017
 * Time: 4:43
 */

class Yarmolich_ProductHistory_Model_Product
    extends Mage_Core_Model_Abstract
{
    const TYPE_NEW = 0;
    const TYPE_UPDATE = 1;

    /** {@inheritdoc} */
    protected function _construct()
    {
        $this->_init('yarmolich_product/product');
    }

    /**
     * @param int $productId
     * @return Yarmolich_ProductHistory_Model_Resource_Product_Collection
     */
    public function getProductCreatedData($productId)
    {
        return $this->getCollection()
                    ->addFilter('product_id', (int)$productId)
                    ->addFilter('type', static::TYPE_NEW)
                    ->getFirstItem();
    }

    /**
     * @param int $productId
     * @return Yarmolich_ProductHistory_Model_Resource_Product_Collection
     */
    public function getProductUpdatedData($productId)
    {
        return $this->getCollection()
                    ->addFilter('product_id', (int)$productId)
                    ->addFilter('type',static::TYPE_UPDATE);
    }

}
