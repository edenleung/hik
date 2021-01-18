<?php

namespace Hik\Resource;

use Hik\Module;

class Person extends Module
{
    protected $urls = [
        'personList' => '/api/resource/v2/person/personList'
    ];

    public function personList(array $data)
    {
        $this->data = $data;
    }
}
