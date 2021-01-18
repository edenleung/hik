<?php

namespace Hik\Frs;

use Hik\Service;

class Frs
{
    use Service;

    public $modules = [
        'Face' => Face::class,
    ];
}
