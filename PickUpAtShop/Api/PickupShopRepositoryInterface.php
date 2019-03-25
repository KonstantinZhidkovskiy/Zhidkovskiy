<?php
declare(strict_types=1);

namespace Zhidkovskiy\PickUpAtShop\Api;

use Zhidkovskiy\PickUpAtShop\Api\Data\PickupShopInterface;

interface PickupShopRepositoryInterface
{
    public function save(PickupShopInterface $sample);
    public function getById(int $id);
    public function getList(): array;
}