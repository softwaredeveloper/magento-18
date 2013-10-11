<?php
class Magentocreation_Module_IndexController extends Mage_Core_Controller_Front_Action
{
	public function IndexAction()
	{
		$this->loadLayout();
		$this->renderLayout();
	}
	
	public function aveclayoutAction()
	{
		$this->loadLayout();
		$this->renderLayout();
	}

	public function saveAction(){
		$model=Mage::getModel('module/module');
		$data = array(
			'nom' => 'mike',
			'nombre_commandes' => '1'
		);
		$model->setData($data);
		$model->save();
		$this->loadLayout();
		$this->renderLayout();
	}
	
	public function updateAction(){
		$model = Mage::getModel('module/module')->load(2);
		$model->setNombreCommandes('3');
		$model->save();
		
	}
	
	public function deleteAction(){
		$model = Mage::getModel('module/module')->load(3);
		$model->delete();
		$this->loadLayout();
		$this->renderLayout();
	}
}