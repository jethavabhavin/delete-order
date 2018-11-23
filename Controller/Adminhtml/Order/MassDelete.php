<?php
/**
 * Copyright © Inficode, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Inficode\DeleteOrder\Controller\Adminhtml\Order;

use Inficode\DeleteOrder\Helper\Data as Helper;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends \Magento\Sales\Controller\Adminhtml\Order\AbstractMassAction {
	/**
	 * Authorization level of a basic admin session
	 */
	const ADMIN_RESOURCE = Helper::ADMIN_RESOURCE;
	/**
	 * @var \Inficode\DeleteOrder\Helper\Data
	 */
	protected $helper;
	/**
	 * @param Context $context
	 * @param Filter $filter
	 * @param CollectionFactory $collectionFactory
	 */
	public function __construct(
		Context $context,
		Filter $filter,
		CollectionFactory $collectionFactory,
		OrderRepositoryInterface $orderRepository,
		Helper $helper
	) {
		parent::__construct($context, $filter);
		$this->collectionFactory = $collectionFactory;
		$this->orderRepository = $orderRepository;
		$this->helper = $helper;
	}

	/**
	 * Cancel selected orders
	 *
	 * @param AbstractCollection $collection
	 * @return \Magento\Backend\Model\View\Result\Redirect
	 */
	protected function massAction(AbstractCollection $collection) {
		$countCancelOrder = 0;
		foreach ($collection->getItems() as $order) {
			if ($this->helper->canDelete($order)) {
				$this->orderRepository->delete($order);
				$countCancelOrder++;
			}
		}
		$countNonCancelOrder = $collection->count() - $countCancelOrder;

		if ($countNonCancelOrder && $countCancelOrder) {
			$this->messageManager->addError(__('%1 order(s) cannot be deleted.', $countNonCancelOrder));
		} elseif ($countNonCancelOrder) {
			$this->messageManager->addError(__('You cannot delete the order(s).'));
		}

		if ($countCancelOrder) {
			$this->messageManager->addSuccess(__('We deleted %1 order(s).', $countCancelOrder));
		}
		$resultRedirect = $this->resultRedirectFactory->create();
		$resultRedirect->setPath($this->getComponentRefererUrl());
		return $resultRedirect;
	}
}
