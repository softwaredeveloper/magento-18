<?php
class Wokko_Surchargeblock_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{
	protected function _prepareColumns(){
		$this->addColumn('order_currency_code', array('header'=>Mage::helper('sales')->__('Currency'), 'index'=>'order_currency_code'));
		return parent::_prepareColumns();
	}
}