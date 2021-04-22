<?php

namespace Hik\Acs;

use Hik\Module;

class Door extends Module
{
    protected $urls = [
        'events' => '/api/acs/v2/door/events',
        'status' => '/api/acs/v1/door/states',
        'doControl' => '/api/acs/v1/door/doControl'
    ];

    public function events(array $data)
    {
        $this->data = $data;
    }

    public function status(array $data)
    {
        $this->data = $data;
    }

    public function doControl(array $data)
    {
        $this->data = $data;
    }
}
