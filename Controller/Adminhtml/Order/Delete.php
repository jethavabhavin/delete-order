<?php
/**
 * Copyright © Bhavin, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhavin\DeleteOrder\Controller\Adminhtml\Order;

use Bhavin\DeleteOrder\Helper\Data as Helper;

class Delete extends \Magento\Sales\Controller\Adminhtml\Order {
	/**
	 * @var \Bhavin\DeleteOrder\Helper\Data
	 */
	protected $helper;
	/**
	 * Authorization level of a basic admin session
	 *
	 * @see _isAllowed()
	 */
	const ADMIN_RESOURCE = Helper::ADMIN_RESOURCE;
	/**
	 * Delete order
	 *
	 * @return \Magento\Backend\Model\View\Result\Redirect
	 */
	public function execute() {
		$resultRedirect = $this->resultRedirectFactory->create();

		$order = $this->_initOrder();
		if ($order) {
			try {
				$this->helper = $this->_objectManager->get(Helper::class);
				if (!$this->helper->canDelete($order)) {
					$this->messageManager->addError(__("Sorry! You can't not delete the order."));
					return $resultRedirect->setPath('sales/*/');
				}
				$order_id = $order->getId();
				$order->delete($order);
				$this->messageManager->addSuccess(__('You successfully deleted order #%1.', $order_id));
			} catch (\Magento\Framework\Exception\LocalizedException $e) {
				$this->messageManager->addError($e->getMessage());
			} catch (\Exception $e) {
				$this->messageManager->addError(__('You have not deleted the order.'));
				$this->_objectManager->get(\Psr\Log\LoggerInterface::class)->critical($e);
			}
			return $resultRedirect->setPath('sales/order/view', ['order_id' => $order->getId()]);
		}
		return $resultRedirect->setPath('sales/*/');
	}
}
