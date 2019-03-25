<?php
declare(strict_types=1);

namespace Zhidkovskiy\PickUpAtShop\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class PickupShop
 * @package Zhidkovskiy\PickUpAtShop\Model\ResourceModel
 */
class PickupShop extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('zhidkovskiy_pickup_shop', 'id');
    }
}