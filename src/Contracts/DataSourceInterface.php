<?php

namespace PayrollPH\Contracts;

interface DataSourceInterface
{
    public function load($host,$root,$password,$database);
}
