<?php

namespace Hik\Resource;

use Hik\Module;

class Org extends Module
{
    protected $urls = [
        'orgList' => '/api/resource/v1/org/orgList'
    ];

    public function orgList(array $data)
    {
        $this->data = $data;
    }
}
