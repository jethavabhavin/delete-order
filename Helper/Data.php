<?php
/**
 * Copyright © Bhavin, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhavin\DeleteOrder\Helper;

use Magento\Backend\Model\UrlInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\AuthorizationInterface;
use Magento\Sales\Model\Order;
use Magento\Store\Model\Store;

/**
 * DeleteOrder module base helper
 *
 * @author Magento Core Team <core@magentocommerce.com>
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper {
	const ADMIN_RESOURCE = "Inficode_DeleteOrder::delete_order";
	const CONFIG_ENABLE = "enable";
	const CONFIG_ALLOWED_STATUS = "allow_order_statuses";
	/**
	 * @var \Magento\Framework\AuthorizationInterface
	 */
	protected $_authorization;
	/**
	 * @var \Magento\Backend\Model\UrlInterface
	 */
	protected $_backendUrl;
	/**
	 * @param Context $context
	 * @param AuthorizationInterface $authorization
	 */
	public function __construct(
		Context $context,
		AuthorizationInterface $authorization,
		UrlInterface $backendUrl
	) {
		parent::__construct($context);
		$this->_authorization = $authorization;
		$this->_backendUrl = $backendUrl;
	}
	/**
	 * get allow to send new order confirmation email
	 *
	 * @param string $path
	 * @param bool $explode
	 *
	 * @return bool||array
	 */
	public function getConfig($path = null, $explode = false, $store = null) {
		$configValue = $this->scopeConfig->getValue(
			"bhavin_delete_order/general/" . $path,
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE,
			$store
		);
		if ($explode) {
			$configValue = explode(',', $configValue);
		}
		return $configValue;
	}
	/**
	 * Check order can delete
	 * @param Order $order
	 *
	 * @return bool
	 */
	public function canDelete(Order $order) {
		$flag = $order->getId() &&
		$this->isAllowedAction() &&
		$this->isEnableModule() &&
		in_array($order->getStatus(), $this->getAllowedSatus());
		return $flag;
	}
	/**
	 * Check module enable/disable
	 *
	 * @return bool
	 */
	public function isEnableModule() {
		return $this->getConfig(Self::CONFIG_ENABLE);
	}
	/**
	 * get all allowed order status to delete order
	 *
	 * @return bool
	 */
	public function getAllowedSatus() {
		return $this->getConfig(Self::CONFIG_ALLOWED_STATUS, true);
	}
	/**
	 * Check permission for passed action
	 *
	 * @return bool
	 */
	public function isAllowedAction() {
		return $this->_authorization->isAllowed(Self::ADMIN_RESOURCE);
	}
	/**
	 * Order Delete URL getter
	 * @param Order $order
	 *
	 * @return string
	 */
	public function getDeleteUrl(Order $order) {
		return $this->_backendUrl->getUrl('sales/order/delete', ['order_id' => $order->getId()]);
	}
}
