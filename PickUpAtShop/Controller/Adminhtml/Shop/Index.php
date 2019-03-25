<?php

namespace Zhidkovskiy\PickUpAtShop\Controller\Adminhtml\Shop;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Zhidkovskiy\PickUpAtShop\Controller\Adminhtml\Shop
 */
class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Zhidkovskiy_PickUpAtShop::pickup_shops');
        $resultPage->getConfig()->getTitle()->prepend(__('Pickup Shops'));
        return $resultPage;
    }
}