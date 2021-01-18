<?php

namespace Hik;

use GuzzleHttp\ClientInterface;

class Worker
{
    private $contentType  = 'application/json';

    private $ARTEMIS_PATH = "/artemis";

    private $accept = '*/*';

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var ClientInterface
     */
    protected $client;

    public function __construct(ClientInterface $client, Config $config)
    {
        $this->config = $config;
        $this->client = $client;
    }

    public function do($api, $data = [])
    {
        $url = $this->ARTEMIS_PATH . $api;
        $sign = $this->get_sign($url);

        $headers = [
            'Accept' => '*/*',
            'Content-Type' => $this->contentType,
            'X-Ca-Key' => $this->config->getAppKey(),
            'X-Ca-Signature' => base64_encode($sign),
            'X-Ca-Signature-Headers' => strtolower('x-ca-key'),
        ];
        $options = [
            'allow_redirects' => false,
            'verify' => false,
            'body' => json_encode($data),
            'headers' => $headers
        ];

        $response = $this->client->post($this->ARTEMIS_PATH . $api, $options);

        $contents = json_decode($response->getBody()->getContents(), true);
        if ($contents['code'] !== '0') {
            throw new \Exception('异常:' . json_encode($contents));
        }

        return $contents;
    }

    private function get_sign($url)
    {
        $txt = $this->get_sign_str($url);
        $sign = hash_hmac('sha256', $txt, $this->config->getAppSk(), true);

        return $sign;
    }

    private function get_sign_str($url)
    {
        $next = "\n";
        $str = "POST" . $next . $this->accept . $next . $this->contentType . $next . "x-ca-key:" . $this->config->getAppKey() . $next . $url;
        return $str;
    }
}
