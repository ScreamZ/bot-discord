<?php

namespace DiscordPHPBundle\Parts\Entities;


use DiscordPHPBundle\Components\HttpDriver;

class Guild
{
    public $id;

    public $name;

    public $roles;

    /**
     * Guild constructor.
     * @param $id
     * @param $name
     * @param $roles
     */
    public function __construct($id, $name, $roles)
    {
        $this->id = $id;
        $this->name = $name;
        $this->roles = $roles;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

}