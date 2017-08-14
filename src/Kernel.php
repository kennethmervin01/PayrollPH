<?php

namespace PayrollPH;

use PayrollPH\Support\Services;

class Kernel extends Services  {

  public function __construct()
  {
      $this->bind(\PayrollPH\Services\DataSource::class, 'Database');
      $this->bind(\PayrollPH\Services\GovernmentBenefits\Facade::class, 'GBenefits');
      $this->bind(\PayrollPH\Services\Employee\Facade::class, 'Employee');
      $this->bind(\PayrollPH\Services\Deductions\Facade::class, 'Deductions');
      $this->autoRun();
  }


  public function autoRun()
  {
      $this->build('Database');
  }

}
