<?php
declare(strict_types=1);

namespace Zhidkovskiy\PickUpAtShop\Model;

use Zhidkovskiy\PickUpAtShop\{
    Api\Data\PickupShopInterface,
    Model\ResourceModel\PickupShop as PickupShopResource
};
use Magento\Framework\{
    DataObject\IdentityInterface,
    Model\AbstractModel
};

/**
 * Class PickupShop
 * @package Zhidkovskiy\PickUpAtShop\Model
 */
class PickupShop extends AbstractModel implements PickupShopInterface, IdentityInterface
{
    const CACHE_TAG = 'zhidkovskiy_pickupatshop_pickupshop';
    protected $_cacheTag = 'zhidkovskiy_pickupatshop_pickupshop';
    protected $_eventPrefix = 'zhidkovskiy_pickupatshop_pickupshop';

    protected function _construct()
    {
        $this->_init(PickupShopResource::class);
    }

    /**
     * @return array|string[]
     */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}