<?php

namespace Hik\Resource;

use Hik\Module;

class AcsDoor extends Module
{
    protected $urls = [
        'acsDoorList' => '/api/resource/v1/acsDoor/advance/acsDoorList'
    ];

    public function acsDoorList(array $data)
    {
        $this->data = $data;
    }
}
