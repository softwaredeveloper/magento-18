<?php
class Magentocreation_Module_Block_Adminhtml_Module_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct(){
		parent::__construct();
		$this->_objectId = 'id';
		$this->_controller = 'adminhtml_Module';
		$this->_blockGroup = 'module';
		$this->_updateButton('save', 'label','Save sales point');
		$this->_updateButton('delete','label','Delete sales point');
	}
	
	public function getHeaderText(){
		if(Mage::registry('current_module')->getId()){
			return $this->htmlEscape(Mage::registry('current_module')->getNom());
		}else{
			return Mage::helper('module')->__('New sales point');
		}
	}
}