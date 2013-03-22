<?php
namespace FormDependencies\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="selectoptions")
 */
class SelectOption
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(name="title", type="string")
     */
    protected $title;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
}