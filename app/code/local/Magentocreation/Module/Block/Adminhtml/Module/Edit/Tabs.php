<?php
class Magentocreation_Module_Block_Adminhtml_Module_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
	public function __construct(){
		parent::__construct();
		$this->setId('module_info_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(Mage::helper('customer')->__('Sales Point Information'));
	}
	
	protected function _beforeToHtml(){
		$this->addTab('info',array('label'=>'Sales Point Information','title'=>'Sales Point Information','content'=>$this->getLayout()->createBlock('module/adminhtml_module_edit_tab_info')->toHtml()));
		return parent::_beforeToHtml();
	}
}