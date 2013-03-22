<?php
namespace FormDependencies\Model;

use Zend\Db\TableGateway\TableGateway;

class SelectTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getSelectOption($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveSelectOption(SelectOption $option)
    {
        $data = array(
            'title'  => $option->title,
        );

        $id = (int)$option->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getSelectOption($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteSelectOption($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}