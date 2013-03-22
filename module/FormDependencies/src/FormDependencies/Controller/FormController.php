<?php
namespace FormDependencies\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use FormDependencies\Form\DbAdapterForm;

class FormController extends AbstractActionController
{
    public function formDbAdapterAction()
    {
        $vm = new ViewModel();
        $vm->setTemplate('form-dependencies/form/form-db-adapter.phtml');

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $form = new DbAdapterForm($dbAdapter);

        return $vm->setVariables(array(
            'form' => $form
        ));
    }
}