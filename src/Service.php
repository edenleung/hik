<?php

namespace Hik;

trait Service
{
    protected $module;

    public function __construct($module, Worker $client)
    {
        $this->module = $module;
        $this->client = $client;
    }

    public static function __callStatic($module, $arguments)
    {
        return new self($module, ...$arguments);
    }

    protected function getModule()
    {
        if (isset($this->modules[$this->module])) {
            return $this->modules[$this->module];
        }

        throw new \Exception('缺少模块 -> ' .  $this->module);
    }

    public function __call($action, $arguments)
    {
        $class = $this->getModule();
        $module = new $class();
        $module->$action(...$arguments);

        $response = $this->client->do(
            $module->getActionUrl($action),
            $module->getActionData()
        );

        return $response;
    }
}
