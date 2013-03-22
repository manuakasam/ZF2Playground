<?php
/**
 * Created by JetBrains PhpStorm.
 * User: du009701
 * Date: 22.03.13
 * Time: 11:18
 * To change this template use File | Settings | File Templates.
 */

namespace FormDependencies\Model;

class SelectOption
{
    public $id;
    public $title;

    public function exchangeArray($data)
    {
        $this->id    = (isset($data['id'])) ? $data['id'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : null;
    }
}