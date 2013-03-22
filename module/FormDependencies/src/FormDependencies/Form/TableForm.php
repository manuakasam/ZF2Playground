<?php
namespace FormDependencies\Form;

use Zend\Form\Form;
use FormDependencies\Model\SelectTable;

class TableForm extends Form
{
    protected $selectTable;

    public function __construct(SelectTable $selectTable)
    {
        $this->setSelectTable($selectTable);

        parent::__construct('db-adapter-form');

        $this->add(array(
            'name'    => 'db-select',
            'type'    => 'Zend\Form\Element\Select',
            'options' => array(
                'label'         => 'Dynamic TableGateway Select',
                'value_options' => $this->getOptionsForSelect(),
                'empty_option'  => '--- please choose ---'
            )
        ));
    }

    public function getOptionsForSelect()
    {
        $table = $this->getSelectTable();
        $data  = $table->fetchAll();

        $selectData = array();

        foreach ($data as $selectOption) {
            $selectData[$selectOption->id] = $selectOption->title;
        }

        return $selectData;
    }

    public function setSelectTable($selectTable)
    {
        $this->selectTable = $selectTable;

        return $this;
    }

    public function getSelectTable()
    {
        return $this->selectTable;
    }
}