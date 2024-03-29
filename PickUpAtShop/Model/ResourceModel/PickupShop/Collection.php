<?php
declare(strict_types=1);

namespace Zhidkovskiy\PickUpAtShop\Model\ResourceModel\PickupShop;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    protected function _construct()
    {
        $this->_init(
            \Zhidkovskiy\PickUpAtShop\Model\PickupShop::class,
            \Zhidkovskiy\PickUpAtShop\Model\ResourceModel\PickupShop::class
        );
    }
}