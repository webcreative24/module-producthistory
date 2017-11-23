<?php

/** @var Mage_Core_Model_Resource_Setup $this */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('product_history'))
    ->addColumn(
        'id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        150,
        [
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ],
        'Id'
    )
    ->addColumn(
        'product_id',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        32,
        [
            'nullable'  => true,
        ],
        'Product Id'
    )
    ->addColumn(
        'admin',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        32,
        [
            'nullable'  => true,
        ],
        'Admin Name'
    )
    ->addColumn(
        'ip',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        32,
        [
            'nullable'  => true,]
        ,
        'Ip'
    )
    ->addColumn(
        'date',
        Varien_Db_Ddl_Table::TYPE_DATE,
        null,
        [
            'nullable'  => true,
        ],
        'updated_at'
    )
    ->addColumn(
        'type',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        11,
        [
            'nullable'  => false,
        ],
        'Type'
    );

$installer->getConnection()->createTable($table);

$installer->endSetup();