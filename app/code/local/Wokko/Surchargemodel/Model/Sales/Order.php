<?php
class Wokko_Surchargemodel_Model_Sales_Order extends Mage_Sales_Model_Order
{
	public function getCustomerName(){
		if($this->getCustomerFirstname()){
			$customer = Mage::getModel('customer/customer')->load($this->getCustomerId());
			$customerName = $customer->getPrefix().' '.$this->getCustomerFirstname().' '.$this->getCustomerLastname();
		}else{
			$customerName = Mage::helper('sales')->__('Guest');
		}
		return $customerName;
	}
}