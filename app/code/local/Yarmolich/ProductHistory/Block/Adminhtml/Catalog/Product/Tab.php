<?php
/**
 * Created by PhpStorm.
 * User: magentodev
 * Date: 22.11.2017
 * Time: 1:02
 */

class Yarmolich_ProductHistory_Block_Adminhtml_Catalog_Product_Tab
    extends Mage_Adminhtml_Block_Widget
        implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Retrieve the label used for the tab relating to this block
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->__('Update History');
    }

    /**
     * Retrieve the title used by this tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->__('Click here to view product history');
    }

    /**
     * Determines whether to display the tab
     * Add logic here to decide whether you want the tab to display
     *
     * @return bool
     */
    public function canShowTab()
    {
        return Mage::getSingleton('admin/session')->isAllowed('system/config/yarmolich');
    }

    /**
     * Stops the tab being hidden
     *
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getTabUrl()
    {
        return $this->getUrl('*/*/history', array('_current' => true));
    }

    /**
     * @return string
     */
    public function getTabClass()
    {
        return 'ajax';
    }
}
