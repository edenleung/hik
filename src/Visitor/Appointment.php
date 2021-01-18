<?php

namespace Hik\Resource;

use Hik\Module;

class Appointment extends Module
{
    protected $urls = [
        'make' => '/'
    ];

    public function make(array $data)
    {
        // receptionistId.require
        // visitStartTime.require
        // visitEndTime.require
        // visitorInfoList.visitorName.require
        // visitorInfoList.gender.require
        // visitorInfoList.phoneNo.require

        $this->data = $data;
    }
}
