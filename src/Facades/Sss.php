<?php

namespace PayrollPH\Facades;
use PayrollPH\Contracts\EmployeeInterface;
use PayrollPH\Contracts\DataSourceInterface;

class Sss {

  public $salary;

  public function __construct(EmployeeInterface $employee)
  {
      $this->salary =   $employee->employee_basic_salary;
  }

  public function dataSource(DataSourceInterface $ds)
  {
      return $ds();
  }






}
