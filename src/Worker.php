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

        $headers = array(
            "Content-Type: application/json",
            "Content-Length: " . strlen(json_encode($data)),
            'Accept: */*',
            'X-Ca-Key: ' . $this->config->getAppKey(),
            'X-Ca-Signature: ' . base64_encode($sign),
            'X-Ca-Signature-Headers: ' . strtolower('x-ca-key'),
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $this->config->getBaseUri() . $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            $headers
        );

        $contents = curl_exec($ch);
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($return_code == 200) {
            return json_decode($contents, true);
        }

        return false;
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
