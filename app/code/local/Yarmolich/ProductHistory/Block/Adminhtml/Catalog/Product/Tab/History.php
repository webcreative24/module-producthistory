<?php
/**
 * Created by PhpStorm.
 * User: magentodev
 * Date: 22.11.2017
 * Time: 3:41
 */

class Yarmolich_ProductHistory_Block_Adminhtml_Catalog_Product_Tab_History
    extends Mage_Adminhtml_Block_Widget_Grid
{
    /** {@inheritdoc} */
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
        $this->setId('history_product_grid');
    }

    /** {@inheritdoc} */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('yarmolich_product/product')
            ->getProductUpdatedData($this->getProductId());

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /** {@inheritdoc} */
    protected function _prepareColumns()
    {
        $this->addColumn('date', [
            'header'    => Mage::helper('yarmolich_product')->__('Update Time'),
            'align'     =>'left',
            'index'     => 'date',
        ]);

        $this->addColumn('admin', [
            'header'    => Mage::helper('yarmolich_product')->__('Admin Name'),
            'align'     =>'left',
            'index'     => 'admin',
        ]);

        $this->addColumn('ip', [
            'header'    => Mage::helper('yarmolich_product')->__('Ip Address'),
            'align'     =>'left',
            'index'     => 'ip',
        ]);

        return parent::_prepareColumns();
    }

    /** {@inheritdoc} */
    public function getGridUrl()
    {
        return $this->getData('grid_url')
            ? $this->getData('grid_url')
            : $this->getUrl('*/*/customGrid', array('_current' => true));
    }

    /**
     * @return integer
     */
    public function getProductId()
    {
        return (int) Mage::registry('current_product');
    }
}
