<?php

namespace Zhidkovskiy\PickUpAtShop\Model;

use Zhidkovskiy\PickUpAtShop\Api\{
    PickupShopRepositoryInterface,
    Data\PickupShopInterface
};

class PickupShopRepository implements PickupShopRepositoryInterface
{
    public function save(PickupShopInterface $pickupShop)
    {
    }

    public function getById(int $id)
    {
    }

    public function getList(): array
    {
        return [];
    }
}