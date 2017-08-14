<?php

namespace PayrollPH\Support;

abstract class Services
{
    public $services;

    public function bind($service, $name)
    {
        $this->services[$name] = $service;
        return $this;
    }

    public function make($name)
    {
        return $this->services[$name];
    }

    public function build()
    {
        // get the args , firts argument must be a class name;
        $args  = func_get_args();
        // call reflection class
        $ref = new \ReflectionClass($this->services[$args[0]]);
        $class_name = $args[0];
        // remove firt member of array;
        $remove1st = array_shift($args);

        if(empty($args)){
            $params = $ref->getConstructor()->getParameters();
            $args = $this->resolveArgs($params);
        }

        $this->bind($ref->newInstanceArgs($args),$class_name);
    }


    public function resolveArgs($params)
    {

        $dependencies = array();
        foreach ($params as $param) {
            $dependency = $param->getClass();
            if(is_null($dependency))
            {
                $dependencies[] = $param->getDefaultValue();
            }
            else
            {
                $dependencies[] = $this->checkServices($dependency->name);

            }
        }

        return $dependencies;
    }


    public function checkServices($name)
    {
        $service = $this->services;
        foreach ($service as $obj)
        {
            if($obj instanceof $name)
            {
                return $obj;
            }
        }

    }


    public function available()
    {
        var_dump($this->services);
    }
}
