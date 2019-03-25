<?php

namespace Zhidkovskiy\PickUpAtShop\Setup;

use Magento\Framework\Setup\{
    InstallSchemaInterface,
    ModuleContextInterface,
    SchemaSetupInterface
};

/**
 * Class InstallSchema
 * @package Zhidkovskiy\PickUpAtShop\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $this->createPickupShop($installer);
        $this->createPickupShopProducts($installer);

        $installer->endSetup();
    }

    /**
     * @param SchemaSetupInterface $installer
     * @throws \Zend_Db_Exception
     */
    private function createPickupShop(SchemaSetupInterface $installer)
    {
        /**
         * Create table 'zhidkovskiy_pickup_shop'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('zhidkovskiy_pickup_shop')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Shop Name'
        )->addColumn(
            'address',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Shop Address'
        )->addColumn(
            'telephone',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            20,
            ['nullable' => false],
            'Phone Number'
        )->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            ['nullable' => true],
            'Shop Description'
        )->addColumn(
            'is_active',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true, 'nullable' => false, 'default' => '1'],
            'Is Active'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Creation Time'
        )->addColumn(
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
            'Update Time'
        )->addColumn(
            'store_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true, 'nullable' => false, 'default' => '0'],
            'Store ID'
        )->addIndex(
            $installer->getIdxName('zhidkovskiy_pickup_shop', ['store_id']),
            ['store_id']
        )->addForeignKey(
            $installer->getFkName('zhidkovskiy_pickup_shop', 'store_id', 'store', 'store_id'),
            'store_id',
            $installer->getTable('store'),
            'store_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->setComment('PickUp Shop Table');
        $installer->getConnection()->createTable($table);
    }

    /**
     * @param SchemaSetupInterface $installer
     * @throws \Zend_Db_Exception
     */
    private function createPickupShopProducts(SchemaSetupInterface $installer)
    {
        /**
         * Create table 'zhidkovskiy_pickup_shop_products'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('zhidkovskiy_pickup_shop_products')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'pickup_shop_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'default' => '0'],
            'Pickup Shop ID'
        )->addColumn(
            'product_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => false, 'default' => '0'],
            'Product ID'
        )->addColumn(
            'qty',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '12,4',
            ['nullable' => false, 'default' => '1.0000'],
            'QTY'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Creation Time'
        )->addColumn(
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
            'Update Time'
        )->addIndex(
            $installer->getIdxName('zhidkovskiy_pickup_shop_products', ['pickup_shop_id']),
            ['pickup_shop_id']
        )->addIndex(
            $installer->getIdxName('zhidkovskiy_pickup_shop_products', ['product_id']),
            ['product_id']
        )->addForeignKey(
            $installer->getFkName('zhidkovskiy_pickup_shop_products', 'pickup_shop_id', 'zhidkovskiy_pickup_shop', 'id'),
            'pickup_shop_id',
            $installer->getTable('zhidkovskiy_pickup_shop'),
            'id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName('zhidkovskiy_pickup_shop_products', 'product_id', 'catalog_product_entity', 'entity_id'),
            'product_id',
            $installer->getTable('catalog_product_entity'),
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->setComment('PickUp Shop Products Table');
        $installer->getConnection()->createTable($table);

    }
}