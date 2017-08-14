<?php

namespace PayrollPH;

use PayrollPH\Support\Services;
use PayrollPH\Services\GovernmentBenefits\Facade as GBenefits;
use PayrollPH\Services\Employee\Facade as Employee;

class Kernel extends Services  {

  public function __construct()
  {
      $this->bind(GBenefits::class, 'GBenefits');
      $this->bind(Employee::class, 'Employee');
  }

}
