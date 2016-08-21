<?php

namespace DiscordPHPBundle\Components;


class APICall
{
    public $url;

    public $method;

    public $params;

    public function __construct($informations)
    {
        $this->url = $informations['url'];
        $this->method = $informations['method'];
        $this->params = $informations['params'];
    }

    /**
    * @return mixed
    */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    public function replaceArgs($args)
    {
        foreach ($args as $arg => $replace) {
            $this->url = str_replace($arg, $replace, $this->url);
        }
    }

    public function getAuthorizedFields()
    {
        if (array_key_exists('authorized_fields', $this->params)) {
            return $this->params['authorized_fields'];
        }

        return array();
    }
}