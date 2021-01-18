<?php

namespace Hik\Resource;

use Hik\Service;

class Resource
{
    use Service;

    public $modules = [
        'Person' => Person::class,
        'Org' => Org::class
    ];
}
