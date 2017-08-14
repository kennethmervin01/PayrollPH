<?php

namespace PayrollPH\Services\Employee;

use PayrollPH\Support\Services;

class Facade extends Services
{
    private $first_name;
    private $last_name;
    private $base_salary;
    private $pay_type = "MONTHLY";
    private $pay_frequency = "SEMI";
    private $allowances = 0;


    public function __construct(array $employee)
    {
        foreach ($employee as $key => $value) {
            $this->$key = $value;
        }

        //$this->bind($this->getEmployee(),'WHOYOU');
    }

    public function getEmployee()
    {
        return get_object_vars($this);
    }

    public function getBaseSalary()
    {
        return $this->base_salary;
    }

}
