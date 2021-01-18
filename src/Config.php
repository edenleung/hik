<?php

namespace Hik;

class Config
{
    protected $ak;

    protected $sk;

    protected $base_uri;

    public function __construct(array $options)
    {
        $this->ak = $options['ak'];
        $this->sk = $options['sk'];
        $this->base_uri = $options['base_uri'];
    }

    public function getAppKey()
    {
        return $this->ak;
    }

    public function getAppSk()
    {
        return $this->sk;
    }

    public function getBaseUri()
    {
        return $this->base_uri;
    }
}
