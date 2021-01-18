<?php

namespace Hik\Acs;

use Hik\Service;

class Acs
{
    use Service;

    public $modules = [
        'Door' => Door::class,
    ];
}
