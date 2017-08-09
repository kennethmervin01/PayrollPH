<?php

namespace PayrollPH\Facades;

use PayrollPH\Concrete\GovernmentBenefits; // Concrete template
use PayrollPH\Contracts\GovernmentBenefitsInterface as GBenefitsContract;
use PayrollPH\Contracts\DataSourceInterface;


class Sss extends GovernmentBenefits implements GBenefitsContract
{
    public function __construct(DataSourceInterface $ds, $salary = 0)
    {
        parent::__construct($ds, $salary);
        $this->setReference([
          'table' => 'sss_table',
          'from'  => 'sss_from',
          'to'    => 'sss_to',
          'er'    => 'sss_er',
          'ee'    => 'sss_ee',
          'service' => 'SSS'
        ]);
    }

}
