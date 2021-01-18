<?php

namespace Hik\Acs;

use Hik\Module;

class Door extends Module
{
    protected $urls = [
        'events' => '/api/acs/v2/door/events'
    ];

    public function events(array $data)
    {
        $this->data = $data;
    }
}
