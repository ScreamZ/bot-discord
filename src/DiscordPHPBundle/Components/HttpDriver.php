<?php

namespace DiscordPHPBundle\Components;

use \GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

final class HttpDriver
{
    /** @var  HttpDriver $instance */
    static $instance;

    /** @var \GuzzleHttp\Client $http */
    public $http;

    public $baseURL = 'https://discordapp.com/api';

    public $token;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new HttpDriver();
        }

        return static::$instance;
    }

    public function initDriver($token)
    {
        $this->token = $token;
        $this->http = new Client(
            array(
                'headers' => [
                    'User-Agent' => 'DiscordBot',
                    'Authorization' => 'Bot ' . $token
                ]
            )
        );
    }

    /**
     * @param ApiCall $apiCall
     * @param null $body
     * @return mixed
     */
    public function callURL(ApiCall $apiCall, $body = null)
    {
        try {
            $result = $this->http->request(
                $apiCall->getMethod(),
                $this->baseURL . $apiCall->getUrl(),
                array('form_params' => $body)
            );
        } catch (ClientException $exception) {
            throw $exception;
        }

        $response = (string)$result->getBody();

        return json_decode($response, true);
    }

}