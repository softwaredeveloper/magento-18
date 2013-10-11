<?php
class Magentocreation_Module_Block_Adminhtml_Module_Edit_Tab_Info extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm(){
		$form=new Varien_Data_Form();
		$moduleModel=Mage::registry('current_module');
		$fieldset=$form->addFieldset('base_fieldset',array('legend'=>Mage::helper('customer')->__('Sales Point Information')));
		$fieldset->addField('nom','text',array('label'=>Mage::helper('module')->__('Name'),'class'=>'requiered-entry','requiered'=>true,'name'=>'nom'));
		$fieldset->addField('telephone','text',array('label'=>Mage::helper('module')->__('Phone'),'class'=>'requiered-entry','requiered'=>true,'name'=>'telephone'));
		$fieldset->addField('adresse','text',array('label'=>Mage::helper('module')->__('Address'),'class'=>'requiered-entry','requiered'=>true,'name'=>'adresse'));
		$form->setValues($moduleModel->getData());
		$this->setForm($form);
		return parent::_prepareForm();
	}
}