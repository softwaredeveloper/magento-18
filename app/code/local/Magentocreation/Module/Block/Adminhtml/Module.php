<?php
class Magentocreation_Module_Block_Adminhtml_Module extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct(){
		$this->_controller = 'adminhtml_Module';
		$this->_blockGroup = 'module';
		$this->_headerText = Mage::helper('module')->__('Manage sales point');
		$this->_addButtonLabel = Mage::helper('module')->__('Add New Sales Point');
		parent::__construct();
	}
}