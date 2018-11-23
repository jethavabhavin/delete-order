<?php
/**
 * Copyright © Inficode, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Inficode\DeleteOrder\Plugin\Sales\Block\Adminhtml\Order;

use Inficode\DeleteOrder\Helper\Data as Helper;
use Magento\Sales\Block\Adminhtml\Order\View as OrderView;

class View {
	/**
	 * @var \Inficode\DeleteOrder\Helper\Data
	 */
	protected $helper;

	/**
	 * @param Helper $helper
	 */
	public function __construct(
		Helper $helper
	) {
		$this->helper = $helper;

	}
	/**
	 * @param OrderView $view
	 * @return OrderView $view
	 */
	public function beforeSetLayout(OrderView $view) {
		$order = $view->getOrder();
		if ($this->helper->canDelete($order)) {
			$url = $this->helper->getDeleteUrl($order);
			$view->addButton(
				'inficode_delete_order',
				[
					'label' => __('Delete'),
					'class' => 'delete',
					'on_click' => 'deleteConfirm(\''
					. __('Are you sure you want to delete this order ?')
					. '\', \'' . $url . '\')',
					'id' => 'order-view-delete-button',
				]
			);
		}
		//return $view;
	}
}