<?php
require_once('Mage/Adminhtml/controllers/Sales/OrderController.php');
class Wokko_Surchargebackoffice_Adminhtml_Sales_OrderController extends Mage_Adminhtml_Sales_OrderController
{
	public function viewAction(){
		$this->_title($this->__('Sales'))->_title($this->__('Orders'));
		if($order = $this->_initOrder()){
			$this->_initAction();
			$this->_title(sprintf("ORDER#%s %s", $order->getRealOrderId(), $order->getStatus()));
			$this->renderLayout();
		}
	}
}