<?php

class CurlClient
{
    private $client;

    public function __construct()
    {
        $this->client = curl_init();
    }

    public function get_request(array $options)
    {
        curl_setopt_array($this->client, $options);
        $response = curl_exec($this->client);

        curl_close($this->client);
        return json_decode($response);
    }

    public function post_request(array $options)
    {
    }
}
