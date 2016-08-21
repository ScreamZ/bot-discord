<?php

namespace DiscordPHPBundle\Parts\Entities;


use DiscordPHPBundle\Components\HttpDriver;

class Guild
{
    public $id;

    public $name;

    public $roles;

    public $jsonResult;

    /**
     * Guild constructor.
     * @param $id
     * @param $name
     * @param $roles
     */
    public function __construct($result)
    {
        $this->jsonResult = $result;

        $this->id = $result['id'];
        $this->name = $result['name'];
        $this->roles = $result['roles'];
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

    /**
     * @return mixed
     */
    public function getJsonResult()
    {
        return $this->jsonResult;
    }

    /**
     * @param mixed $jsonResult
     */
    public function setJsonResult($jsonResult)
    {
        $this->jsonResult = $jsonResult;
    }

}