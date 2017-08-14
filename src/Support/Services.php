<?php

namespace PayrollPH\Support;

abstract class Services
{
    private $services;

    public function bind($service, $name)
    {
        $this->services[$name] = $service;
        return $this;
    }

    public function make($name)
    {
        return $this->services[$name];
    }
    
    public function run()
    {
        // get the args , firts argument must be a class name;
        $args  = func_get_args();
        // call reflection class
        $ref = new \ReflectionClass($this->services[$args[0]]);
        // remove firt member of array;
        $remove1st = array_shift($args);
        return $ref->newInstanceArgs($args);;
    }

    public function available()
    {
        echo "Available Services: <br />";
        foreach ($this->services as $key => $value) {
            echo "$key <br />";
        }
    }
}
