<?php
class Magentocreation_Module_Adminhtml_ModuleController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction(){
		if($this->getRequest()->getQuery('ajax')){
			$this->forward('grid');
			return;
		}
		$this->loadLayout();
		$this->_setActiveMenu('module/item1');
		$this->_addContent($this->getLayout()->createBlock('module/adminhtml_Module','module.container.grid'));
		$this->_addBreadcrumb(Mage::helper('module')->__('Manage sales point'), mage::helper('module')->__('Manage sales point'));
		$this->renderLayout();
	}
	
	public function editAction(){
		$moduleId = $this->getRequest()->getParam('id');
		$moduleModel = Mage::getModel('module/module')->load($moduleId);
		//die($moduleModel->getPointDeVenteId());
		if($moduleModel->getid()||$moduleId == 0){
			$this->_title($moduleModel->getId()?
			$moduleModel->getNom():$this->__('New sale point'));
			Mage::register('current_module', $moduleModel);
			$this->loadLayout();
			$this->_setActiveMenu('module/item1');
			$this->_addBreadcrumb(Mage::helper('module')->__('Sales Point Manager'), Mage::helper('module')->__('Sales Point Manager'), $this->getUrl('*/*/'));
			$this->_addBreadcrumb(Mage::helper('module')->__('Edit sales point'), Mage::helper('module')->__('Edit sales point'));
			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
			$this->_addContent($this->getLayout()->createBlock('module/adminhtml_module_edit'));
			$this->_addLeft($this->getLayout()->createBlock('module/adminhtml_module_edit_tabs'));
			$this->renderLayout();			
		}else{
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('module')->__('The sales point does not exist.'));
			$this->_redirect('*/*/');
		}
	}
	
	public function newAction(){
		$this->getRequest()->setParam('id',0);
		$this->_redirect('*/*/edit');
	}
	
	public function saveAction(){
		if($this->getRequest()->getPost())	{
			try{
				$data = $this->getRequest()->getpost();
				$moduleModel = Mage::getModel('module/module');
				if($this->getRequest()->getparam('id')>0){
					$moduleModel->setId($this->getRequest()->getParam('id'));
				}
				$moduleModel->addData($data)->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(
				Mage::helper('adminhtml')->__('The sales point have been saved'));
			}
			catch (Mage_Core_Exception $e){
				$this->getSession()->addError($e->getMessage());
				$this->getResponse()->setRedirect($this->getUrl('*/module/edit', array('id'=>$module->getId())));
				return;
			}
		}
		$this->_redirect('*/*/');
		return;
	}
	
public function deleteAction(){
		if($id = $this->getRequest()->getParam('id'))	{
			try{
				$moduleModel = Mage::getModel('module/module');
				$moduleModel->setId($id);
				$moduleModel->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess(
				Mage::helper('adminhtml')->__('The sales point have been deleted'));
				$this->_redirect('*/*/');
				return;
			}
			catch (Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit',array('id'=>$this->getRequest()->getParam('id')));
				return;
			}
		}
		Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Unable to find a sales point to delete.'));
		$this->_redirect('*/*/');
	}
	
	public function gridAction(){
		$this->loadLayout();
		$this->getResponse()->setBody($this->getLayout()->createBlock('module/adminhtml_module_grid')->toHtml());
	}
}