<?php

namespace JcJcCuoBieZi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Checker
{
    /**
     * JcJcCuoBieZi api.
     */
    const API = 'http://api.cuobiezi.net/spellcheck/json_check/json_phrase';

    /**
     * Configuration.
     *
     * @var array
     */
    protected $config;

    /**
     * Http client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function check($content, $options = [])
    {
        $data = array_merge($this->config, $options, ['content' => $content]);

        try {
            $response = $this->getClient()->post(static::API, ['json' => $data]);

            return json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            return (object) [
                'Successed' => false,
                'Message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Get the guzzle client instance.
     *
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        if (is_null($this->client)) {
            $this->client = new Client;
        }

        return $this->client;
    }

    /**
     * Set the guzzle client instance.
     *
     * @param \GuzzleHttp\Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }
}
