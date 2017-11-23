<?php
/**
 * Created by PhpStorm.
 * User: magentodev
 * Date: 22.11.2017
 * Time: 4:47
 */

class Yarmolich_ProductHistory_Model_Resource_Product_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /** {@inheritdoc} */
    protected function _construct()
    {
        $this->_init('yarmolich_product/product');
    }
}
