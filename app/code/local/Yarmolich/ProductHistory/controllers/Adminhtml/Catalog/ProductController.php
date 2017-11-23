<?php
/**
 * Created by PhpStorm.
 * User: magentodev
 * Date: 22.11.2017
 * Time: 2:14
 */

class Yarmolich_ProductHistory_Adminhtml_Catalog_ProductController
    extends Mage_Adminhtml_Controller_Action
{
    public function historyAction()
    {
        Mage::register('current_product', $this->getRequest()->getParam('id'));
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('system/config/yarmolich');
    }

}
