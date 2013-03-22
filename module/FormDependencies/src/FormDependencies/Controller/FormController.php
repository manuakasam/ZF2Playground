<?php
namespace FormDependencies\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use FormDependencies\Form\DbAdapterForm;
use FormDependencies\Form\TableForm;
use FormDependencies\Form\DoctrineForm;

class FormController extends AbstractActionController
{
    public function formDbAdapterAction()
    {
        $vm = new ViewModel();
        $vm->setTemplate('form-dependencies/form/form-db-adapter.phtml');

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $form      = new DbAdapterForm($dbAdapter);

        return $vm->setVariables(array(
            'form' => $form
        ));
    }

    public function formTableAction()
    {
        $vm = new ViewModel();
        $vm->setTemplate('form-dependencies/form/form-table.phtml');

        $tableGateway = $this->getServiceLocator()->get('formdependencies-model-selecttable');
        $form         = new TableForm($tableGateway);

        return $vm->setVariables(array(
            'form' => $form
        ));
    }

    public function formDoctrineAction()
    {
        $vm = new ViewModel();
        $vm->setTemplate('form-dependencies/form/form-doctrine.phtml');

        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $form          = new DoctrineForm($entityManager);

        return $vm->setVariables(array(
            'form' => $form
        ));
    }
}