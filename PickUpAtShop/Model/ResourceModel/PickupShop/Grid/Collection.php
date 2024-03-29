<?php
declare(strict_types=1);

namespace Zhidkovskiy\PickUpAtShop\Model\ResourceModel\PickupShop\Grid;

use Magento\Framework\Api\Search\AggregationInterface;
use Zhidkovskiy\PickUpAtShop\Model\ResourceModel\ {
    PickupShop as PickupShopResource,
    PickupShop\Collection as PickupShopCollection
};

/**
 * Class Collection
 * @package Zhidkovskiy\PickUpAtShop\Model\ResourceModel\PickupShop\Grid
 */
class Collection extends PickupShopCollection implements \Magento\Framework\Api\Search\SearchResultInterface
{
    /**
     * @var AggregationInterface
     */
    protected $aggregations;

    public function _construct()
    {
        $this->_init(
            \Magento\Framework\View\Element\UiComponent\DataProvider\Document::class,
            PickupShopResource::class
        );
    }

    /**
     * @return AggregationInterface
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * @param AggregationInterface $aggregations
     * @return $this
     */
    public function setAggregations($aggregations)
    {
        $this->aggregations = $aggregations;
        return $this;
    }

    /**
     * Get search criteria.
     *
     * @return \Magento\Framework\Api\SearchCriteriaInterface|null
     */
    public function getSearchCriteria()
    {
        return null;
    }

    /**
     * Set search criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null)
    {
        return $this;
    }

    /**
     * Get total count.
     *
     * @return int
     */
    public function getTotalCount()
    {
        return $this->getSize();
    }

    /**
     * Set total count.
     *
     * @param int $totalCount
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setTotalCount($totalCount)
    {
        return $this;
    }

    /**
     * Set items list.
     *
     * @param \Magento\Framework\Api\ExtensibleDataInterface[] $items
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setItems(array $items = null)
    {
        return $this;
    }
}