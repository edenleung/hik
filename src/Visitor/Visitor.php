<?php

namespace Hik\Visitor;

use Hik\Service;

class Visitor
{
    use Service;

    public $modules = [
        'Appointment' => Appointment::class,
    ];
}
