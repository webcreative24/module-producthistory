<?php
/**
 * Created by PhpStorm.
 * User: magentodev
 * Date: 22.11.2017
 * Time: 15:57
 */

class Yarmolich_ProductHistory_Model_Observer
{
    public function saveProductHistory(Varien_Event_Observer $observer)
    {
        /*
         * if module is enabled - start collect data
         */
        if (Mage::getStoreConfig('yarmolich/yarmolich_group/yarmolich_select', Mage::app()->getStore()) == 1) {
            $product = $observer->getEvent()->getProduct();
            $helper = Mage::helper('yarmolich_product');
            $model = Mage::getModel('yarmolich_product/product');
            $data = [
                'product_id' => $product->getData('entity_id'),
                'admin' => $helper->getAdminName(),
                'ip' => $helper->getAdminIp(),
                'date' => $helper->currentDate(),
            ];

            if (is_null($product->getOrigData('entity_id'))) { //if new product
                $data['type'] = Yarmolich_ProductHistory_Model_Product::TYPE_NEW;
            } else { //if product exist
                $data['type'] = Yarmolich_ProductHistory_Model_Product::TYPE_UPDATE;
            }
            try {
                $model->setData($data);
                $model->save();
            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
    }
}
