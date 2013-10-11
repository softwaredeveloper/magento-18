<?php
class Magentocreation_Module_Block_Adminhtml_Module_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('moduleGrid');
		$this->setUseAjax(true);
		$this->setDefaultSort('ID');
		$this->setDefaultDir('desc');
		$this->setSaveParametersInSession(true);
	}	
	
	protected function _prepareCollection()
	{
		$collection = Mage::getModel('module/module')->getCollection()->addFieldToSelect('*');
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	
	protected function _prepareColumns()
	{
		$this->addColumn('point_de_vente_id', array('header'=>Mage::helper('module')->__('ID'),'width'=>'50px','index'=>'point_de_vente_id','type'=>'number'));
		$this->addColumn('nom', array('header'=>Mage::helper('module')->__('Name'),'width'=>'150px','index'=>'nom','type'=>'text'));
		$this->addColumn('telephone',array('header'=>Mage::helper('module')->__('Phone'),'width'=>'150px','index'=>'telephone','type'=>'text'));
		$this->addColumn('adresse',array('header'=>Mage::helper('module')->__('Address'),'width'=>'150px','index'=>'adresse','type'=>'text'));
		return parent::_prepareColumns();	
	}
	
	public function getRowUrl($row){
		return $this->getUrl('*/*/edit', array('id'=>$row->getPointDeVenteId()));
	}
}