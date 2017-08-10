<?php

namespace PayrollPH\Support;

abstract class Services
{
    private $services;

    public function bind($service, $name)
    {
        $this->services[$name] = $service;
    }

    public function make($name)
    {
        return $this->services[$name];
    }

    public function available()
    {
        echo "Available Services: <br />";
        foreach ($this->services as $key => $value) {
            echo "$key <br />";
        }
    }
}
