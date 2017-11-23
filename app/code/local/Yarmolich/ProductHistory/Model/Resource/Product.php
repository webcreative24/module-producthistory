<?php
/**
 * Created by PhpStorm.
 * User: magentodev
 * Date: 22.11.2017
 * Time: 4:46
 */

class Yarmolich_ProductHistory_Model_Resource_Product
    extends Mage_Core_Model_Resource_Db_Abstract
{
    /** {@inheritdoc} */
    public function _construct()
    {
        $this->_init('yarmolich_product/product','id');
    }

}
