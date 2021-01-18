<?php

namespace Hik;

class Module
{
    protected $data;

    public function getActionUrl($action)
    {
        return $this->urls[$action];
    }

    public function getActionData()
    {
        return $this->data;
    }

}
